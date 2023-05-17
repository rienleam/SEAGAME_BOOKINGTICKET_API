<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StadiaController;

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

// get all sports
Route::resource("sports",SportController::class);

// get all matchings
Route::resource("matchings",MatchingController::class);

// get all events
Route::resource("events",EventController::class);

// get all stadias
Route::resource("stadias",StadiaController::class);

// get all bookings
Route::resource("bookings",BookingController::class);

// search an event
Route::get("/search/{keyword}",[EventController::class, "search"]);

// get event's details
Route::get("/details/{id}",[EventController::class, "getEventDetail"]);
