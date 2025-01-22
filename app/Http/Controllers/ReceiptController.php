<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
{
    // Upload bulk receipts
public function uploadReceipts(Request $request)
{
    $request->validate([
        'starting_number' => 'required|integer|min:1',
        'receipts.*' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $files = $request->file('receipts');
    $startingNumber = $request->input('starting_number');

    foreach ($files as $index => $file) {
        $receiptNumber = $startingNumber + $index; // Generate receipt number
        $extension = $file->getClientOriginalExtension(); // Get file extension
        $fileName = $receiptNumber . '.' . $extension; // Generate file name like "7148.jpg"
        $filePath = 'receipts/' . $fileName;

        // Check if the file already exists in the folder
        if (!Storage::disk('public')->exists($filePath)) {
            // Store the file if it does not exist
            $file->storeAs('receipts', $fileName, 'public');
        }

        // Save receipt details to the database
        Receipt::updateOrCreate(
            ['file_name' => $fileName], // Check for existing entry
            ['file_path' => $filePath]  // Update or insert the file path
        );
    }

    return back()->with('success', 'Receipts uploaded successfully.');
}


    // Display receipts
    public function showReceipts()
    {
        $receipts = Receipt::orderBy('file_name', 'desc')->paginate(100); // Adjust the pagination number as needed
        return view('dashboard.fees.receipts', compact('receipts')); // Updated path
    }
    
}
