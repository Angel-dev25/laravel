<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Mostrar lista de estudiantes
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('students.create');
    }

    // Almacenar un nuevo estudiante
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'codigo' => 'required|unique:students',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Actualizar datos del estudiante
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'codigo' => 'required|unique:students,codigo,' . $student->id,
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    // Eliminar estudiante
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
