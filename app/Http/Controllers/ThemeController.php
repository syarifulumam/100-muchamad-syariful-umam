<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemeUpdateRequest;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ThemeController extends Controller
{
    public function index(Request $request): Response
    {
        $themes = Theme::all();

        return view('theme.index', compact('themes'));
    }

    public function edit(Request $request, Theme $theme): Response
    {
        return view('theme.edit', compact('theme'));
    }

    public function update(ThemeUpdateRequest $request, Theme $theme): Response
    {
        $theme->update($request->validated());

        $request->session()->flash('theme.id', $theme->id);

        return redirect()->route('themes.index');
    }
}
