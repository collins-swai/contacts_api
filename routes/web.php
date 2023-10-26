<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// View the list of contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// View the contact creation form
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Store a new contact
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// View a specific contact
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

// View the contact editing form
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

// Update an existing contact
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

// Delete a contact
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
