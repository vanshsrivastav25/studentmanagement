<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::all();
        return view ('teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view ('teachers.create');
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

    return redirect('teachers')->with('flash_message', 'Teacher Addedd!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $teacher = Student::find($id);
        return view('teachers.show')->with('teachers', $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $teacher = Teacher::find($id);
        return view('teachers.edit')->with('teachers', $teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $teacher = Teacher::find($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect('teachers')->with('flash_message', 'Teacher Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teacher deleted!');
    }
}
