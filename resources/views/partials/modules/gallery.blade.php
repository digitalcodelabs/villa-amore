<section class="gallery-section">
  <div class="gallery-container">
    <h2 class="gallery-title">{{ $module->title }}</h2>
    @if($module->subtitle)
      <p class="gallery-subtitle">{{ $module->subtitle }}</p>
    @endif
    
    <div class="gallery-grid">
      @foreach($module->images as $image)
        <div class="gallery-item">
          <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt_text ?? $module->title }}">
          <div class="gallery-overlay">
            <span class="gallery-icon">+</span>
          </div>
        </div>
      @endforeach
    </div>
    
    <div class="gallery-cta">
      <a href="{{ route('gallery') }}" class="gallery-btn">View Full Gallery</a>
    </div>
  </div>

  <!-- Lightbox Modal -->
  <div class="gallery-lightbox" id="galleryLightbox">
    <button class="lightbox-close" aria-label="Close lightbox">&times;</button>
    <button class="lightbox-prev" aria-label="Previous image">‹</button>
    <button class="lightbox-next" aria-label="Next image">›</button>
    <img src="" alt="" class="lightbox-image">
    <div class="lightbox-counter"><span class="current-image">1</span> / <span class="total-images">{{ $module->images->count() }}</span></div>
  </div>
</section>

