<?php

use App\Http\Controllers\User\CreateController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\UpdateController;
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

Route::group([

  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {

  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');

  Route::group(["middleware" => "jwt.auth"], function () {
    Route::group(["namespace" => "UserOptional", "prefix" => "userOptional"], function() {
      Route::get("/","OptionalController");
    });
  });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::group(["namespace" => "User", "prefix" => "users"], function() {
  Route::post("/","StoreController");
  Route::post("/create", [CreateController::class, "create"]) -> name("users.create");
  Route::delete("/{id}", [DeleteController::class, "destroy"]) -> name("users.destroy");
  Route::put("/", [UpdateController::class, "update"]) -> name("users.update");
});
