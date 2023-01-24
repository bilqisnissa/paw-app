<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\VetController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('article/get/{$id}', 'App\Http\Controllers\ArticleController@readArticleId($id)');
Route::get('article/get/{id}', [ArticleController::class, 'readArticleId']);
Route::get('article/get/', [ArticleController::class, 'readArticle']);
// Route::post('article/create', [ArticleController::class, 'createArticle ']);
Route::post('article/create', 'App\Http\Controllers\ArticleController@createArticle');
//Route::resource('articles', [ArticleController::class]);

Route::get('food/get/', [FoodController::class, 'readFood']);
Route::get('food/get/{id}', [FoodController::class, 'readFoodId']);
// Route::post('food/create', [FoodController::class, 'createFood']);
Route::post('food/create', 'App\Http\Controllers\FoodController@createFood');

Route::get('vet/get/', [VetController::class, 'readVet']);
Route::get('vet/get/{id}', [VetController::class, 'readVetId']);
// Route::post('vet/create', [VetController::class, 'createVet']);
Route::post('vet/create', 'App\Http\Controllers\VetController@createVet');
