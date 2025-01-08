<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\{
    HomeController,
    ProfileController,
    AdminController,
    Admin\UserController as AdminUserController,
    Admin\UkmController as AdminUkmController,
    UserController,
    User\UkmController as UserUkmController,
    UkmController,
    KegiatanController,
    PublicController,
    InfoKegiatanController,
    DashboardController
};

// Halaman Utama (Public Routes)
Route::get('/', [PublicController::class, 'index'])->name('home');

// UKM Routes untuk Pengguna Publik
Route::prefix('ukm')->name('ukm.')->group(function () {
    Route::get('/', [UkmController::class, 'showUkmPage'])->name('index');
    Route::get('/{id}', [UkmController::class, 'show'])->name('show');
});

// Info Kegiatan Routes
Route::prefix('infokegiatan')->name('infokegiatan.')->group(function () {
    Route::get('/', [InfoKegiatanController::class, 'index'])->name('index');
    Route::get('/{id}', [InfoKegiatanController::class, 'show'])->name('show');
});

// Autentikasi Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Redirect Setelah Login Berdasarkan Role
Route::middleware('auth')->group(function () {
    // Rute untuk redirect dashboard berdasarkan role user
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes untuk Dashboard Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('/users', AdminUserController::class); // CRUD untuk pengguna, except destroy
        Route::resource('/ukms', AdminUkmController::class); // CRUD untuk UKM
        Route::resource('/kegiatan', KegiatanController::class); // CRUD untuk Kegiatan
        
        // Custom Delete Route for Users
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.delete');
    });

    // Routes untuk Dashboard User
    Route::get('/user-dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    
    // Routes untuk UKM di Dashboard User
    Route::prefix('user')->name('user.')->group(function () {
        // Edit UKM untuk pengguna
        Route::get('/ukms/{ukm}/edit', [UserUkmController::class, 'edit'])->name('ukms.edit');
     Route::put('/ukms/{ukm}', [UserUkmController::class, 'update'])->name('ukms.update'); // Rute Update UKM
        Route::get('/ukms', [UserUkmController::class, 'index'])->name('ukms.index');
        Route::get('/ukms/{id}', [UserUkmController::class, 'show'])->name('ukms.show');
    });

    // Routes untuk Kegiatan
    Route::resource('kegiatan', KegiatanController::class); // CRUD untuk kegiatan
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create'); // Halaman untuk membuat kegiatan baru
});

// Routes untuk user profile
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::put('/user/password', [UserController::class, 'updatePassword'])->name('user.password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autentikasi tambahan
require __DIR__ . '/auth.php';
