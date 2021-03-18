<?php

use App\Http\Livewire\Admin\AddProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\History;
use App\Http\Livewire\Admin\ListProduct;
use App\Http\Livewire\Admin\OrderDetail;
use App\Http\Livewire\Admin\OrderProduct;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Homepage;
use App\Http\Livewire\Order\Orders;
use App\Http\Livewire\Product\Frappucino;
use App\Http\Livewire\Product\MilkBased;
use App\Http\Livewire\User\Profile;
use App\Http\Livewire\User\UserHistory;
use App\Models\Order;
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

Route::get('/', Homepage::class)->name('home');
Route::get('/milk', MilkBased::class)->name('milk');
Route::get('/frappucino', Frappucino::class)->name('frappucino');


Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/profile/{user}', Profile::class)->name('profile');

Route::get('/orders', Orders::class)->name('new-order')->middleware('auth');
Route::get('/history', UserHistory::class)->name('user-history')->middleware('auth');

Route::get('/add-product', AddProduct::class)->name('add-product');
Route::get('/list-product', ListProduct::class)->name('list-product');
Route::get('/order-product', OrderProduct::class)->name('order-product');
Route::get('/order-detail/{order}', OrderDetail::class)->name('detail');
Route::get('/history-detail/{history}', History::class)->name('history');

