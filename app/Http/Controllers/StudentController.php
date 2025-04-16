<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\BranchCourse;
class StudentController extends Controller
{
    // Display a listing of students
    public function index()
    { 
        $students = Student::where('status','panding')->get();
        return view('branch.index', compact('students'));
    }

    public function verifyStudents(){
        $students = Student::where('status','verified')->get();
        return view('branch.students', compact('students'));
    }
    // Show the form for creating a new student
    public function create()
    {   
        $branch = session('branch');
        $branch_id = $branch['id'];
      
        $courses = BranchCourse::with('course')->where('branch_code', $branch_id)->get();

        return view('branch.create', compact('courses'));
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'father_name' => 'nullable|string|max:100',
            'mother_name' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'tana' => 'nullable|string|max:100',
            'vill' => 'nullable|string|max:100',
            'name_of_course' => 'nullable|string|max:150',
            'address' => 'nullable|string|max:255',
            'session' => 'nullable|string|max:50',
            'year' => 'nullable|string|max:10',
            'status' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        // Create student without image/signature initially
        $student = Student::create($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('students/images', 'public');
            $student->update(['image' => $imagePath]);
        }

        // Handle signature upload
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('students/signatures', 'public');
            $student->update(['signature' => $signaturePath]);
        }

        return redirect()->back()->with('success', 'Student created successfully.');
    }
    public function verify(Student $student)
    {
        if ($student->status === 'verified') {
            return response()->json(['message' => 'Student already verified'], 400);
        }
    
        \DB::beginTransaction();
    
        try {
            // Get latest registration number (numeric part only)
            $latestReg = Student::whereNotNull('registration_no')
                ->orderByRaw('CAST(registration_no AS UNSIGNED) DESC')
                ->first();
    
            $latestRoll = Student::whereNotNull('roll_no')
                ->orderByRaw('CAST(roll_no AS UNSIGNED) DESC')
                ->first();
    
            // Generate new values
            $newRegistrationNo = $latestReg
                ? str_pad(((int)$latestReg->registration_no) + 1, 4, '0', STR_PAD_LEFT)
                : '1111';
    
            $newRollNo = $latestRoll
                ? ((int)$latestRoll->roll_no) + 1
                : 1;
    
            // Update student record
            $student->update([
                'status' => 'verified',
                'registration_no' => $newRegistrationNo,
                'roll_no' => $newRollNo
            ]);
    
            \DB::commit();
    
            return response()->json([
                'message' => 'Student verified successfully!',
                'registration_no' => $newRegistrationNo,
                'roll_no' => $newRollNo
            ]);
    
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'message' => 'Failed to verify student: ' . $e->getMessage()
            ], 500);
        }
    }
    
    // Display a specific student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show the form for editing a student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update a student
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'father_name' => 'nullable|string|max:100',
            'mother_name' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'tana' => 'nullable|string|max:100',
            'vill' => 'nullable|string|max:100',
            'name_of_course' => 'nullable|string|max:150',
            'address' => 'nullable|string|max:255',
            'session' => 'nullable|string|max:50',
            'year' => 'nullable|string|max:10',
            'status' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $student->update($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('students/images', 'public');
            $student->update(['image' => $imagePath]);
        }

        // Handle signature upload
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('students/signatures', 'public');
            $student->update(['signature' => $signaturePath]);
        }

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Delete a student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
