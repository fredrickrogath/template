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
// Route::get('/trigger/{data}', function ($data) {
//     echo "<p>You have sent $data</p>";
//     event(new App\Events\NewPostPublished($data));
// });

//Add fake users for testing
Route::get('/add/users', function () {
    // dd(\App\Models\User::with(['posts' => function($query) {
    //     // $query->orderBy('id','desc');
    // }])->get()->first());

    // dd(\App\Models\Post::with(['user' => function($query) {
    //     // $query->orderBy('id','desc');
    // }])->get()->first());

    // App\Models\User::factory()->count(100)->create();
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard',[
//         'posts' => Post::all(),
//         'page'=> 'dashboard',
//     ]);
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/Table', function () {
//     return Inertia::render('Dashboard',[
//         'posts' => Post::all(),
//     ]);
// })->name('Tablex');

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
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'DetermineUserRole'])->name('dashboard');

    Route::get('storagee/', function($fileName){
        return Storage::disk('public')->url('storage/systemFiles/images/1.jpg');
    });

    Route::group(['prefix' => 'head', 'middleware' => 'is_head', 'as' => 'head.'], function () {
        // Routes for head
        Route::get('/dashboard', [\App\Http\Controllers\Head\DashboardController::class, 'dashboard'])->name('dashboard');

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

        //Page four
        Route::get('/pageFour', function () {
            return Inertia::render('Dashboard',[
                'posts' => Post::all(),
                'page'=> 'dashboard',
            ]);
        })->name('pageFour');

        //Page five
        Route::get('/pageFive', function () {
            return Inertia::render('Dashboard',[
                'posts' => Post::all(),
                'page'=> 'dashboard',
            ]);
        })->name('pageFive');

        //Page six
        Route::get('/pageSix', function () {
            return Inertia::render('Dashboard',[
                'posts' => Post::all(),
                'page'=> 'dashboard',
            ]);
        })->name('pageSix');

        //Page seven
        Route::get('/pageSeven', function () {
            return Inertia::render('Dashboard',[
                'posts' => Post::all(),
                'page'=> 'dashboard',
            ]);
        })->name('pageSeven');

        // Route::get('/hospitalPatients', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'hospitalPatients'])->name('hospitalPatients');

        // Route::get('/searchHospitalAdministrators', [\App\Http\Controllers\SuperAdmin\TaskController::class, 'searchHospitalAdministrators'])->name('searchHospitalAdministrators');
    });

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        // //Page one
        // Route::get('/pageOne', function () {
        //     return Inertia::render('Dashboard',[
        //         'posts' => Post::all(),
        //         'page'=> 'dashboard',
        //     ]);
        // })->name('pageOne');

        // //Page two
        // Route::get('/pageTwo', function () {
        //     return Inertia::render('Dashboard',[
        //         'posts' => Post::all(),
        //         'page'=> 'dashboard',
        //     ]);
        // })->name('pageTwo');

        // //Page three
        // Route::get('/pageThree', function () {
        //     return Inertia::render('Dashboard',[
        //         'posts' => Post::all(),
        //         'page'=> 'dashboard',
        //     ]);
        // })->name('pageThree');

        // //Page four
        // Route::get('/pageFour', function () {
        //     return Inertia::render('Dashboard',[
        //         'posts' => Post::all(),
        //         'page'=> 'dashboard',
        //     ]);
        // })->name('pageFour');

        // //Page five
        // Route::get('/pageFive', function () {
        //     return Inertia::render('Dashboard',[
        //         'posts' => Post::all(),
        //         'page'=> 'dashboard',
        //     ]);
        // })->name('pageFive');

        // //Page six
        // Route::get('/pageSix', function () {
        //     return Inertia::render('Dashboard',[
        //         'posts' => Post::all(),
        //         'page'=> 'dashboard',
        //     ]);
        // })->name('pageSix');

        // //Page seven
        // Route::get('/pageSeven', function () {
        //     return Inertia::render('Dashboard',[
        //         'posts' => Post::all(),
        //         'page'=> 'dashboard',
        //     ]);
        // })->name('pageSeven');
    });

    // Route::group(['prefix' => 'tables', 'as' => 'tables.'], function () {
        // Route::get('/show', [\App\Http\Controllers\TableController::class, 'show'])->name('show');
        // Route::get('/management', [\App\Http\Controllers\Doctor\TaskController::class, 'index'])->name('management');

        // Route::get('/dashboard', [\App\Http\Controllers\Doctor\TaskController::class, 'index'])->name('dashboard');
        // Route::get('/management', [\App\Http\Controllers\Doctor\TaskController::class, 'index'])->name('management');
    });

    // Route::group(['prefix' => 'patient', 'middleware' => 'is_patient', 'as' => 'patient.'], function () {
    //     Route::get('/dashboard', [\App\Http\Controllers\Patient\DashboardController::class, 'index'])->name('dashboard');
    //     Route::get('/auth/google', [\App\Http\Controllers\Patient\GoogleController::class, 'redirectToGoogle'])->name('auth');
    //     Route::get('auth/google/callback', [\App\Http\Controllers\Patient\GoogleController::class, 'handleGoogleCallback']);
    // });

    // Route::get('/test', function () {
    //     return json_encode(\App\Models\User::latest()->get());
    // });
// });