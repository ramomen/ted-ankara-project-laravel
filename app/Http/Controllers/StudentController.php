<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudents(Request $request)
    {
        $result = Student::get(
            [
                'student_id',
                'name',
                'surname',
                'departmant',
                'class',
                'birth_date'
            ]
        );
        return response($result, 200);
    }

    public function addStudent(Request $request)
    {
        try {
            $result = Student::create([
                'student_id' => $request->student_id,
                'name' => $request->name,
                'surname' => $request->surname,
                'departmant' => $request->departmant,
                'class' => $request->class,
                'birth_date' => $request->birth_date
            ]);
            return response($result, 201);
        } catch (\Throwable $th) {
            return response('Something went wrong - ' . $th, 401);
        }
    }

    public function updateStudent(Request $request)
    {
        try {
            $result = Student::updateOrCreate([
                'student_id' => $request->student_id,
                'name' => $request->name,
                'surname' => $request->surname,
                'departmant' => $request->departmant,
                'class' => $request->class,
                'birth_date' => $request->birth_date
            ]);
            return response($result, 201);
        } catch (\Throwable $th) {
            return response('Something went wrong - ' . $th, 401);
        }
    }
}
