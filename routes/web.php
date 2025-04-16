<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BranchCourseController;

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Course Resource Routes
Route::resource('courses', CourseController::class);

// BranchCourse Resource Routes
Route::resource('branch-courses', BranchCourseController::class);
Route::get('/branch/assign-course', [CourseController::class, 'showtable']);
Route::get('/branch/assign-course/{branch_code}', [BranchCourseController::class, 'showCourseList']);

Route::post('/students/{student}/verify', [StudentController::class, 'verify'])->name('students.verify');

Route::resource('students', StudentController::class)->middleware('branch.auth');
Route::get('/central/panding/students', [StudentController::class, 'index']);
Route::get('/central/students', [StudentController::class, 'verifyStudents']);
Route::resource('branches', BranchController::class);
Route::get('all-branch', [BranchController::class, 'showtable'])->name('branches.table');
// Authentication routes
Route::get('branch/login', [BranchController::class, 'showLoginForm']);
Route::post('branch/login', [BranchController::class, 'login'])->name('branch.login');
Route::get('branch/dashboard', [BranchController::class, 'dashboard'])->name('branch.dashboard')->middleware('branch.auth');
Route::post('/branch/logout', [BranchController::class, 'logout'])
     ->name('branches.logout');
// Public route (no middleware)
Route::get('/public', function() {
    return "This is a public page - anyone can see it";
});

// Protected route (requires branch auth)
Route::get('/protected', function() {
    return "This is a protected page - only authenticated branches can see it";
})->middleware('branch.auth');

Route::get('/get-districts/{division_id}', function ($division_id) {
    $districts = District::where('division_id', $division_id)
                ->orderBy('name')
                ->get(['id', 'name', 'bn_name']);
    return response()->json($districts);
})->name('get-districts');

Route::get('/get-upazilas/{district_id}', function ($district_id) {
    $upazilas = Upazila::where('district_id', $district_id)
                ->orderBy('name')
                ->get(['id', 'name', 'bn_name']);
    return response()->json($upazilas);
})->name('get-upazilas');





require __DIR__.'/auth.php';
