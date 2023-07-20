<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MajorController;

use App\Http\Controllers\ResetPasswordController;

use App\Http\Controllers\RegisterMailcontroller;
use App\Http\Controllers\RegisterWorkShopController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkShopController;
use App\Http\Controllers\Workshops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/majors/{id}',[SkillController::class,'MajorDetail']);


// User side -----------------------------------------
Route::post('/users',[UserController::class, 'store']);
// Route::get('/users',[UserController::class, 'index']);
Route::post('/roles',[RoleController::class, 'store']);


Route::get('/majors',[SkillController::class,'getmajors']);
Route::get('/majors/{id}',[SkillController::class,'getmajor']);
Route::get('/schools/{id}',[SchoolController::class,'getschool']);

Route::get('/workshops',[Workshops::class,'getWorkshops']);
Route::get('/workshop/{id}',[Workshops::class,'getWorkshop']);
Route::get('/user/{id}',[UserController::class,'getUser']);
Route::put('/user/{id}',[UserController::class,'saveChange']);

Route::get('/schools',[SchoolController::class,'getschools']);
Route::get('/scholarships/{id}',[ScholarshipController::class,'getScholarship']);
Route::get('/scholarships',[ScholarshipController::class,'scholarships']);
Route::get('/workshops',[WorkShopController::class,'workshops']);


// Admin side --------------------------------

Route::get('/users', [AdminController::class, 'index']);
Route::get('/user/{id}', [AdminController::class, 'getUser']);
Route::put('/user/{id}', [AdminController::class, 'updateUser']);
Route::delete('/user/{id}', [AdminController::class, 'destroy']);
Route::get('/students', [AdminController::class, 'getStudents']);
Route::get('/managers', [AdminController::class, 'getUniversityDirectors']);





// log in and log out
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logOut', [AuthenticationController::class, 'logout']);
});
Route::post('/logIn', [AuthenticationController::class,'login']);

Route::patch('/resetPassword',[ResetPasswordController::class,'resetPassword']);
// Route::post('/sendMail',[ResetPasswordController::class,'SendMail'])
Route::post('/sendMail',[ResetPasswordController::class,'SendMail']);

// university page register 
Route::post('/registerMail',[UserController::class,'sendEmail']);

// get user that already register in workshop
Route::post('/registerWorkShop', [RegisterWorkShopController::class, 'registerWorkShop']);

// count user in workshop
Route::get('/workshops/{workshopId}', [WorkShopController::class, 'countUsersInWorkshop']);