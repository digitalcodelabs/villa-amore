<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        // Get all active galleries with their images
        $galleries = Gallery::where('is_active', true)
            ->with(['images' => function ($query) {
                $query->orderBy('order');
            }])
            ->get();

        // Get all gallery images across all galleries for a unified view
        $allImages = GalleryImage::whereHas('gallery', function ($query) {
                $query->where('is_active', true);
            })
            ->orderBy('gallery_id')
            ->orderBy('order')
            ->get();

        return view('pages.gallery', compact('galleries', 'allImages'));
    }
}

