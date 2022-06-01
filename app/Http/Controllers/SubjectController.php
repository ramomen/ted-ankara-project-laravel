<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SubjectController extends Controller
{
    public function getSubjects(Request $request)
    {
        $result = Subject::get();
        return response($result, 200);
    }

    public function createSubject(Request $request)
    {
        try {
            $result = Subject::create([
                'subject_id' => $request->subject_id,
                'title' => $request->title,

            ]);
            return response($result, 201);
        } catch (\Throwable $th) {
            return response('Something went wrong - ' . $th, 401);
        }
    }

    public function getDetail(Request $request,$studentId)
    {
        $studentDetail = Student::where('student_id', $studentId)->first();
        $subjects = Rate::where('student_id', $studentId)->get('subject_id');
        $subs = [];
        foreach ($subjects as $item) {
            $subTitle = Subject::where('subject_id', $item->subject_id)->first();
            array_push($subs, ['title' => $subTitle->title, 'id' => $subTitle->subject_id]);
        }
        $result = [
            'student'=>$studentDetail,
            'subjects' => $subs
        ];
        return $result;
    }
}
