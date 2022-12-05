<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    // return User::all();
// });


////////////////
// USER
////////////////

Route::get("/users",[UserController::class, "getUsers"]);
Route::post("/register",[UserController::class, "register"]);

// Route::post('/register', function (Request $r) {
//     $user=new User;
//     $user->name=$r->name;
//     $user->email=$r->email;
//     $user->password=$r->password;
//     $user->save();
//     return $user;
// });

////////////////

////////////////
// POST
////////////////
Route::get("/posts",[PostController::class,"getPosts"]);
Route::post("/addPost",[PostController::class,"addPost"]);

Route::get("/postLikes",[PostController::class,"getPostLikes"]);
Route::post("/addLike",[PostController::class,"addPostLike"]);
////////////////

////////////////
// EDUCATION
////////////////
Route::get("/educations",[UserController::class, "getEducations"]);
Route::post("/addEducation",[UserController::class, "addEducation"]);
////////////////

////////////////
// ACHIEVEMENT
////////////////
Route::get("/achievements",[AchievementController::class, "getAchievements"]);
Route::post("/addAchievement",[AchievementController::class, "addAchievement"]);
////////////////

////////////////
// SKILL
////////////////
Route::get("/skills",[SkillController::class, "getSkills"]);
////////////////