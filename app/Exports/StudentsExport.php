<?php
namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Fetch the student data with required fields
        return Student::select(
            'student_id',
            'name',
            'father_name',
            'doa',  // Date of Admission
            'batch',
            'photo',
            'course_id',
            'contact_number',
            'status'
        )->get()->map(function ($student) {
            $student->doa = \Carbon\Carbon::parse($student->doa)->format('Y-m-d'); // Format date
            $student->created_at = \Carbon\Carbon::parse($student->created_at)->format('Y-m-d');
            $student->updated_at = \Carbon\Carbon::parse($student->updated_at)->format('Y-m-d');
            return $student;
        });
    }
    

    public function headings(): array
    {
        // Define the headings for the columns
        return [
            'Student ID',
            'Name',
            'Father Name',
            'Date of Admission',
            'Batch',
            'Photo',
            'Course ID',
            'Contact Number',
            'Status'
        ];
    }
}
