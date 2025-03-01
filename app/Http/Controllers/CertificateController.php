<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Certificate; // Make sure this is added
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log; // Import the Log facade
use Barryvdh\DomPDF\Facade\Pdf;

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

// Fetch all certificates from the certificates table without pagination
$allCertificates = DB::table('certificates')
    ->select('student_id', 'name', 'father', 'dt', 'date', 'course', 'photo', 'certificate_type', 'duration', 'description', 'grade', 'code')
    ->distinct()
    ->orderBy('student_id', 'desc')
    ->limit(10)
    ->get();

// Return the certificates to the view
return view('dashboard.certificates.certificates', compact('allCertificates'));
    }
    
  
public function downloadSelected(Request $request)
{
    $request->validate([
        'selected_certificates' => 'required|array|min:1',
    ]);

    $certificates = Certificate::whereIn('id', $request->selected_certificates)->get();

    $pdf = PDF::loadView('dashboard.certificates.selected_certificates', compact('certificates'))
    ->setPaper([0, 0, 595.276, 841.890], 'portrait'); // Enforce A4 size in portrait mode $pdf->setPaper([0, 0, 162, 256], 'portrait');

    return $pdf->download('selected_certificates.pdf');
}


public function downloadSingle($student_id)
{
    // Fetch the certificate data from the certificates table by student_id
    $certificate = Certificate::where('student_id', $student_id)->firstOrFail();

    $pdf = Pdf::loadView('dashboard.certificates.single_certificate', compact('certificate'))
        ->setPaper([0, 0, 595.276, 841.890], 'portrait'); // A4 size in portrait mode

    return $pdf->download("certificate_{$certificate->student_id}.pdf");
}



    
    public function selectCertificates()
    {
        // Fetch paginated certificates from the certificates table
        $paginatedCertificates = DB::table('certificates')
            ->select('id','student_id', 'name', 'father', 'dt', 'date', 'course', 'photo', 'certificate_type', 'duration', 'description', 'grade', 'code')
            ->distinct()
            ->orderBy('student_id', 'desc')
            ->paginate(10);
   
        // Pass the data to the view
        return view('dashboard.certificates.select_certificates', ['certificates' => $paginatedCertificates]);
    }
    
    public function viewCertificate($student_id)
    {
        $certificates = Certificate::with('course')->findOrFail($student_id);

        return view('dashboard.certificates.view_certificates', ['certificates' => [$certificates]]);
    }





    public function search(Request $request)
{
    try {
        $query = $request->input('query');

        // Fetch certificates based on search query using LIKE
        $certificates = Certificate::where('student_id', 'LIKE', "%{$query}%")
                                    ->orWhere('name', 'LIKE', "%{$query}%")
                                    ->orWhere('course', 'LIKE', "%{$query}%")
                                    ->get();

        // Return the filtered certificates as a partial view (table rows only)
        return view('dashboard.certificates.certificate_search', compact('certificates'))->render();
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error occurred during certificate search: ' . $e->getMessage());

        // Return an error response
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function searchCertificate(Request $request)
{
    try {
        $query = $request->input('query');

        // Fetch certificates based on search query using LIKE
        $certificates = Certificate::whereRaw('LOWER(student_id) LIKE ?', ["%".strtolower($query)."%"])
        ->orWhereRaw('LOWER(name) LIKE ?', ["%".strtolower($query)."%"])
        ->orWhereRaw('LOWER(course) LIKE ?', ["%".strtolower($query)."%"])
        ->get();
        // Return the filtered certificates as a partial view (table rows only)
        return response()->json(['certificates' => view('dashboard.certificates.search_certificates', compact('certificates'))->render()]);

        } catch (\Exception $e) {
        // Log the error
        Log::error('Error occurred during certificate search: ' . $e->getMessage());

        // Return an error response
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

// Method to handle search
    public function selectSearch(Request $request)
    {
        // Validate the search query
        $query = $request->input('query');

        // Fetch certificates based on the search query
        $certificates = Certificate::where('student_id', 'like', "%{$query}%")
            ->orWhere('name', 'like', "%{$query}%")
            ->orWhere('course', 'like', "%{$query}%")
            ->limit(10)
            ->get();

        // Return the partial view with filtered certificates
        $view = view('dashboard.certificates.search_select_certificates', compact('certificates'))->render();

        return response()->json(['certificates' => $view]);
    }
    
}