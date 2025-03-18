<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Display all payments
    public function index()
    {
        $payments = Payment::with('student')->orderBy('created_at', 'desc')->get();
        return view('dashboard.payments.payments', compact('payments'));
    }

    // Approve payment
    public function approve($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'approved';
        $payment->save();

        return redirect()->back()->with('success', 'Payment approved successfully!');
    }
}
