<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferSkillController;
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


Route::middleware([""])->group(function(){
    ////////////////
    // USER
    ////////////////

    Route::get("/users",[UserController::class, "getUsers"]);
    Route::get("/friend",[UserController::class,"getFriends"]);
    Route::get("/newfriend",[UserController::class,"getNewFriend"]);
    Route::get("/searchuser",[UserController::class,"searchuser"]);
    Route::post("/register",[UserController::class, "register"]);
    Route::post("/editprofile",[UserController::class, "editProfile"]);
    Route::post("/upload",[UserController::class, "uploadGambar"]);

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
    Route::post("/deletelike",[PostController::class,"removeLike"]);

    Route::get("/allPostRelated",[PostController::class, "getAllPostRelated"]);

    Route::get("/getComment",[PostController::class, "getAllComment"]);
    Route::post("/addcomment", [PostController::class, "addPostComment"]);
    ////////////////

    ////////////////
    // EDUCATION
    ////////////////
    Route::get("/educations",[EducationController::class, "getEducations"]);
    Route::post("/addeducation",[EducationController::class, "addEducation"]);
    Route::post("deleteedu",[EducationController::class, "deleteUserEducation"]);
    Route::post("/updateedu",[EducationController::class, "updateUserEdu"]);
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
Route::get('/friendtochat',[ChatController::class, "friendtoChat"]);
Route::get('/friendtodchat',[ChatController::class, "friendtoDchat"]);
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
    Route::get("/getuserlanguages",[LanguageController::class, "getUserLanguages"]);
    Route::post("/adduserlanguages",[LanguageController::class, "addUserLanguages"]);
    Route::post("/deleteuserlanguages",[LanguageController::class, "deleteUserLanguages"]);
    ////////////////

    ////////////////
    // FOLLOWS
    ////////////////
    Route::get("/follows",[FollowController::class, "getFollows"]);
    Route::get("/searchfollows",[FollowController::class, "searchFollows"]);
    Route::get("/getunfriend",[FollowController::class, "getunfriend"]);
    Route::get("/searchunfriend",[FollowController::class, "searchunfriend"]);
    Route::post("/addfollows",[FollowController::class, "addFollows"]);
    Route::post("/removefollows",[FollowController::class, "removefollows"]);
    ////////////////

    ////////////////
    // EXPERIENCE
    ////////////////
    Route::get("/experiences",[ExperienceController::class, "getExperience"]);
    Route::post("/addexperiences",[ExperienceController::class, "addExperience"]);
    ////////////////

    ////////////////
    // OFFERS
    ////////////////
    Route::get("/offers",[OfferController::class, "getOffers"]);
    Route::post("/addoffer",[OfferController::class, "addOffer"]);
    Route::get("/searchoffers",[OfferController::class, "searchoffers"]);
    Route::post("/deleteoffer",[OfferController::class, "deleteOffer"]);
    Route::post("/editoffer",[OfferController::class, "editOffer"]);
    ////////////////

    ////////////////
    // OFFERS SKILL
    ////////////////
    Route::get("/offers_skill",[OfferSkillController::class, "getOfferSkill"]);
    Route::get("/search_offers_skill",[OfferSkillController::class, "search_offers_skill"]);
    Route::post("/addoffer_skill",[OfferSkillController::class, "addOfferSkill"]);
    ////////////////
});