<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use LaravelWebauthn\Models\WebauthnKey;

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

    // Route::get('/registerWaKey', function () {
    //     return Inertia::render('registerWaKey');
    // })->name('registerWaKey');

});



// // WebAuthn
// Route::group([
//     'middleware' => array_filter(array_merge(
//         config('webauthn.middleware', ['web']),
//         [
//             config('webauthn.auth_middleware', 'auth').':'.config('webauthn.guard', 'web'),
//         ]
//     )),
// ], function () {
//     // Webauthn key registration
//     if (config('webauthn.views.register') !== null) {
//         Route::get('keys/create', [WebauthnKeyController::class, 'create'])->name('webauthn.create');
//     }
//     Route::post('keys/options', [WebauthnKeyController::class, 'create'])->name('webauthn.store.options');
//     Route::post('keys', [WebauthnKeyController::class, 'store'])->name('webauthn.store');
//     Route::delete('keys/{id}', [WebauthnKeyController::class, 'destroy'])->name('webauthn.destroy');
//     Route::put('keys/{id}', [WebauthnKeyController::class, 'update'])->name('webauthn.update');
// });

