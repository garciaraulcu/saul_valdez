<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ModelHasRoleController;
use App\Http\Controllers\ModelHasPermissionController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\CartController;




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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/changue-password', [App\Http\Controllers\HomeController::class, 'changuePassword'])->name('changue-password');
Route::post('/changue-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');


//Roles y Permisos Rutas

Route::resource('user', UserController::class);

//----------------------------Productos

Route::get('/store',  function ()
{
    return view('products');
});

Route::resource('products', ProductController::class);

Route::group(['middleware' => ['role:Superadmin']], function () {

    
    //
    //---------------Crear Roles
Route::resource('roles', RoleController::class)->middleware('auth');

/* -------------- Asignar Roles */
Route::resource('giveroles', ModelHasRoleController::class)->middleware('auth');

/* -------------- Asignar Permisos */
Route::resource('givepermissions', ModelHasPermissionController::class)->middleware('auth');

});



/* -------------- Pedidos Rutas */
Route::resource('orders', OrderController::class)->middleware('auth');
Route::get('pedidos', function ()
{
    return view('pedidos');
})->middleware('auth');

Route::post('pedidos/{id}', [App\Http\Controllers\OrderController::class, 'print'])->name('print');

/* -------------- Categorias Rutas */

Route::resource('categorias', CategoriaController::class)->middleware('auth');




//************************ Cart Routes */


Route::get('/checkout', [CartController::class, 'checkOut'])->name('checkout');


Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

