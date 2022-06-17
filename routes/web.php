<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ItgroupComponent;
use App\Http\Livewire\ItparkComponent;
use App\Http\Livewire\MarketComponent;
use App\Http\Livewire\ServiceComponent;
use App\Models\Product;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::group(['middleware' => ['auth']], function(){

});
Route::get('/', HomeComponent::class)->name('home');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/market', MarketComponent::class)->name('market');
Route::get('/itpark', ItparkComponent::class)->name('itpark');
Route::get('/itgroup', ItgroupComponent::class)->name('itgroup');
Route::get('service', ServiceComponent::class)->name('service');
Route::get('/contact', ContactComponent::class)->name('contact');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/index', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/show/{slug}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/edit/{slug}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/update/{slug}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
});
