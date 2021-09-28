<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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




Auth::routes();

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => 'auth'
], function(){
    Route::get('/', 'DashBoardController@index')->name('dashboard');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/add-category', [CategoryController::class, 'addCategory'])->name('category.add');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::put('/update-category', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    Route::delete('/delete-selected-category', [CategoryController::class, 'deleteCheckedCategory'])->name('category.deleteSelected');
});


Route::get('/', 'HomeController@index')->name('home');


