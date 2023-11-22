<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCon;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form', [MainCon::class, 'dumpAll']);
Route::post('/form/submit', [MainCon::class, 'doCalc']);

Route::get('/templatedemo', function (){
    return view('main');
});
