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
            'webauthnKeys' => $webauthnKeys, 
            'message' => 'JOJOJOJO' // check keys
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
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');

    Route::get('/scanners/cedula', function (Request $request) {
  
     // TODO: move to controller 
      $verification = [
        'id' => '1',
        'type' => 'identity',
        'title' => 'Verification ID Title', 
        'subtype' => 'base_pics',
        'internal_description' => 'Requests 4 Pictures to use as Base for Subsequent facial IDs.',
        'uploads' => false,
        'instructions' => 'Follow the instructions for identity verification.',
        'fields' => [
          ['id' => 'img1', 'src' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png', 'alt' => 'Extra large avatar', 'name' => 'Image 1', 'instructions' => 'Instructions for Image 1.', 'uploaded' => false],
          ['id' => 'img2', 'src' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png', 'alt' => 'Extra large avatar', 'name' => 'Image 2', 'instructions' => 'Instructions for Image 2.', 'uploaded' => false],
          ['id' => 'img3', 'src' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png', 'alt' => 'Extra large avatar', 'name' => 'Image 3', 'instructions' => 'Instructions for Image 3.', 'uploaded' => false],
          ['id' => 'img4', 'src' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png', 'alt' => 'Extra large avatar', 'name' => 'Image 4', 'instructions' => 'Instructions for Image 4.', 'uploaded' => false],
      ],
     ];

      return Inertia::render('Cedula/Show', [
          'laravelWebauthnVersion' => Application::VERSION,
          'phpVersion' => PHP_VERSION,
          'verification' => $verification,

      ]);
    })->name('cedula');


    Route::get('/scanners/estados', function (Request $request) {
  
     // TODO: move to controller 
      $verification = [
        'id' => '1',
        'type' => 'bank_statement',
        'title' => 'Escaneo de Estados Bancarios', 
        'subtype' => 'bank_income_verification',
        'internal_description' => 'Verify Min or Average Monthly Income',
        'uploads' => false,
        'instructions' => 'Elija un Estado de Cuenta Bancario',
        'fields' => [],
        'validations' => [

        ]
     ];

      return Inertia::render('Estados/Show', [
          'laravelWebauthnVersion' => Application::VERSION,
          'phpVersion' => PHP_VERSION,
          'verification' => $verification,
          'verificationTitle' => $verification['title'],

      ]);
    })->name('estados');

    Route::get('/user/addresses', function (Request $request) {
  

 
       return Inertia::render('Profile/Direcciones', [
           'laravelWebauthnVersion' => Application::VERSION,
           'phpVersion' => PHP_VERSION,
 
       ]);
     })->name('addresses');


     Route::get('/scanners/image2text', function (Request $request) {
 
 
       return Inertia::render('Scanners/Image2Text', [
           'laravelWebauthnVersion' => Application::VERSION,
           'phpVersion' => PHP_VERSION,
       
 
       ]);
     })->name('image2text');



//asas

});


// ---



