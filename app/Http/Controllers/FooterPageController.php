<?php

namespace App\Http\Controllers;

use App\Models\FooterPage;
use Illuminate\Http\Request;

class FooterPageController extends Controller
{
    /**
     * Display the specified static page.
     */
    public function show($slug)
    {
        $page = FooterPage::where('slug', $slug)
            ->published()
            ->firstOrFail();

        return view('static-pages.show', compact('page'));
    }
}
