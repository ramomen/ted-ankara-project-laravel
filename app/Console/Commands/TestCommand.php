<?php

namespace App\Console\Commands;

use App\Models\Rate;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $res = Rate::where('student_id',192807)->get('subject_id');
        // dd($res);
        $studentId = 174444;
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
        dd(json_encode($result));
    }
}
