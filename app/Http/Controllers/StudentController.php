<?php



namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of students
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new student
    public function create()
    {
        return view('students.create');
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'middle_name'=> 'nullable|string|max:255',
            'email'      => 'required|email|unique:students,email',
            'phone_number'=> 'nullable|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'year_level' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    // Show a single student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show form for editing a student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'middle_name'=> 'nullable|string|max:255',
            'email'      => 'required|email|unique:students,email,'.$student->id,
            'phone_number'=> 'nullable|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'year_level' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}