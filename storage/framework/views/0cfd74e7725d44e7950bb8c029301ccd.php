  <header>
    <a href="/" class="logo">
      <div class="logo-shield"></div>
      <div class="logo-text-container">
        <div class="logo-text">Villa Amore</div>
        <div class="logo-subtitle">Tuscan Retreat</div>
      </div>
    </a>

    <div class="header-right">
      <div class="language">EN ▼</div>
      <button class="hamburger" id="hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </header>

  <nav class="full-page-nav" id="fullPageNav">
    <img src="<?php echo e(asset('uploads/images/menu-image.jpg')); ?>" alt="Navigation background" class="nav-background">
    <div class="nav-content">
      <div class="nav-grid">
        <?php $__currentLoopData = $navPages ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('page.show', $page->slug)); ?>" class="nav-link"><?php echo e($page->title); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </nav><?php /**PATH /var/www/villa-amore/resources/views/partials/nav.blade.php ENDPATH**/ ?>