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

Route::view('/', 'dashboard')->name('dashboard');

Volt::route('funds', 'funds.index')->name('funds.index');
Volt::route('funds/create', 'funds.create')->name('funds.create');
Volt::route('funds/{fund}', 'funds.show')->name('funds.show');
Volt::route('funds/{fund}/update', 'funds.update')->name('funds.update');
Volt::route('funds/{fund}/delete', 'funds.delete')->name('funds.delete');

Volt::route('funds/{fund}/lots/{lot}', 'lots.show')->name('lots.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
