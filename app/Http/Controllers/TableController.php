<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Inertia\Inertia;

class TableController extends Controller
{
    public function show(){
        dd('Stepaho Satara');
        return Inertia::render('Dashboard',[
            'posts' => Post::all(),
        ]);
    }
}
