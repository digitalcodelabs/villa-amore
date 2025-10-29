<?php

namespace Database\Seeders;

use App\Models\FooterPage;
use Illuminate\Database\Seeder;

class FooterPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footerPages = [
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy',
                'content' => '<h2>Privacy Policy</h2>
<p>Last updated: ' . now()->format('F j, Y') . '</p>

<h3>1. Information We Collect</h3>
<p>We collect information that you provide directly to us when you make a reservation, sign up for our newsletter, or contact us through our website.</p>

<h3>2. How We Use Your Information</h3>
<p>We use the information we collect to:</p>
<ul>
    <li>Process your bookings and reservations</li>
    <li>Send you confirmation emails and important updates</li>
    <li>Respond to your inquiries and provide customer support</li>
    <li>Send you marketing communications (with your consent)</li>
</ul>

<h3>3. Data Security</h3>
<p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

<h3>4. Your Rights</h3>
<p>You have the right to access, correct, or delete your personal information. To exercise these rights, please contact us at info@example.com.</p>

<h3>5. Contact Us</h3>
<p>If you have any questions about this Privacy Policy, please contact us at info@example.com.</p>',
                'is_published' => true,
                'published_at' => now(),
                'footer_order' => 1,
            ],
            [
                'title' => 'Terms of Service',
                'slug' => 'terms',
                'content' => '<h2>Terms of Service</h2>
<p>Last updated: ' . now()->format('F j, Y') . '</p>

<h3>1. Acceptance of Terms</h3>
<p>By accessing and using Villa Amore\'s services, you accept and agree to be bound by these Terms of Service.</p>

<h3>2. Booking and Reservations</h3>
<p>All bookings are subject to availability. A deposit may be required to confirm your reservation. Full payment is typically due 30 days before your arrival date.</p>

<h3>3. Cancellation Policy</h3>
<p>Cancellations made more than 60 days before arrival will receive a full refund minus a processing fee. Cancellations made 30-60 days before arrival will receive a 50% refund. Cancellations made less than 30 days before arrival are non-refundable.</p>

<h3>4. Guest Responsibilities</h3>
<p>Guests are expected to treat the property with respect and care. Any damage to the property will be charged to the guest\'s account.</p>

<h3>5. Liability</h3>
<p>Villa Amore is not responsible for any loss, damage, or injury sustained during your stay, except where required by law.</p>

<h3>6. Contact</h3>
<p>For questions about these terms, please contact us at info@example.com.</p>',
                'is_published' => true,
                'published_at' => now(),
                'footer_order' => 2,
            ],
            [
                'title' => 'Cookie Policy',
                'slug' => 'cookies',
                'content' => '<h2>Cookie Policy</h2>
<p>Last updated: ' . now()->format('F j, Y') . '</p>

<h3>What Are Cookies</h3>
<p>Cookies are small text files that are stored on your device when you visit our website. They help us provide you with a better experience by remembering your preferences.</p>

<h3>How We Use Cookies</h3>
<p>We use cookies to:</p>
<ul>
    <li>Remember your preferences and settings</li>
    <li>Understand how you use our website</li>
    <li>Improve our website performance</li>
    <li>Show you relevant content and advertisements</li>
</ul>

<h3>Types of Cookies We Use</h3>
<p><strong>Essential Cookies:</strong> These cookies are necessary for the website to function properly.</p>
<p><strong>Analytics Cookies:</strong> These help us understand how visitors interact with our website.</p>
<p><strong>Marketing Cookies:</strong> These track your online activity to help us deliver more relevant advertising.</p>

<h3>Managing Cookies</h3>
<p>You can control and/or delete cookies through your browser settings. However, disabling cookies may affect your ability to use certain features of our website.</p>

<h3>Contact Us</h3>
<p>If you have questions about our use of cookies, please contact us at info@example.com.</p>',
                'is_published' => true,
                'published_at' => now(),
                'footer_order' => 3,
            ],
        ];

        foreach ($footerPages as $page) {
            FooterPage::create($page);
        }
    }
}
