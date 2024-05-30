<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $data = Auth::user()->links()
                    ->withCount('visits')
                    ->with('latestVisit')
                    ->get();
        return view('dashboard', compact('data'));
    }
}
