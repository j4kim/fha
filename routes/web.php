<?php

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Spatie\Permission\Models\Role;

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

Volt::route('/', 'pages.dashboard')->name('dashboard');

Route::view('vue', 'vue-app');

Volt::route('funds', 'pages.funds.index')->name('funds.index');
Volt::route('funds/create', 'pages.funds.create')->name('funds.create');
Volt::route('funds/{fund}', 'pages.funds.show')->name('funds.show');
Volt::route('funds/{fund}/update', 'pages.funds.update')->name('funds.update');
Volt::route('funds/{fund}/delete', 'pages.funds.delete')->name('funds.delete');

Volt::route('funds/{fund}/lots/{lot}', 'pages.lots.show')->name('lots.show');

Volt::route('profile', 'pages.profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
