<?php

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Course;

require __DIR__ . '/../vendor/autoload.php';

// Bootstrapping Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    // Example Course Check
    $course = Course::firstOrCreate(['course_title' => 'Test Course']);
    if (!$course) {
        // Log an error if the course title is not found
        Log::error("Course not found: " . $row['course']);
        return null; // Skip this row
    }

    // Example Student Insert
    $student = Student::create([
        'student_id' => '12345',
        'name' => 'John Doe',
        'father_name' => 'Mr. Doe',
        'doa' => now()->toDateString(),
        'course_id' => $course->id,
        'contact_number' => '9876543210',
        'batch' => 'A1',
        'photo' => 'default.jpg',
    ]);

    echo "Student inserted successfully: " . $student->name . PHP_EOL;

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
