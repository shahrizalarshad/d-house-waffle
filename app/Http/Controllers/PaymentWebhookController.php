<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentWebhookController extends Controller
{
    /**
     * Handle Billplz webhook
     */
    public function billplz(Request $request)
    {
        // Verify webhook signature (implement based on Billplz documentation)
        // For MVP, we'll skip signature verification

        Log::info('Billplz webhook received', $request->all());

        $billId = $request->input('id');
        $status = $request->input('paid');
        $amount = $request->input('amount') / 100; // Billplz sends amount in cents

        // Find payment by reference
        $payment = Payment::where('reference_no', $billId)->first();

        if (!$payment) {
            Log::error('Payment not found for bill ID: ' . $billId);
            return response()->json(['error' => 'Payment not found'], 404);
        }

        if ($status === 'true' || $status === true) {
            $payment->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);

            $payment->order->update([
                'payment_status' => 'paid',
                'payment_ref' => $billId,
            ]);

            Log::info('Payment marked as paid for order: ' . $payment->order->order_no);
        } else {
            $payment->update([
                'status' => 'failed',
            ]);

            $payment->order->update([
                'payment_status' => 'failed',
            ]);

            Log::info('Payment marked as failed for order: ' . $payment->order->order_no);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Handle ToyyibPay webhook
     */
    public function toyyibpay(Request $request)
    {
        Log::info('ToyyibPay webhook received', $request->all());

        $refno = $request->input('refno');
        $status = $request->input('status');
        $amount = $request->input('amount');

        // Find payment by reference
        $payment = Payment::where('reference_no', $refno)->first();

        if (!$payment) {
            Log::error('Payment not found for reference: ' . $refno);
            return response()->json(['error' => 'Payment not found'], 404);
        }

        if ($status == 1) { // ToyyibPay success status
            $payment->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);

            $payment->order->update([
                'payment_status' => 'paid',
                'payment_ref' => $refno,
            ]);

            Log::info('Payment marked as paid for order: ' . $payment->order->order_no);
        } else {
            $payment->update([
                'status' => 'failed',
            ]);

            $payment->order->update([
                'payment_status' => 'failed',
            ]);

            Log::info('Payment marked as failed for order: ' . $payment->order->order_no);
        }

        return response()->json(['success' => true]);
    }
}
