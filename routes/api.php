<?php

use Carbon\Carbon;
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

Route::get('datavalores/{id}/valor/{valor}', function ($id,$valor) {

    $hoje = Carbon::now();

    switch ($id) {
        case 1:
            $futuro = $hoje->addMonth(12)->format('d/m/y');
            $rendimento = $valor+($valor*0.12);
            return ['data'=>$futuro,'rendimento'=>$rendimento];
            break;
        case 2:
            $futuro = $hoje->addMonth(24)->format('d/m/y');
            $rendimento = $valor+($valor*0.13*2);
            return ['data'=>$futuro,'rendimento'=>$rendimento];
            break;
        case 3:
            $futuro = $hoje->addMonth(48)->format('d/m/y');
            $rendimento = $valor+($valor*0.14*4);
            return ['data'=>$futuro,'rendimento'=>$rendimento];
            break;
    }
});
