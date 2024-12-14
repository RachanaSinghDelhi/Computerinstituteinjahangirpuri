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
            // Ensure that the required keys exist in the row.
            if (!isset($row['course']) || !isset($row['id']) || !isset($row['name']) || !isset($row['father']) || !isset($row['dt']) || !isset($row['phone']) || !isset($row['batch']) || !isset($row['photo'])) {
                Log::error("Missing required columns in row: " . json_encode($row));
                return null; // Skip this row if necessary columns are missing
            }

            // Fetch the course ID based on the course title from the database
            $course = Course::where('course_title', $row['course'])->first();

            if (!$course) {
                // Log an error if the course title is not found
                Log::error("Course not found: " . $row['course']);
                return null; // Skip this row if the course does not exist
            }

            // Format the date
            $formattedDate = $this->formatDate($row['dt']);
            if (!$formattedDate) {
                // Log if the date format is invalid
                Log::error("Invalid date format: " . $row['dt']);
                return null; // Skip this row if the date is invalid
            }

            // Map the data to the Student model
            $student = new Student([
                'student_id' => $row['id'],        // Map 'ID' column from Excel to 'student_id'
                'name' => $row['name'],           // Map 'NAME' column
                'father_name' => $row['father'],  // Map 'FATHER' column
                'doa' => $formattedDate,          // Map and format 'DT' column
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
