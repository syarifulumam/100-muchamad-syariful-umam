<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;

class VisitController extends Controller
{
    public function store(Link $link,Request $request)
    {
        return $link->visits()
            ->create([
                'link_id' => $link->id,
                'user_agent' => Agent::platform()
            ]);
    }
}
