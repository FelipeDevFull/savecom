<?php

use App\Http\Controllers\ProfileController;
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
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
                
    Route::prefix('admin')->group(function () {
    
    Route::get('/', 'App\Http\Controllers\Painel\PainelController@index')->name('PainelController.index');
    Route::get('/create', 'App\Http\Controllers\Painel\PainelController@create')->name('PainelController.create');
    Route::post('/store', 'App\Http\Controllers\Painel\PainelController@store')->name('PainelController.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Painel\PainelController@edit')->name('PainelController.edit');
    Route::put('/update/{id}', 'App\Http\Controllers\Painel\PainelController@update')->name('PainelController.update');
    Route::delete('/delete/{id}', 'App\Http\Controllers\Painel\PainelController@destroy')->name('PainelController.delete');
    Route::any('/search', 'App\Http\Controllers\Painel\PainelController@search')->name('PainelController.search');
    
   });

});

require __DIR__.'/auth.php';
