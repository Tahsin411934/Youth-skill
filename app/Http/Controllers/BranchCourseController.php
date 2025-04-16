<?php


namespace App\Http\Controllers;

use App\Models\BranchCourse;
use App\Models\Branch;
use App\Models\Course;
use Illuminate\Http\Request;

class BranchCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchCourses = BranchCourse::with(['branch', 'course'])->latest()->get();
        return view('branch-courses.index', compact('branchCourses'));
    }

    public function showCourseList($branch_code){
        $courses = Course::all();
        $branchCourses = BranchCourse::where('branch_code', $branch_code)->get();
        return view('central.courses.branch-courses', compact('courses','branchCourses','branch_code'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $courses = Course::all();
        return view('branch-courses.create', compact('branches', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'branch_code' => 'required|exists:branches,id',
            'courses' => 'sometimes|array',
            'courses.*' => 'integer|exists:courses,id'
        ]);
    
        $branch_code = $request->branch_code;
    
        // First, delete all existing assignments for the branch
        BranchCourse::where('branch_code', $branch_code)->delete();
    
        // Then, insert the new ones (if provided)
        if (!empty($request->courses)) {
            foreach ($request->courses as $course_id) {
                BranchCourse::create([
                    'branch_code' => $branch_code,
                    'course_code' => $course_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Course assignments updated successfully.'
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(BranchCourse $branchCourse)
    {
        return view('branch-courses.show', compact('branchCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchCourse $branchCourse)
    {
        $branches = Branch::all();
        $courses = Course::all();
        return view('branch-courses.edit', compact('branchCourse', 'branches', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchCourse $branchCourse)
    {
        $validated = $request->validate([
            'branch_code' => 'required|exists:branches,code',
            'course_code' => 'required|exists:courses,code'
        ]);

        $branchCourse->update($validated);

        return redirect()->route('branch-courses.index')
                        ->with('success', 'Branch-Course assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchCourse $branchCourse)
    {
        $branchCourse->delete();

        return redirect()->route('branch-courses.index')
                        ->with('success', 'Branch-Course assignment removed successfully.');
    }
}