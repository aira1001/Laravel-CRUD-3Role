<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'GardenerDesigner'])->group(function () {
    Route::get('/project/create',[ProjectController::class, 'create']);
    Route::resource("project", ProjectController::class);
});
Route::get('/project',[ProjectController::class, 'index'])->middleware((['auth']))->name("project");

require __DIR__.'/auth.php';
