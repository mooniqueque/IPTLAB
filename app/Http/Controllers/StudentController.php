<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:15',
            'dob' => 'nullable|date',
        ]);

        $student = Student::create($request->all());

        return response()->json($student, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($student, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:students,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'dob' => 'nullable|date',
        ]);

        $student->update($request->all());

        return response()->json($student, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], Response::HTTP_OK);
    }
}
