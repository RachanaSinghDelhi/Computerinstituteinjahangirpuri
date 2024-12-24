<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        // Fetch data with proper joins and grouping
        $certificatesData = DB::table('students')
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
                DB::raw("ELT(FLOOR(1 + RAND() * 2), 'A', 'A+') as grade"), // Random grade
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
            ->get();

        // Prepare certificates data for insertion
        $certificates = $certificatesData->map(function ($cert) {
            return [
                'student_id' => $cert->student_id,
                'name' => $cert->name,
                'father' => $cert->father,
                'dt' => $cert->dt,
                'date' => $cert->date,
                'course' => $cert->course,
                'photo' => $cert->photo,
                'certificate_type' => $cert->certificate_type,
                'duration' => $cert->duration,
                'description' => $cert->desc,
                'grade' => $cert->grade,
                'code' => $cert->code,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        // Insert the data if not already exists in the certificates table
        foreach ($certificates as $certificate) {
            DB::table('certificates')->updateOrInsert(
                ['student_id' => $certificate['student_id'], 'code' => $certificate['code']], // Unique constraints
                $certificate
            );
        }

        // Fetch paginated certificates from the certificates table without duplicates
        $paginatedCertificates = DB::table('certificates')
            ->select('student_id', 'name', 'father', 'dt', 'date', 'course', 'photo', 'certificate_type', 'duration', 'description', 'grade', 'code')
            ->distinct()
            ->orderBy('student_id', 'desc')
            ->paginate(10);

        // Return the certificates to the view
        return view('dashboard.certificates', compact('paginatedCertificates'));
    }
}

