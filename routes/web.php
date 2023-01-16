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

Route::middleware([
    'auth:sanctum',
    'verified',
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'DetermineUserRole'])->name('dashboard');

    Route::get('storagee/', function($fileName){
        return Storage::disk('public')->url('storage/systemFiles/images/1.jpg');
    });

    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE HEAD
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'head', 'middleware' => 'is_head', 'as' => 'head.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Head\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Head\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Head\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Head\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Head\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Head\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Head\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Head\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });

    });






/*
|--------------------------------------------------------------------------
| ROTES FOR TESTING DURING DEVELOPMENT
|--------------------------------------------------------------------------
*/


    Route::get('/trigger/{data}', function ($data) {
    echo "<p>You have sent $data</p>";
    event(new App\Events\NewPostPublished($data));
    });

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

    
    //Route for getting more posts on the scroll component
    Route::middleware(['auth:sanctum', 'verified'])->get('/posts', function () {
        return Response::json([
            'data' => Post::paginate(9)
        ], 201);
    })->name('posts');