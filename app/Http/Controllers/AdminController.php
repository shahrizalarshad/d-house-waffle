<?php

namespace App\Http\Controllers;

use App\Models\SellerApplication;
use App\Models\Order;
use App\Models\Apartment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $apartment = Apartment::find(auth()->user()->apartment_id);
        $pendingApplications = SellerApplication::where('apartment_id', auth()->user()->apartment_id)
            ->where('status', 'pending')
            ->count();
        $totalOrders = Order::where('apartment_id', auth()->user()->apartment_id)->count();
        $totalRevenue = Order::where('apartment_id', auth()->user()->apartment_id)
            ->where('payment_status', 'paid')
            ->sum('platform_fee');

        return view('admin.dashboard', compact(
            'apartment',
            'pendingApplications',
            'totalOrders',
            'totalRevenue'
        ));
    }

    public function sellers()
    {
        $applications = SellerApplication::with(['user', 'approver'])
            ->where('apartment_id', auth()->user()->apartment_id)
            ->latest()
            ->paginate(15);

        return view('admin.sellers', compact('applications'));
    }

    public function approveSeller(Request $request, $id)
    {
        $application = SellerApplication::where('apartment_id', auth()->user()->apartment_id)
            ->findOrFail($id);

        $request->validate([
            'status' => 'required|in:approved,rejected',
            'remarks' => 'nullable|string',
        ]);

        $application->update([
            'status' => $request->status,
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'remarks' => $request->remarks,
        ]);

        // Update user role if approved
        if ($request->status === 'approved') {
            $application->user->update(['role' => 'seller']);
        }

        return back()->with('success', 'Seller application updated successfully');
    }

    public function orders()
    {
        $orders = Order::with(['buyer', 'seller', 'items'])
            ->where('apartment_id', auth()->user()->apartment_id)
            ->latest()
            ->paginate(15);

        return view('admin.orders', compact('orders'));
    }

    public function settings()
    {
        $apartment = Apartment::find(auth()->user()->apartment_id);
        return view('admin.settings', compact('apartment'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'service_fee_percent' => 'required|numeric|min:0|max:100',
            'pickup_location' => 'required|string|max:255',
            'pickup_start_time' => 'required|date_format:H:i',
            'pickup_end_time' => 'required|date_format:H:i',
        ]);

        $apartment = Apartment::find(auth()->user()->apartment_id);
        $apartment->update($validated);

        return back()->with('success', 'Settings updated successfully');
    }
}
