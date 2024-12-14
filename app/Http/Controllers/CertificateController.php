<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of certificates.
     */
    public function index()
    {
        // Fetch all certificates with related student and course data
        $certificates = DB::table('students')
        ->join('courses', 'students.course_id', '=', 'courses.id')
        ->select(
            'students.student_id',
            'students.name',
            'students.father_name',
            'students.doa',
            'students.batch',
            'students.photo',
            'students.contact_number',
            'courses.course_title',
            'courses.duration',
            'courses.course_desc',
            'courses.course_image'
        )
        ->get();

    return view('dashboard.certificates', compact('certificates'));
    }

    /**
     * Show the certificate details for a specific student and course.
     */
    public function show($studentId, $courseId)
    {
        $certificate = Certificate::where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->first();

        if (!$certificate) {
            return redirect()->route('certificates.index')->with('error', 'Certificate not found!');
        }

        return view('dashboard.certificates', compact('certificate'));
    }

    /**
     * Generate a certificate for a specific student and course.
     */
    public function generate($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $course = Course::findOrFail($courseId);

        // Check if the certificate already exists
        $existingCertificate = Certificate::where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->first();

        if ($existingCertificate) {
            return redirect()->route('certificates.index')->with('error', 'Certificate already exists!');
        }

        // Generate a new certificate
        $certificate = Certificate::create([
            'name' => $student->name,
            'father_name' => $student->father_name,
            'dt' => now(), // Certificate date
            'date' => now(),
            'course_id' => $course->id,
            'photo' => $student->photo, // Assuming the student has a photo field
            'certificate' => 'CERT-' . strtoupper(uniqid()), // Unique certificate number
            'duration' => $course->duration,
            'desc' => $course->description,
            'grade' => 'A+', // Example grade
            'code' => strtoupper(uniqid()), // Unique code
        ]);

        return redirect()->route('certificates.index')->with('success', 'Certificate generated successfully!');
    }
}
