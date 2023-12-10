<?php

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\WishlistController;
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

Route::get('/login', [AuthController::class, 'loginIndex'])->middleware('auth.login');
Route::get('/register', [AuthController::class, 'registerIndex'])->middleware('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/login/id', [AuthController::class, 'loginIndoIndex'])->middleware('auth.login');
Route::get('/register/id', [AuthController::class, 'registerIndoIndex'])->middleware('auth.login');

Route::get('/profile', [AuthController::class, 'userData'])->middleware('auth.guest');

Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/', [HomeController::class, 'getHomeDatas'])->middleware('auth.guest');
Route::post('/addToWishlist/{id}', [WishlistController::class, 'addToWishlist']);
Route::post('/removeFromWishlist/{id}', [WishlistController::class, 'removeFromWishlist']);
Route::get('/wishlist', [WishlistController::class, 'wishlistIndex']);
Route::get('/pets', [PetController::class, 'getPetDatas'])->middleware('auth.guest');

Route::get('/messenger', [ConversationController::class, 'index'])->middleware('auth.guest');
Route::post('/messenger', [ConversationController::class, 'createConversation'])->name('create_conversation');
Route::get('/chat/{id}', [MessageController::class, 'index']);
Route::post('/chat/{id}', [MessageController::class, 'createMessage']);

Route::get('/detail/{id}', [PetController::class, 'detailIndex']);

Route::get('/faq', [FAQController::class, 'index']);

Route::post('/adopt/{id}', [AdoptionController::class, 'createAdoption']);

Route::get('/requests', [AdoptionController::class, 'index']);
Route::put('/acceptrequest/{id}', [AdoptionController::class, 'acceptRequest']);
Route::put('/rejectrequest/{id}', [AdoptionController::class, 'rejectRequest']);

Route::get('/newadoption', [AdoptionController::class, 'createIndex']);
