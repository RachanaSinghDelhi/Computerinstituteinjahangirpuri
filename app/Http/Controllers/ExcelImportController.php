<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Course;
use App\Models\CertificateType;

class ExcelImportController extends Controller
{
    public function import()
{
    // Define the file path
    $filePath = public_path('certificates/certificate_types.xlsx');
    
    if (file_exists($filePath)) {
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        foreach ($rows as $index => $row) {
            if ($index === 1) {
               
                continue;
            }

            $courseName = $row['A'] ?? null; // Course Name in column A
            $certificateType = $row['B'] ?? null; // Certificate Type in column B
            $description = $row['C'] ?? null; // Description in column C

            // Fetch course ID based on course name
            $course = Course::where('course_title', $courseName)->first();

            if ($course) {
                // Insert into certificate_types table
                CertificateType::create([
                    'course_id' => $course->id,
                    'certificate_type' => $certificateType ?? 'Unknown', // Default to 'Unknown' if not provided
                    'duration' => $course->duration, // Fetch duration from courses table
                    'description' => $description ?? null, // Allow null for description
                ]);
            } else {
                // Handle case where course doesn't exist
                return response()->json(['error' => 'Course not found: ' . $courseName], 404);
            }
        }

        return response()->json(['success' => 'Data imported successfully!']);
    } else {
        return response()->json(['error' => 'File not found at the specified location'], 404);
    }
}



    public function importCourses()
    {
        $filePath = public_path('certificates/courses1.xlsx');
        
        try {
            // Load the spreadsheet
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);
    
            // Iterate through each row and insert into the database
            foreach ($rows as $index => $row) {
                // Skip the header row
                if ($index == 1) continue;
    
                if (empty($row['B'])) {  // If 'course_title' is empty (column B)
                    continue; // Skip row if title is missing
                    // Alternatively, you can provide a default value like: $row['B'] = 'Default Title';
                }
                // Insert specific fields into the courses table
                Course::create([
                    'course_image' => !empty($row['A']) ? $row['A'] : null,   // Column A: Course Image (URL or path)
                    'course_title' => !empty($row['B']) ? $row['B'] : null,    // Column B: Course Title
                    'course_desc' => !empty($row['C']) ? $row['C'] : null,     // Column C: Course Description
                    'course_content' => !empty($row['D']) ? $row['D'] : null,  // Column D: Course Content
                    'duration' => !empty($row['E']) ? $row['E'] : null,        // Column E: Duration in months
                    'total_fees' => !empty($row['F']) ? $row['F'] : null,      // Column F: Total Fees
                    'installments' => !empty($row['G']) ? $row['G'] : null,    // Column G: Installments
                    'course_url' => !empty($row['J']) ? $row['J'] : null, 
                    'created_at' => !empty($row['H']) ? $row['H'] : null, 
                    'updated_at' =>!empty($row['I']) ? $row['I'] : null, 
                ]);
            }
    
            return "Courses imported successfully!";
        } catch (\Exception $e) {
            return "Error importing courses: " . $e->getMessage();
        }
    }
}
