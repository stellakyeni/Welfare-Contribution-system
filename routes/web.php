<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\memberController;
use Nette\MemberAccessException;
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
Route::post('/store-member', [memberController::class, 'store'])->name('store-member');
Route::get('/member', [memberController::class, 'member'])->name('member');
Route::get('/memberlist', [memberController::class, 'memberList'])->name('member-list');
Route::get('/members', [memberController::class, 'members'])->name('members');
Route::get('/home', [memberController::class, 'home'])->name('home');
Route::post('/contribute', [memberController::class, 'contribute'])->name('contribute');
Route::get('/contribute', [memberController::class, 'getContribute'])->name('get-contribute');
Route::get('/contributions', [memberController::class, 'getContributions'])->name('get-contributions');
Route::get('/my-contributions', [memberController::class, 'myContributions'])->name('my-contributions');
Route::get('/about-us', [memberController::class, 'aboutUs'])->name('about-us');
Route::get('/my-profile', [memberController::class, 'profile'])->name('profile');
Route::post('/confirm-action', [memberController::class, 'confirmAction'])->name('confirm-action');

// for editing my-contributions- 0719763148
Route::get('/edit-post/{id}', [memberController::class, 'editMyContributions'])->name('edit');
Route::put('/update-post/{id}', [memberController::class, 'updateMyContributions'])->name('update');

Route::get('/', function () {
    return view('home');
});
