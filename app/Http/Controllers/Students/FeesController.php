<?php
namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeesController extends Controller
{
   
        public function index()
        {
            $userId = Auth::id(); // ✅ Get authenticated user's ID
    
            // ✅ Get student_id from users table
            $studentId = User::where('id', $userId)->value('student_id');
    
            if (!$studentId) {
                return redirect()->back()->with('error', 'Student record not found.');
            }
    
            // ✅ Fetch payment details from the fees table using student_id
            $payments = Fee::where('student_id', $studentId)
                ->orderBy('payment_date', 'desc')
                ->get();
    
            // ✅ Calculate total paid and balance
            $totalPaid = $payments->sum('amount_paid');
            $totalBalance = $payments->sum('balances');
    
            return view('students.fees.fees', compact('payments', 'totalPaid', 'totalBalance'));
        }
    }

