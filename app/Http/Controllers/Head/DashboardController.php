<?php

namespace App\Http\Controllers\Head;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\HeadService;

class DashboardController extends Controller
{
    
    public function dashboard(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }
}
