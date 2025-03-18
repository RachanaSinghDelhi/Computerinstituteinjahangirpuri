<?php
namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Payment;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeesController extends Controller
{
   
        public function index()
        {
            $userId = Auth::id(); // ✅ Get authenticated user's ID
    
            // ✅ Get student_id from users table
            $studentId = User::where('id', $userId)->value('student_id');
    
            if (!$studentId) {
                return redirect()->back()->with('error', 'Student record not found.');
            }
    
            // ✅ Fetch payment details from the fees table using student_id
            $payments = Fee::where('student_id', $studentId)
                ->orderBy('payment_date', 'desc')
                ->get();
    
            // ✅ Calculate total paid and balance
            $totalPaid = $payments->sum('amount_paid');
            $totalBalance = $payments->sum('balances');
    
            return view('students.fees.fees', compact('payments', 'totalPaid', 'totalBalance'));
        }

        public function payfees()
    {
        return view('students.fees.pay_fees');
    }


    // Store payment details
    // Store payment details
    // Store payment details
    public function storePayment(Request $request)
    {
        $request->validate([
            'method' => 'required|string',
            'transaction_id' => 'required|string|unique:payments,transaction_id',
            'amount' => 'required|numeric|min:1',
        ]);
    
        Payment::create([
            'user_id' => Auth::id(),
            'student_id' => Auth::user()->student_id, // Or fetch from session/input if needed
            'method' => $request->method,
            'transaction_id' => $request->transaction_id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);
    
        return redirect()->back()->with('success', 'Payment Submitted for Approval');
    }
    


    // Approve Payment (Super Admin Only)
    public function approvePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Payment approved successfully!');
    }

    // List payments for admin
    public function listPayments()
    {
        $payments = Payment::with('student', 'user')->get();
        return view('admin.payments.index', compact('payments'));
    }
    }

