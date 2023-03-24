<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserCoursesListController;
use App\Http\Controllers\TutoringController;
use App\Http\Controllers\CourseMaterialController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Public routes

Route::get('/role', [RoleController::class, 'index']);
Route::get('/city', [CityController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/userscourses/{id}', [UserCoursesListController::class, 'show']);

Route::post('/login', [AuthController::class, 'login']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

   
    Route::post('/tutor', [TutoringController::class, 'store']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::post('/usercourse', [UserCourseController::class, 'store']);
    Route::get('/coursematerial/{id}', [CourseMaterialController::class, 'show']);
    Route::post('/coursematerial', [CourseMaterialController::class, 'store']);

});