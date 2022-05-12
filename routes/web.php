<?php

use App\Http\Controllers\ProdutoController;
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
    return redirect(url('dashboard'));
});

Route::get('/dashboard', function () {
    return view('usuario.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::controller(ProdutoController::class)->group(function () {
        Route::get('/produto/{id}', 'show');
        Route::get('/produto/', 'index');
        Route::get('/produto/create', 'create');
        Route::post('/produto', 'store');
    });
});
