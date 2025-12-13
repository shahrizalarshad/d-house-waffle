<?php

namespace App\Http\Controllers;

use App\Models\SellerApplication;
use Illuminate\Http\Request;

class SellerApplicationController extends Controller
{
    public function showForm()
    {
        // Check if user already has a pending or approved application
        $existingApplication = SellerApplication::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('info', 'You already have an application in progress');
        }

        return view('seller-application.form');
    }

    public function apply(Request $request)
    {
        // Check if user already has a pending or approved application
        $existingApplication = SellerApplication::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You already have an application in progress');
        }

        SellerApplication::create([
            'user_id' => auth()->id(),
            'apartment_id' => auth()->user()->apartment_id,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Seller application submitted successfully');
    }

    public function status()
    {
        $application = SellerApplication::where('user_id', auth()->id())
            ->latest()
            ->first();

        return view('seller-application.status', compact('application'));
    }
}
