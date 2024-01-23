<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::controller(ProductController::class)->group(function(){
    Route::get('list','list');
    Route::get('product-paginate','dynamic_paginate');
    Route::get('trash-list','trashList');
    Route::get('soft-delete/{id}','trashDelete');
    Route::post('soft-delete-all','trashDeleteAll');
    Route::get('restore-product/{id}','restoreDeleted');
    Route::post('restore-all','restoreAll');
    Route::post('parmanent-delete','parmanentDelete');
    Route::get('create','createUser');
    Route::post('add-user','addUser');
    Route::get('edit/{id}','editUser');
    Route::post('user-edit/{id}','userEdit');


});





