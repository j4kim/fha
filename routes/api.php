<?php

use App\Models\Fund;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('funds/recent', function () {
    return Fund::orderBy('updated_at', 'desc')->limit(5)->get();
});

Route::get('funds', function (Request $request) {
    $search = strtolower($request->search);
    $query = Fund::query();
    if ($search) {
        $query->where(DB::raw('LOWER(name)'), 'like', "%$search%")
            ->orWhere(DB::raw('LOWER(description)'), 'like', "%$search%")
            ->orWhere(DB::raw('LOWER(ref)'), 'like', "%$search%");
    }
    return $query->get();
});

Route::get('funds/{fund}', function (Fund $fund) {
    return $fund->load('lots');
});

Route::get('lots/{lot}', function (Lot $lot) {
    return $lot->load('fund');
});
