<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function getRatesByStudentId(Request $request, $id)
    {
        try {
            $result = Rate::where('student_id', $id)->get();
            return response($result, 200);
        } catch (\Throwable $th) {
            return response('Something went wrong - ' . $th, 401);
        }
    }

    public function getRatesBySubjectId(Request $request, $id)
    {
        try {
            $result = Rate::where('subject_id', $id)->get();
            return response($result, 200);
        } catch (\Throwable $th) {
            return response('Something went wrong - ' . $th, 401);
        }
    }

    public function getRateswithSubjectAndStudent(Request $request, $subject_id, $student_id)
    {
        $result = Rate::where([
            ['subject_id', $subject_id],
            ['student_id', $student_id]
        ])->first();
        return $result;
    }

    public function getRatesBy(Request $request, $subject_id, $student_id)
    {
        $result = Rate::where([
            ['subject_id', $subject_id],
            ['student_id', $student_id]
        ])->first();
        return $result;
    }

    public function editRate(Request $request)
    {
        try {
            $rateCheck =  Rate::where([
                ['subject_id', $request->subject_id],
                ['student_id', $request->student_id]
            ])->first();
            if ($rateCheck) {
                $result = Rate::where('rate_id',$rateCheck->rate_id)->update([
                    'first_exam' => $request->first_exam,
                    'second_exam' => $request->second_exam,
                    'third_exam' => $request->third_exam,
                    'first_homework' => $request->first_homework,
                    'second_homework' => $request->second_homework,
                    'project_homework' => $request->project_homework
                ]);
            } else {
                $result = Rate::firstOrCreate([
                    'student_id' => $request->student_id,
                    'subject_id' => $request->subject_id,
                    'first_exam' => $request->first_exam,
                    'second_exam' => $request->second_exam,
                    'third_exam' => $request->third_exam,
                    'first_homework' => $request->first_homework,
                    'second_homework' => $request->second_homework,
                    'project_homework' => $request->project_homework
                ]);
            }

            return response($result, 201);
        } catch (\Throwable $th) {
            return response('Something went wrong - ' . $th, 401);
        }
    }
}
