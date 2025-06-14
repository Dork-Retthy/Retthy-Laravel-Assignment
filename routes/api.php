<?php
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
// Normal connection
Route::get('/book/{id}', [BookController::class,'show']);  

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name("/allBooks");
    Route::get('/count', [BookController::class, 'countBooks']);
    Route::post('/create', [BookController::class, 'createBook']);
    Route::put('/edit/{id}', [BookController::class, 'edit']);
    Route::delete('/delete/{id}', [BookController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
