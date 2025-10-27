<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'home')
            ->published()
            ->first();

        if (!$page) {
            // Fallback to static homepage if no CMS page exists
            return view('index');
        }

        $modules = $page->getModulesWithData();

        return view('pages.dynamic', compact('page', 'modules'));
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->published()
            ->firstOrFail();

        $modules = $page->getModulesWithData();

        return view('pages.dynamic', compact('page', 'modules'));
    }
}
