<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/add-category', [CategoryController::class, 'addCategory'])->name('category.add');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::put('/update-category', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    Route::delete('/delete-selected-category', [CategoryController::class, 'deleteCheckedCategory'])->name('category.deleteSelected');

    route::delete('/del-checked-post', 'PostController@deleteChecked')->name('post.del.checked');
    route::resource('post', 'PostController');
});


Route::get('/', 'HomeController@index')->name('home');


