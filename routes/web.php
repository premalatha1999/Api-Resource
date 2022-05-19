<?php

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
    return view('welcome');
});

Route::get('/resource', function () {
    return new \App\Http\Resources\UserResource(\App\Models\User::find());
});

Route::get('/resource-collection', function () {
    return \App\Http\Resources\UserResource::collection(\App\Models\User::orderBy('id','Desc')->get()->keyBy->id);
});

Route::get('/collection', function () {
    return (new \App\Http\Resources\UserCollection(\App\Models\User::get()))->additional(['meta' => [
        'key' => 'value',
    ]]);
});
