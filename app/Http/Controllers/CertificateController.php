<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function index()
    {
        // Fetch data with proper joins and grouping
        $certificates = DB::table('students')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->join('certificate_types', 'students.course_id', '=', 'certificate_types.course_id')
            ->select(
                'students.student_id',
                'students.name',
                'students.father_name as father',
                'students.doa as dt',
                DB::raw('DATE_ADD(students.doa, INTERVAL courses.duration MONTH) as date'),
                'courses.course_title as course',
                'students.photo',
                'certificate_types.certificate_type',
                'certificate_types.duration',
                'certificate_types.description as desc',
                DB::raw("CASE WHEN RAND() < 0.5 THEN 'A' ELSE 'A+' END as grade"), // Random grade
                DB::raw("CONCAT('NWT', LPAD(students.student_id, 5, '0'), '/', YEAR(NOW()) % 100) as code")
            )
            ->groupBy(
                'students.student_id',
                'students.name',
                'students.father_name',
                'students.doa',
                'courses.course_title',
                'students.photo',
                'certificate_types.certificate_type',
                'certificate_types.duration',
                'certificate_types.description',
                'courses.duration'
            )
            ->paginate(10); 
           

        // Return the certificates to the view
        return view('dashboard.certificates', compact('certificates'));
    }
}
