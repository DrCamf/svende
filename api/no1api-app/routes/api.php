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
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserMessageController;
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

// for create user
Route::get('/role', [RoleController::class, 'index']);
Route::get('/city', [CityController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/city/search/{name}', [CityController::class, 'search']);
Route::get('/city/searchzip/{zipnr}', [CityController::class, 'searchzip']);
Route::get('/courses', [CourseController::class, 'index']);

Route::get('/users/search/{email}', [UserController::class, 'search']);

Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/userscourses/{id}', [UserCoursesListController::class, 'show']);

Route::post('/login', [AuthController::class, 'login']);

//Protected routes
Route::middleware(['auth:sanctum'])->group(function  () {
    // read
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/coursematerial/{id}', [CourseMaterialController::class, 'show']);

    Route::get('/usercourse/{id}', [UserCourseController::class, 'show']);
    Route::get('/usercourseall/{id}', [UserMessageController::class, 'allmessages']);
    
    // create
    Route::post('/tutor', [TutoringController::class, 'store']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::post('/usercourse', [UserCourseController::class, 'store']);
    Route::post('/coursematerial', [CourseMaterialController::class, 'store']);
    Route::post('/tutormaterial', [TutoringMaterialController::class, 'store']);
    Route::post('/usermessage', [UserMessageController::class, 'store']);
    Route::post('/city', [CityController::class, 'store']);
    Route::post('/message', [MessageController::class, 'store']);
    
    // update
    Route::put('/role/{id}', [RoleController::class, 'update']);
    Route::put('/city/{id}', [CityController::class, 'update']);
    Route::put('/tutor/{id}', [TutoringController::class, 'update']);
    Route::put('/courses/{id}' , [CourseController::class, 'update']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::put('/coursematerial/{id}', [CourseMaterialController::class, 'update']);
    Route::put('/tutormaterial/{id}', [TutoringMaterialController::class, 'update']);
    Route::put('/usermessage/{id}', [UserMessageController::class, 'update']);
    
    // delete
    Route::delete('/role/{id}', [RoleController::class, 'destroy']);
    Route::delete('/city/{id}', [CityController::class, 'destroy']);
    Route::delete('/tutor/{id}', [TutoringController::class, 'destroy']);
    Route::delete('/courses/{id}' , [CourseController::class, 'destroy']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::delete('/coursematerial/{id}', [CourseMaterialController::class, 'destroy']);
    Route::delete('/tutormaterial/{id}', [TutoringMaterialController::class, 'destroy']);
    Route::delete('/usermessage/{id}', [UserMessageController::class, 'destroy']);
});