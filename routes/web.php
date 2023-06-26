<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/business-contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/business-contacts/show/{contacts}', [ContactsController::class, 'show'])->name('contacts.show');
Route::get('/business-contacts/edit/{contacts}', [ContactsController::class, 'edit'])->name('contacts.edit');
Route::patch('/business-contacts/update/{contacts}', [ContactsController::class, 'update'])->name('contacts.update');
