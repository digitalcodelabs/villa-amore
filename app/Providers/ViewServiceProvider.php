<?php

namespace App\Providers;

use App\Models\FooterPage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share static pages (footer legal pages) with all views
        View::composer('*', function ($view) {
            $footerPages = FooterPage::published()
                ->ordered()
                ->get(['id', 'title', 'slug']);
            
            $view->with('footerPages', $footerPages);
        });
    }
}
