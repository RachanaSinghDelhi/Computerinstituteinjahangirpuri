<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StudentFeesController extends Controller
{
    public function syncStudentFees()
    {
        // Fetch all students and their fees data, if any
        $data = DB::table('students')
            ->leftJoin('fees', 'students.id', '=', 'fees.student_id') // Left join to include students with no fees
            ->leftJoin('courses', 'students.course_id', '=', 'courses.id') // Join courses table
            ->select(
                'students.id as student_id',
                'students.name as student_name',
                'students.doa as admission_date',
                'students.course_id',
                'courses.total_fees as total_fee',
                DB::raw('COALESCE(SUM(fees.amount_paid), 0) as fees_paid') // Use COALESCE to handle null values
            )
            ->groupBy('students.id', 'students.name', 'students.doa', 'students.course_id', 'courses.total_fees')
            ->get();

        // Insert or update data in student_fees table
        foreach ($data as $row) {
            DB::table('student_fees')->updateOrInsert(
                [
                    'student_id' => $row->student_id,
                    'course_id' => $row->course_id,
                ],
                [
                    'student_name' => $row->student_name,
                    'admission_date' => $row->admission_date,
                    'total_fee' => $row->total_fee,
                    'fees_paid' => $row->fees_paid,
                    'status' => $row->fees_paid >= $row->total_fee ? 'Paid' : 'Pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        return redirect()->route('fees.index')->with('success', 'Student fees records synchronized successfully!');
    }
}
