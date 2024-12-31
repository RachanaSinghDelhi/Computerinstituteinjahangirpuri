<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReceiptController extends Controller
{
    /**
     * Handle the bulk upload of receipt images.
     */
    public function upload(Request $request)
    {
        // Validate the uploaded files
        $validated = $request->validate([
            'receipt_images' => 'required|array',
            'receipt_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for each image
        ]);

        // Initialize an array to hold the paths of uploaded files
        $uploadedFiles = [];

        // Loop through each uploaded file and store it
        if ($request->hasFile('receipt_images')) {
            foreach ($request->file('receipt_images') as $file) {
                // Get the original file name
                $originalFileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $baseFileName = pathinfo($originalFileName, PATHINFO_FILENAME); // Get the file name without extension

                // Define the file path in the public/receipts folder
                $filePath = public_path('receipts/' . $originalFileName);

                // Check if the file already exists
                if (File::exists($filePath)) {
                    // If the file exists, append a unique identifier to the base file name
                    $uniqueFileName = $baseFileName . '_' . time() . '.' . $fileExtension;
                    $filePath = public_path('receipts/' . $uniqueFileName);
                }

                // Move the file to the public/receipts folder
                $file->move(public_path('receipts'), basename($filePath));

                // Store the file path
                $uploadedFiles[] = 'receipts/' . basename($filePath);
            }
        }

        // Redirect back with success message and uploaded files info
        return back()->with('success', 'Receipts uploaded successfully!')->with('files', $uploadedFiles);
    }
}
