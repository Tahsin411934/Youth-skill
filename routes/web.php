<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
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
Route::resource('branches', BranchController::class);
Route::get('all-branch', [BranchController::class, 'showtable'])->name('branches.table');
// Authentication routes
Route::get('branche/login', [BranchController::class, 'showLoginForm']);
Route::post('branches/login', [BranchController::class, 'login'])->name('branches.login');
Route::get('branches/dashboard', [BranchController::class, 'dashboard'])->name('branches.dashboard');
Route::post('branches/logout', [BranchController::class, 'logout'])->name('branches.logout');


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
