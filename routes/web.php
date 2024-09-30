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

Volt::route('_/', 'pages.dashboard')->name('dashboard');

Volt::route('_/funds', 'pages.funds.index')->name('funds.index');
Volt::route('_/funds/create', 'pages.funds.create')->name('funds.create');
Volt::route('_/funds/{fund}', 'pages.funds.show')->name('funds.show');
Volt::route('_/funds/{fund}/update', 'pages.funds.update')->name('funds.update');
Volt::route('_/funds/{fund}/delete', 'pages.funds.delete')->name('funds.delete');

Volt::route('_/funds/{fund}/lots/{lot}', 'pages.lots.show')->name('lots.show');

Volt::route('_/profile', 'pages.profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::get('{any}', function () {
    return view('vue-app');
})->where('any', '^(?!api).*$');
