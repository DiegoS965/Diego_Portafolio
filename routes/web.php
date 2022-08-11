<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BiographyControllers\AbilityController;
use App\Http\Controllers\BiographyControllers\ShowcaseController;
use App\Http\Controllers\BiographyControllers\BiographyController;
use App\Http\Controllers\BiographyControllers\EducationController;
use App\Http\Controllers\BiographyControllers\ExperienceController;

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


//Register and login routes
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);
Route::post('/logout', [LogoutController::class,'store'])->name('logout');

//Biography routes
Route::get('/', [BiographyController::class,'index'])->name('home');
Route::post('/', [BiographyController::class,'store']);
Route::put('/{biography}', [BiographyController::class,'update'])->name('home.update');

//Showcase routes
Route::get('/showcase',[ShowcaseController::class,'index'])->name('showcase');
Route::post('/showcase/{biography}',[ShowcaseController::class,'store'])->name('showcase.store');
Route::get('/showcase/{showcase}',[ShowcaseController::class,'sho_index'])->name('showcase.index');
Route::put('/showcase/{showcase}',[ShowcaseController::class,'update'])->name('showcase.update');
Route::delete('/showcase/{showcase}',[ShowcaseController::class,'destroy'])->name('showcase.destroy');

//Education routes
Route::get('/education',[EducationController::class,'index'])->name('education');
Route::post('/education/{biography}',[EducationController::class,'store'])->name('education.store');
Route::get('/education/{education}',[EducationController::class,'edu_index'])->name('education.index');
Route::put('/education/{education}',[EducationController::class,'update'])->name('education.update');
Route::delete('/education/{education}',[EducationController::class,'destroy'])->name('education.destroy');

//Experience routes
Route::get('/experience',[ExperienceController::class,'index'])->name('experience');
Route::post('/experience/{biography}',[ExperienceController::class,'store'])->name('experience.store');
Route::get('/experience/{experience}',[ExperienceController::class,'exp_index'])->name('experience.index');
Route::put('/experience/{experience}',[ExperienceController::class,'update'])->name('experience.update');
Route::delete('/experience/{experience}',[ExperienceController::class,'destroy'])->name('experience.destroy');

//Ability routes
Route::get('/abilities',[AbilityController::class,'index'])->name('ability');
Route::post('/abilities/{biography}',[AbilityController::class,'store'])->name('ability.store');
Route::get('/abilities/{ability}',[AbilityController::class,'abi_index'])->name('ability.index');
Route::put('/abilities/{ability}',[AbilityController::class,'update'])->name('ability.update');
Route::delete('/abilities/{ability}',[AbilityController::class,'destroy'])->name('ability.destroy');

