<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view ('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
    // Validate karo inputs ko
    $request->validate([
        'name' => 'required|string|max:255|unique:students,name',
        'address' => 'required|string|max:255',
        'mobile' => 'required|string|max:15|unique:students,mobile',
    ], [
        'name.unique' => 'This name already exist.',
        'mobile.unique' => 'This mobile number is already exist.',
    ]);

    // Agar validation pass ho gaya to hi data save hoga
    Student::create([
        'name' => $request->name,
        'address' => $request->address,
        'mobile' => $request->mobile,
    ]);

    return redirect('students')->with('flash_message', 'Student Addedd!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
