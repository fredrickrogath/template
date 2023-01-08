<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\Post;

use Inertia\Inertia;

class TableController extends Controller
{
    public function show(){
        return Inertia::render('Dashboard',[
            'page'=> 'tables',
            'posts' => \App\Models\Post::all(),
        ]);
    }
}
