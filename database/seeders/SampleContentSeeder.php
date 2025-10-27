<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Page;
use App\Models\PageModule;
use App\Models\Slider;
use App\Models\SliderSlide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating sample slider...');
        
        // Create a sample slider
        $slider = Slider::create([
            'title' => 'Homepage Hero Slider',
            'is_active' => true,
        ]);

        // Add slides to the slider (using existing images)
        SliderSlide::create([
            'slider_id' => $slider->id,
            'title' => 'Villa Amore',
            'subtitle' => 'Your Luxury Escape',
            'image' => 'uploads/images/whatsapp-amore.jpg', // Using existing image path
            'button_text' => 'BOOK NOW',
            'button_url' => '/book',
            'order' => 0,
            'is_active' => true,
        ]);

        SliderSlide::create([
            'slider_id' => $slider->id,
            'title' => 'Luxury Rooms',
            'subtitle' => 'Experience Ultimate Comfort',
            'image' => 'uploads/images/rooms.jpg',
            'button_text' => 'VIEW ROOMS',
            'button_url' => '/book',
            'order' => 1,
            'is_active' => true,
        ]);

        SliderSlide::create([
            'slider_id' => $slider->id,
            'title' => 'Dining Experience',
            'subtitle' => 'Savor Exquisite Cuisine',
            'image' => 'uploads/images/dining.jpg',
            'button_text' => 'EXPLORE MENU',
            'button_url' => '/cooking',
            'order' => 2,
            'is_active' => true,
        ]);

        SliderSlide::create([
            'slider_id' => $slider->id,
            'title' => 'Spa & Wellness',
            'subtitle' => 'Rejuvenate Your Senses',
            'image' => 'uploads/images/spa.jpg',
            'button_text' => 'LEARN MORE',
            'button_url' => '/retreats',
            'order' => 3,
            'is_active' => true,
        ]);

        $this->command->info('Creating sample about section...');
        
        // Create about section
        $about = AboutSection::create([
            'title' => 'Welcome to Villa Amore',
            'content' => '<p>At Villa Amore, hospitality is more than a service – it\'s our way of life. Set within a lovingly restored 400-year-old Tuscan villa, we, your hosts, welcome you as friends rather than guests. Our passion is sharing the simple joys of Tuscany – from the scent of rosemary and jasmine in the gardens to the golden sunsets over the hills – while ensuring your stay is as comfortable as it is unforgettable. Every experience is curated with warmth, attention to detail, and a genuine love for creating memories.</p>',
            'button_text' => 'Learn More',
            'button_url' => '/about',
            'is_active' => true,
        ]);

        $this->command->info('Creating sample gallery...');
        
        // Create gallery
        $gallery = Gallery::create([
            'title' => 'Gallery',
            'subtitle' => 'Discover the Beauty of Villa Amore',
            'is_active' => true,
        ]);

        // Add images to gallery (using placeholder images)
        $galleryImages = [
            ['url' => 'https://images.pexels.com/photos/1732414/pexels-photo-1732414.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Villa Exterior View'],
            ['url' => 'https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Luxury Bedroom'],
            ['url' => 'https://images.pexels.com/photos/261102/pexels-photo-261102.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Swimming Pool'],
            ['url' => 'https://images.pexels.com/photos/262047/pexels-photo-262047.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Elegant Dining Area'],
            ['url' => 'https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Garden & Terrace'],
            ['url' => 'https://images.pexels.com/photos/3757055/pexels-photo-3757055.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Spa & Wellness'],
            ['url' => 'https://images.pexels.com/photos/1438832/pexels-photo-1438832.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Tuscan Sunset View'],
            ['url' => 'https://images.pexels.com/photos/1918291/pexels-photo-1918291.jpeg?auto=compress&cs=tinysrgb&w=1200', 'alt' => 'Luxury Interior'],
        ];

        foreach ($galleryImages as $index => $imageData) {
            GalleryImage::create([
                'gallery_id' => $gallery->id,
                'image' => $imageData['url'],
                'alt_text' => $imageData['alt'],
                'order' => $index,
            ]);
        }

        $this->command->info('Attaching modules to homepage...');
        
        // Attach modules to homepage
        $homepage = Page::where('slug', 'home')->first();
        
        if ($homepage) {
            PageModule::create([
                'page_id' => $homepage->id,
                'module_type' => Slider::class,
                'module_id' => $slider->id,
                'order' => 0,
                'is_active' => true,
            ]);

            PageModule::create([
                'page_id' => $homepage->id,
                'module_type' => AboutSection::class,
                'module_id' => $about->id,
                'order' => 1,
                'is_active' => true,
            ]);

            PageModule::create([
                'page_id' => $homepage->id,
                'module_type' => Gallery::class,
                'module_id' => $gallery->id,
                'order' => 2,
                'is_active' => true,
            ]);

            $this->command->info('Sample content created and attached to homepage successfully!');
        } else {
            $this->command->warn('Homepage not found. Please run PagesSeeder first.');
        }
    }
}
