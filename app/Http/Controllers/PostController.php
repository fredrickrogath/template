<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Inertia\Inertia;
// use Jenssegers\Agent\Agent;
// $agent = $this->createAgent($session);

class PostController extends Controller
{
    public function posts(){
        return Inertia::render('Profile/Show', [
            'sessions' => $this->sessions($request)->all(),
        ]);
    }
}
