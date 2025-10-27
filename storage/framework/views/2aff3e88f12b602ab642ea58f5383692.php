<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Villa Amore - Your Dream Destination'); ?></title>
  <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Villa Amore is a luxury villa in Tuscany, Italy. It is a perfect destination for a romantic getaway, a family vacation, or a business trip.'); ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>

<?php echo $__env->make('partials.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<!-- Footer Section -->
<footer class="footer">
  <div class="footer-content">
    <div class="footer-section">
      <div class="footer-logo">
        <div class="logo-shield"></div>
        <div class="logo-text-container">
          <div class="logo-text">Villa Amore</div>
          <div class="logo-subtitle">Tuscan Retreat</div>
        </div>
      </div>
      <p class="footer-description">
        Experience the magic of Tuscany in our luxury villa. 
        Your perfect escape awaits in the heart of Italy's most beautiful region.
      </p>
    </div>

    <div class="footer-section">
      <h4>Quick Links</h4>
      <ul class="footer-links">
        <li><a href="#book">Book your stay</a></li>
        <li><a href="#retreats">Retreats</a></li>
        <li><a href="#cooking">Cooking Experiences</a></li>
        <li><a href="#prosecco">Prosecco & Paint</a></li>
        <li><a href="#weddings">Weddings & Events</a></li>
        <li><a href="#about">About Us</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4>Contact Info</h4>
      <div class="contact-info">
        <div class="contact-item">
          <span class="contact-icon">📍</span>
          <span>Tuscany, Italy</span>
        </div>
        <div class="contact-item">
          <span class="contact-icon">📞</span>
          <span>+39 123 456 7890</span>
        </div>
        <div class="contact-item">
          <span class="contact-icon">✉️</span>
          <span>info@example.com</span>
        </div>
      </div>
    </div>

    <div class="footer-section">
      <h4>Follow Us</h4>
      <div class="social-links">
        <a href="#" class="social-link">Instagram</a>
        <a href="#" class="social-link">Facebook</a>
      </div>
      <div class="newsletter">
        <h5>Stay Updated</h5>
        <form class="newsletter-form">
          <input type="email" placeholder="Your email address" required>
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="footer-bottom-content">
      <p>&copy; 2024 Villa Amore. All rights reserved.</p>
      <div class="footer-bottom-links">
        <a href="#privacy">Privacy Policy</a>
        <a href="#terms">Terms of Service</a>
        <a href="#cookies">Cookie Policy</a>
      </div>
    </div>
  </div>
</footer>

</body>
</html><?php /**PATH /var/www/villa-amore/resources/views/app.blade.php ENDPATH**/ ?>