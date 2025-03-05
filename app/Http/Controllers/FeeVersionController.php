<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeVersion;
use App\Models\Fee;

class FeeVersionController extends Controller
{
    // Display pending fees for approval
    public function index()
    {
        $pendingFees = FeeVersion::where('approved', 0)->get();
        return view('dashboard.fees.fees-approvals', compact('pendingFees'));
    }

    // Approve fee and move to main fees table
    public function approve($id)
    {
        $pendingFee = FeeVersion::findOrFail($id);

        // Insert into fees table
        Fee::create([
            'student_id' => $pendingFee->student_id,
            'course_id' => $pendingFee->course_id,
            'payment_date' => $pendingFee->payment_date,
            'due_date' => $pendingFee->due_date,
            'amount_paid' => $pendingFee->amount_paid,
            'balances' => $pendingFee->balances,
            'receipt_number' => $pendingFee->receipt_number,
            'receipt_image' => $pendingFee->receipt_image,
            'status' => $pendingFee->status,
            'installment_no' => $pendingFee->installment_no,
        ]);

        // Mark as approved
        $pendingFee->delete();

        return redirect()->route('pending.fees.index')->with('success', 'Fee approved successfully.');
    }

    // Reject fee and delete from pending table
    public function reject($id)
    {
        $pendingFee = FeeVersion::findOrFail($id);
        $pendingFee->delete();

        return redirect()->route('pending.fees.index')->with('error', 'Fee entry rejected.');
    }
}
