<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class NavigationComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $navPages = Page::where('is_published', true)
            ->where('show_in_navigation', true)
            ->orderBy('navigation_order')
            ->orderBy('title')
            ->get();

        $view->with('navPages', $navPages);
    }
}

