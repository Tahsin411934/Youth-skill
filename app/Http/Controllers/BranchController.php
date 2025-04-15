<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return Branch::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::orderBy('name')->get(['id', 'name', 'bn_name']);
        return view('central.branches.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validated = $request->validate([
            'branch_name' => 'required|string|max:255',
            'email' => 'required|email|unique:branches',
            'address' => 'required|string',
            'upazila_id' => 'required|integer',
            'district_id' => 'required|integer|max:100',
            'division_id' => 'required|integer|max:100',
            'phone' => 'nullable|string|max:20',
            'login_username' => 'required|string|max:100|unique:branches',
            'password' => 'required|string|min:8|confirmed',
            
        ]);

        Branch::create([
            'branch_name' => $validated['branch_name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'upazila_id' => $validated['upazila_id'],
            'district_id' => $validated['district_id'],
            'division_id' => $validated['division_id'],
            'phone' => $validated['phone'],
            'login_username' => $validated['login_username'],
            'password_hash' => Hash::make($validated['password']),
            
        ]);

        return redirect()->back()->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));
    }
    public function showtable()
    {
        return view('central.branches.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'branch_name' => 'required|string|max:255',
            'email' => 'required|email|unique:branches,email,'.$branch->id,
            'address' => 'required|string',
            'upazila' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'login_username' => 'required|string|max:100|unique:branches,login_username,'.$branch->id,
            'password' => 'nullable|string|min:8',
        ]);

        $updateData = [
            'branch_name' => $validated['branch_name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'upazila' => $validated['upazila'],
            'phone' => $validated['phone'],
            'login_username' => $validated['login_username'],
        ];

        if (!empty($validated['password'])) {
            $updateData['password_hash'] = Hash::make($validated['password']);
        }

        $branch->update($updateData);

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }

    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('branch.login');
    }

    /**
     * Handle branch login
     */
    public function login(Request $request)
    { 
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $branch = Branch::where('login_username', $credentials['username'])->first();
    
        if (!$branch || !Hash::check($credentials['password'], $branch->password_hash)) {
            return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
        }
    
        // Store branch in session
        session(['branch' => $branch]);
    
        return redirect()->route('branches.dashboard')->with('success', 'Login successful');
    }

    /**
     * Branch dashboard
     */
    public function dashboard()
    {
        if (!session('branch')) {
            return redirect()->route('branches.login');
        }

        return view('branches.dashboard', ['branch' => session('branch')]);
    }

    /**
     * Logout
     */
    public function logout()
    {
        session()->forget('branch');
        return redirect()->route('branches.login')->with('success', 'Logged out successfully');
    }
}