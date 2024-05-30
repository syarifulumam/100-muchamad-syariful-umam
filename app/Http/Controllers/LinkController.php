<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkStoreRequest;
use App\Http\Requests\LinkUpdateRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = Auth::user()->links;
        return view('link.index', compact('links'));
    }

    public function create(Request $request)
    {
        return view('link.create');
    }

    public function store(LinkStoreRequest $request)
    {
        Auth::user()->links()->create($request->validated());

        return redirect()->route('links.index');
    }

    public function show(Request $request, Link $link)
    {
        return view('link.show', compact('link'));
    }

    public function edit(Request $request, Link $link)
    {
        return view('link.edit', compact('link'));
    }

    public function update(LinkStoreRequest $request, Link $link)
    {
        $link->update($request->validated());

        $request->session()->flash('link.id', $link->id);

        return redirect()->route('links.index');
    }

    public function destroy(Request $request, Link $link)
    {
        $link->delete();

        return redirect()->route('links.index');
    }
}
