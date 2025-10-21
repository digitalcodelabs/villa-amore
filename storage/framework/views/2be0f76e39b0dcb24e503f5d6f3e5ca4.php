<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.slider', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<?php echo $__env->make('partials.boxes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<section class="about-section">
  <div class="">
    <div class="about-content">
      <h2>Welcome to Villa Amore</h2>
      <p class="about-text">
        At Villa Amore, hospitality is more than a service – it's our way of life. Set within a lovingly restored 400-year-old Tuscan villa, we, your hosts, welcome you as friends rather than guests. Our passion is sharing the simple joys of Tuscany – from the scent of rosemary and jasmine in the gardens to the golden sunsets over the hills – while ensuring your stay is as comfortable as it is unforgettable. Every experience is curated with warmth, attention to detail, and a genuine love for creating memories.
      </p>
      <button class="learn-more-btn">Learn More</button>
    </div>
  </div>
</section>


<?php echo $__env->make('partials.gallery', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<?php echo $__env->make('partials.testimonials', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<?php echo $__env->make('partials.location', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<?php echo $__env->make('partials.contact', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/villa-amore/resources/views/index.blade.php ENDPATH**/ ?>