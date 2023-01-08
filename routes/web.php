<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\Post;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard',[
        'posts' => Post::all(),
        'page'=> 'dashboard',
    ]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/Table', function () {
    return Inertia::render('Dashboard',[
        'posts' => Post::all(),
    ]);
})->name('Tablex');

Route::middleware(['auth:sanctum', 'verified'])->get('/posts', function () {
    return Response::json([
        'data' => Post::paginate(9)
    ], 201);
})->name('posts');

Route::middleware([
    'auth:sanctum',
    // config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Route::group(['prefix' => 'super_admin', 'middleware' => 'is_super_admin', 'as' => 'admin.super.'], function () {
    //     // Dashboard for super admini
    //     Route::get('/dashboard', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'index'])->name('dashboard');

    //     Route::get('/management', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'management'])->name('management');

    //     Route::post('/addHospitalAdministrator', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'addHospitalAdministrator'])->name('addHospitalAdministrator');

    //     Route::post('/addDoctor', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'addDoctor'])->name('addDoctor');

    //     Route::post('/addPatient', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'addPatient'])->name('addPatient');

    //     Route::post('/editHospitalAdministrator', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'editHospitalAdministrator'])->name('editHospitalAdministrator');

    //     Route::post('/editDoctor', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'editDoctor'])->name('addDoctor');

    //     Route::post('/editPatient', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'editPatient'])->name('editPatient');

    //     Route::post('/deleteHospitalAdministrator', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'deleteHospitalAdministrator'])->name('deleteHospitalAdministrator');

    //     Route::post('/deleteDoctor', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'deleteDoctor'])->name('deleteDoctor');

    //     Route::post('/deletePatient', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'deletePatient'])->name('deletePatient');

    //     Route::get('/hospitalAdministrators', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'hospitalAdministrators'])->name('hospitalAdministrators');

    //     Route::get('/hospitalDoctors', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'hospitalDoctors'])->name('hospitalDoctors');

    //     Route::get('/hospitalPatients', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'hospitalPatients'])->name('hospitalPatients');

    //     Route::get('/searchHospitalAdministrators', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'searchHospitalAdministrators'])->name('searchHospitalAdministrators');
    // });

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        //Page one
        Route::get('/pageOne', function () {
            return Inertia::render('Dashboard',[
                'posts' => Post::all(),
                'page'=> 'dashboard',
            ]);
        })->name('pageOne');

        //Page two
        Route::get('/pageTwo', function () {
            return Inertia::render('Dashboard',[
                'posts' => Post::all(),
                'page'=> 'dashboard',
            ]);
        })->name('pageTwo');

        //Page three
        Route::get('/pageThree', function () {
            return Inertia::render('Dashboard',[
                'posts' => Post::all(),
                'page'=> 'dashboard',
            ]);
        })->name('pageThree');
    });

    Route::group(['prefix' => 'tables', 'as' => 'tables.'], function () {
        Route::get('/show', [\App\Http\Controllers\TableController::class, 'show'])->name('show');
        // Route::get('/management', [\App\Http\Controllers\Doctor\TaskController::class, 'index'])->name('management');

        // Route::get('/dashboard', [\App\Http\Controllers\Doctor\TaskController::class, 'index'])->name('dashboard');
        // Route::get('/management', [\App\Http\Controllers\Doctor\TaskController::class, 'index'])->name('management');
    });

    // Route::group(['prefix' => 'patient', 'middleware' => 'is_patient', 'as' => 'patient.'], function () {
    //     Route::get('/dashboard', [\App\Http\Controllers\Patient\DashboardController::class, 'index'])->name('dashboard');
    //     Route::get('/auth/google', [\App\Http\Controllers\Patient\GoogleController::class, 'redirectToGoogle'])->name('auth');
    //     Route::get('auth/google/callback', [\App\Http\Controllers\Patient\GoogleController::class, 'handleGoogleCallback']);
    // });

    // Route::get('/dashboard2', function () {

    //     if (auth()->user()->role == \App\Models\User::is_super_admin) {
    //         return redirect()->route('admin.super.dashboard');
    //     } elseif (auth()->user()->role == \App\Models\User::is_hospital_admin) {
    //         return redirect()->route('admin.hospital.dashboard');
    //     } elseif (auth()->user()->role == \App\Models\User::is_a_doctor) {
    //         return redirect()->route('doctor.dashboard');
    //     } elseif (auth()->user()->role == \App\Models\User::is_a_patient) {
    //         return redirect()->route('patient.dashboard');

    //     } else {
    //         return redirect()->back();
    //     }

    // })->name('dashboard');

    Route::get('/test', function () {
        return json_encode(\App\Models\User::latest()->get());
    });
});