<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;

Route::apiResource('classrooms', ClassroomController::class);
Route::apiResource('grades', GradeController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('parents', ParentController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('attendance', AttendanceController::class);
Route::apiResource('exam-types', ExamTypeController::class);
Route::apiResource('exams', ExamController::class);
Route::apiResource('exam-results', ExamResultController::class);

