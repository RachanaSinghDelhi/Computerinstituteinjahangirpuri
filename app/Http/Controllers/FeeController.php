<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::with('student')->get();
        return view('dashboard.fees', compact('fees'));
    }

    public function create()
    {
        $students = Student::all();
        return view('dashboard.add_fees', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'receipt_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $paymentDate = Carbon::parse($validated['payment_date']);
        $dueDate = $paymentDate->addMonth();
        $receiptNumber = 'REC-' . strtoupper(uniqid());

        $receiptPath = null;
        if ($request->hasFile('receipt_image')) {
            $nextFileNumber = $this->getNextReceiptFileNumber();
            $filename = $nextFileNumber . '.jpg';
            $receiptPath = $request->file('receipt_image')->storeAs('assets/receipts', $filename, 'public');
        }

        Fee::create([
            'student_id' => $validated['student_id'],
            'amount' => $validated['amount'],
            'payment_date' => $paymentDate,
            'due_date' => $dueDate,
            'receipt_number' => $receiptNumber,
            'receipt_image' => $receiptPath,
            'status' => 'Paid',
        ]);

        return redirect()->route('fees.index')->with('success', 'Fee record added successfully.');
    }

    protected function getNextReceiptFileNumber()
    {
        $path = public_path('assets/receipts');
        $files = collect(scandir($path))->filter(function ($file) {
            return preg_match('/^\d+\.jpg$/', $file);
        })->sort();

        $lastFile = $files->last();
        $lastNumber = $lastFile ? (int) pathinfo($lastFile, PATHINFO_FILENAME) : 6200;

        return $lastNumber + 1;
    }
}

