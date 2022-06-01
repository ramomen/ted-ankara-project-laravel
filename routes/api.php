<?php

use App\Http\Controllers\RateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Student
Route::get('/student-index', [StudentController::class,'getStudents']);

Route::post('/add-student', [StudentController::class,'addStudent']);

Route::post('/update-student', [StudentController::class,'updateStudent']);

//Subject
Route::get('/subject-index', [SubjectController::class,'getSubjects']);
Route::post('/create-subject', [SubjectController::class,'createSubject']);

//Rate
Route::get('/get-student-rates/{id}', [RateController::class,'getRatesByStudentId']);

Route::get('/get-subject-rates/{id}', [RateController::class,'getRatesBySubjectId']);

Route::post('/edit-rate', [RateController::class,'editRate']);

Route::get('/get-rates/{student_id}/{subject_id}', [RateController::class,'getRateswithSubjectAndStudent']);

Route::get('/student-detail/{student_id}',[SubjectController::class,'getDetail']);
