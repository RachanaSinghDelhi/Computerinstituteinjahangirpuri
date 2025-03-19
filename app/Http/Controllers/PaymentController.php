<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;

class PaymentController extends Controller
{
    // Display all payments
    public function index()
    {
        $payments = Payment::with('student')->orderBy('created_at', 'desc')->get();
 
    // Debugging: Check if student relationship is loaded
    foreach ($payments as $payment) {
        if (!$payment->student) {
            logger("Payment ID: {$payment->id} has no student associated.");
        }
    }

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

      // Get pending payment notifications
      public function getPaymentNotifications()
      {
          $pendingPayments = Payment::where('status', 'pending')
              ->orderBy('updated_at', 'desc')
              ->get()
              ->map(function ($payment) {
                  return [
                      'id' => $payment->id,
                      'student_id' => $payment->student_id,
                      'message' => "Fees Approval for Student ID: {$payment->student_id}",
                      'type' => 'Payment Pending',
                      'updated_at' => $payment->updated_at->diffForHumans()
                  ];
              });
  
          return response()->json([
              'count' => $pendingPayments->count(),
              'notifications' => $pendingPayments
          ]);
      }
  
}
