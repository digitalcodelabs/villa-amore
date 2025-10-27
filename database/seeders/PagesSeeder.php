<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'content' => 'Welcome to Villa Amore - Your Luxury Tuscan Retreat',
                'meta_title' => 'Villa Amore - Luxury Tuscan Retreat',
                'meta_description' => 'Experience the ultimate luxury retreat in the heart of Tuscany at Villa Amore. Book your unforgettable stay today.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Book Your Stay',
                'slug' => 'book',
                'content' => 'Book your stay at Villa Amore and experience luxury in the heart of Tuscany.',
                'meta_title' => 'Book Your Stay - Villa Amore',
                'meta_description' => 'Reserve your luxury accommodation at Villa Amore. Check availability and book your perfect Tuscan getaway.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Retreats',
                'slug' => 'retreats',
                'content' => 'Discover our exclusive retreats designed for wellness, creativity, and connection.',
                'meta_title' => 'Retreats - Villa Amore',
                'meta_description' => 'Join our transformative retreats at Villa Amore focusing on wellness, yoga, creativity, and personal growth.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Cooking Experiences',
                'slug' => 'cooking',
                'content' => 'Immerse yourself in authentic Tuscan cooking experiences with our expert chefs.',
                'meta_title' => 'Tuscan Cooking Experiences - Villa Amore',
                'meta_description' => 'Learn to cook authentic Italian cuisine in our hands-on cooking classes featuring traditional Tuscan recipes.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Prosecco & Paint',
                'slug' => 'prosecco',
                'content' => 'Unleash your creativity with our Prosecco & Paint sessions in the beautiful Tuscan gardens.',
                'meta_title' => 'Prosecco & Paint - Villa Amore',
                'meta_description' => 'Enjoy a relaxing painting session with prosecco in our stunning gardens. Perfect for groups and special occasions.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Weddings & Events',
                'slug' => 'weddings',
                'content' => 'Celebrate your special moments in the magical setting of Villa Amore.',
                'meta_title' => 'Weddings & Events - Villa Amore',
                'meta_description' => 'Host your dream wedding or special event at Villa Amore. Stunning venues, exceptional service, unforgettable memories.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'For Retreat Organizers',
                'slug' => 'organizers',
                'content' => 'Host your retreat at Villa Amore and provide your guests with an unforgettable experience.',
                'meta_title' => 'For Retreat Organizers - Villa Amore',
                'meta_description' => 'Partner with Villa Amore to host your wellness or yoga retreat in our beautiful Tuscan villa.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => 'Learn about our story and passion for hospitality at Villa Amore.',
                'meta_title' => 'About Us - Villa Amore',
                'meta_description' => 'Discover the story behind Villa Amore, a lovingly restored 400-year-old Tuscan villa dedicated to exceptional hospitality.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'content' => 'Get in touch with us to plan your perfect Tuscan experience.',
                'meta_title' => 'Contact Us - Villa Amore',
                'meta_description' => 'Contact Villa Amore for inquiries, bookings, or any questions about your stay in Tuscany.',
                'is_published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }

        $this->command->info('Pages seeded successfully!');
    }
}
