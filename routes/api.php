<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Blog; // ⬅️ TAMBAH INI

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| 
*/

// API GET ALL BLOGS → yang dipakai Next.js
Route::get('/blogs', function () {
    return Blog::all();
});

// API bawaan Laravel Sanctum (biarkan saja)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
