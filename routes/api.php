<?php

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


Route::get("/users", function(){
    return User::all();
});

Route::get("/users/{id}", function($id){
    return User::find($id);
});

Route::post('/register', function (Request $r) {
    $user=new User;
    $user->name=$r->name;
    $user->email=$r->email;
    $user->password=$r->password;
    $user->save();
    return $user;
});
