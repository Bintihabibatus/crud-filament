<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// Route sementara untuk membuat user admin
Route::get('/create-admin', function () {
    // Ganti email dan password sesuai keinginanmu
    $user = \App\Models\User::create([
        'name' => 'Admin Super',
        'email' => 'admin@contoh.com', // Ganti dengan email yang kamu mau
        'password' => bcrypt('password123'), // Ganti dengan password yang kamu mau
        'is_admin' => true, // Sesuaikan dengan kolom di tabel users-mu
    ]);

    return "User admin berhasil dibuat! Email: admin@contoh.com, Password: password123";
});