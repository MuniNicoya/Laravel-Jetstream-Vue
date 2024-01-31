<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use LaravelWebauthn\Models\WebauthnKey;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;

use Illuminate\Http\Request;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function (Request $request) {
        $webauthnKeys = WebauthnKey::where('user_id', $request->user()->id)->get();

        return Inertia::render('Dashboard', [
            'laravelWebauthnVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'webauthnKeys' => $webauthnKeys // check keys
        ]);
    })->name('dashboard');

    //-- Settings
    //Route::get('/settings', [SettingController::class, 'edit'])->name('setting.edit');

});



//---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //-- Settings
    Route::get('/settings', [SettingsController::class, 'edit'])->name('setting.edit');
});

