<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Course; // Import the Course model
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * Define the model mapping logic here.
     */
    public function model(array $row)
    {
        try {
            // Fetch the course ID based on the course title from the database
            $course = Course::where('course_title', $row['course'])->first();

            if (!$course) {
                // Log an error if the course title is not found
                Log::error("Course not found: " . $row['course']);
                return null; // Skip this row
            }

            // Map the data to the Student model
            $student = new Student([
                'student_id' => $row['id'],        // Map 'ID' column from Excel to 'student_id'
                'name' => $row['name'],           // Map 'NAME' column
                'father_name' => $row['father'],  // Map 'FATHER' column
                'doa' => $this->formatDate($row['dt']), // Map and format 'DT' column
                'course_id' => $course->id,       // Use the course ID from the database
                'contact_number' => $row['phone'], // Map 'PHONE' column
                'batch' => $row['batch'],         // Map 'BATCH' column
                'photo' => $row['photo'],         // Map 'PHOTO' column
            ]);

            return $student;

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error("Error importing row: " . json_encode($row) . ' | Error: ' . $e->getMessage());
        }
    }

    /**
     * Format date properly for the database.
     */
    private function formatDate($date)
    {
        try {
            return Carbon::parse($date)->toDateString(); // Converts to 'YYYY-MM-DD'
        } catch (\Exception $e) {
            Log::error("Invalid date format: " . $date);
            return null; // Return null if the date is invalid
        }
    }
}
