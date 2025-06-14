<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('books')->group(function () {
    // Normal connection
    Route::get('/book/{id}', [BookController::class,'show']); 
    Route::get('/', [BookController::class, 'index'])->name("/allBooks");
    Route::get('/count', [BookController::class, 'countBooks']);
    Route::post('/create', [BookController::class, 'createBook']);
    Route::put('/edit/{id}', [BookController::class, 'edit']);
    Route::delete('/delete/{id}', [BookController::class, 'delete']);
});

Route::prefix('authors')->group(function () {
    // Normal connection
    Route::get('/author/{id}', [AuthorController::class, 'show']);
    Route::get('/', [AuthorController::class, 'index'])->name("/allAuthors");
    Route::get('/count', [AuthorController::class, 'countAuthors']);
    Route::post('/create', [AuthorController::class, 'createAuthor']);
    Route::put('/edit/{id}', [AuthorController::class, 'edit']);
    Route::delete('/delete/{id}', [AuthorController::class, 'delete']);
});

Route::prefix('users')->group(function () {
    // Normal connection
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::get('/', [UserController::class, 'index'])->name("/allUsers");
    Route::post('/create', [UserController::class, 'createUser']);
    Route::put('/edit/{id}', [UserController::class, 'edit']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
