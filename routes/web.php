<?php

use App\Http\Controllers\FamilyController;
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

Route::get('/', [FamilyController::class, 'index']);
Route::get('datatable', [FamilyController::class, 'datatable'])->name('family.datatable');
Route::get('{family_id}/edit', [FamilyController::class, 'edit'])->name('family.edit');
Route::put('{family_id}', [FamilyController::class, 'update'])->name('family.update');
Route::get('add', [FamilyController::class, 'create'])->name('family.create');
Route::post('/', [FamilyController::class, 'store'])->name('family.store');
Route::delete('{family_id}', [FamilyController::class, 'destroy'])->name('family.destroy');
Route::get('visualisasi', function(){
    return view('visualisasi');
})->name('family.visualisasi');