<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\OrganizationController;
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
Route::get("/friend",[UserController::class,"getFriends"]);
Route::get("/newfriend",[UserController::class,"getNewFriend"]);
Route::post("/register",[UserController::class, "register"]);
Route::post("/editprofile",[UserController::class, "editProfile"]);

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
// COMPANY
////////////////

// request : id, email, password
Route::get("/companies",[CompanyController::class, "getCompany"]);
// search LIKE name
Route::get("/searchCompany",[CompanyController::class, "searchCompany"]);
////////////////

////////////////
// POST
////////////////
Route::get("/posts",[PostController::class,"getPosts"]);
Route::post("/addpost",[PostController::class,"addPost"]);

Route::get("/postlikes",[PostController::class,"getPostLikes"]);
Route::post("/addlike",[PostController::class,"addPostLike"]);
////////////////

////////////////
// EDUCATION
////////////////
Route::get("/educations",[EducationController::class, "getEducations"]);
Route::post("/addeducation",[EducationController::class, "addEducation"]);
////////////////

////////////////
// ACHIEVEMENT
////////////////
Route::get("/achievements",[AchievementController::class, "getAchievements"]);
Route::post("/addachievement",[AchievementController::class, "addAchievement"]);
////////////////

////////////////
// SKILL
////////////////
Route::get("/skills",[SkillController::class, "getSkills"]);
Route::get("/userskill",[SkillController::class, "getUserSkill"]);
Route::post("/adduserskill",[SkillController::class, "addUserSkill"]);
Route::get("/getallskil",[SkillController::class, "getAllSkill"]);
Route::post("/deleteuserskill",[SkillController::class, "deleteuserskill"]);
////////////////

////////////////
// CHATS
////////////////
Route::get("/chats",[ChatController::class, "getHChats"]);
Route::get("/userchat",[ChatController::class, "getDChats"]);
Route::post("/addchat",[ChatController::class, "addHchat"]);
Route::post("/adduserchat",[ChatController::class, "addDchat"]);

////////////////
// COMMENT
////////////////
Route::get("/comments",[CommentController::class, "getComments"]);
Route::post("/addcomments",[CommentController::class, "addComment"]);
////////////////

////////////////
// ORGANIZATIONS
////////////////
Route::get("/organizations",[OrganizationController::class, "getOrganizations"]);
Route::post("/addorganizations",[OrganizationController::class, "addOrganization"]);
////////////////

////////////////
// LANGUAGES
////////////////
Route::get("/languages",[LanguageController::class, "getLanguages"]);
////////////////

////////////////
// FOLLOWS
////////////////
Route::get("/follows",[FollowController::class, "getFollows"]);
Route::get("/searchfollows",[FollowController::class, "searchFollows"]);
Route::post("/addfollows",[FollowController::class, "addFollows"]);
////////////////

////////////////
// EXPERIENCE
////////////////
Route::get("/experiences",[ExperienceController::class, "getExperience"]);
Route::post("/addexperiences",[ExperienceController::class, "addExperience"]);
////////////////
