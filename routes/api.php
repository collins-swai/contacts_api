<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;


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

Route::middleware('auth:api')->get('/my-protected-route', 'MyController@myProtectedMethod');



// Route::post('register', 'AuthController@register');
// Route::post('login', 'AuthController@login');
// Route::middleware('auth:api')->group(function () {
//     Route::get('user', 'AuthController@user');
//     Route::post('logout', 'AuthController@logout');
// });

Route::middleware('auth:api')->group(function () {
    
    Route::get('/contacts', [ContactController::class, 'index']); 

    Route::get('/contacts/{contact}', [ContactController::class, 'show']); 
    
    Route::post('/contacts', [ContactController::class, 'store']); 

    Route::put('/contacts/{contact}', [ContactController::class, 'update']); 

    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']); 
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Contact Management
Route::middleware('auth:api')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index']); // Get all contacts
    Route::get('/contacts/{contact}', [ContactController::class, 'show']); // Get a specific contact
    Route::post('/contacts', [ContactController::class, 'store']); // Create a new contact
    Route::put('/contacts/{contact}', [ContactController::class, 'update']); // Update a contact
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']); // Delete a contact
});

Route::middleware('auth:api')->group(function () {
    // Routes for managing groups
    Route::get('/groups', [GroupController::class, 'index']); // Get all groups
    Route::get('/groups/{group}', [GroupController::class, 'show']); // Get a specific group
    Route::post('/groups', [GroupController::class, 'store']); // Create a new group
    Route::put('/groups/{group}', [GroupController::class, 'update']); // Update a group
    Route::delete('/groups/{group}', [GroupController::class, 'destroy']); // Delete a group
});
