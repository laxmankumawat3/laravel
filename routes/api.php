<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\userController;


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


// Route::post('/user/create' , function (Request $request) {
//     return "post route";
// });
// **************************************************** User Controller Route ********************************************

Route::get("/user", function (Request $request) {
    return view("user");
});

Route::post("/user/creates", 'App\Http\Controllers\api\userController@store') ;
Route::get('/user/get',[userController::class, 'index']) ;
// if primary key is id that not nedd to mention in modal to mention it , here you can see how to pass id  ;
Route::get('/user/{id}',[userController::class, 'show']) ;
// delete user
Route::delete('/user/{id}',[userController::class, 'destroy']) ;
// update user put method
Route::put('/user/{id}',[userController::class,'update']) ;
Route::patch('/user/{id}',[userController::class,'changePassword']) ;



// **************************************************** End User Controller Route ********************************************
/*

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('laxman', function (Request $request) {
    return 'laxman is in api route ';
});

Route::get('laxman', function (Request $request) {
    return 'laxman is in api route ';
});
Route::post('laxman', function (Request $request) {
    return 'laxman is in api route  post method';
});
// here we cann't send data echo only reponse fuction use 
Route::post('/json', function (Request $request) {
    return response()->json("thi is json response");
});    
Route::put('/json/{id}', function ($id) {
    return response("id of user". $id);
});    
Route::delete('/json/{id}', function ($id) {
    return response("thi is json response" . $id, 200);
});    
*/ 