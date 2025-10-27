@extends('app')

@section('title', 'Gallery - Villa Amore')
@section('meta_description', 'Browse our collection of beautiful images from Villa Amore in Tuscany')

@section('content')
<section class="gallery-page">
  <div class="gallery-page-header">
    <div class="gallery-page-header-content">
      <h1 class="gallery-page-title">Our Galleries</h1>
      <p class="gallery-page-subtitle">Discover the beauty of Villa Amore through our collection</p>
    </div>
  </div>

  <div class="gallery-page-container">
    @if($galleries->count() > 0)
      @foreach($galleries as $gallery)
        <div class="gallery-section-wrapper">
          <div class="gallery-section-header">
            <h2 class="gallery-section-title">{{ $gallery->title }}</h2>
            @if($gallery->subtitle)
              <p class="gallery-section-subtitle">{{ $gallery->subtitle }}</p>
            @endif
          </div>

          <div class="gallery-grid">
            @foreach($gallery->images as $image)
              <div class="gallery-item" data-gallery="{{ $gallery->id }}" data-image-url="{{ asset('storage/' . $image->image) }}" data-alt="{{ $image->alt_text ?? $gallery->title }}">
                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt_text ?? $gallery->title }}" loading="lazy">
                <div class="gallery-overlay">
                  <span class="gallery-icon">+</span>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    @else
      <div class="no-galleries">
        <p>No galleries available at the moment.</p>
      </div>
    @endif
  </div>

  <!-- Lightbox Modal -->
  <div class="gallery-lightbox" id="galleryLightbox">
    <button class="lightbox-close" aria-label="Close lightbox">&times;</button>
    <button class="lightbox-prev" aria-label="Previous image">‹</button>
    <button class="lightbox-next" aria-label="Next image">›</button>
    <img src="" alt="" class="lightbox-image">
    <div class="lightbox-counter">
      <span class="current-image">1</span> / <span class="total-images">{{ $allImages->count() }}</span>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const galleryItems = document.querySelectorAll('.gallery-item');
  const lightbox = document.getElementById('galleryLightbox');
  const lightboxImage = lightbox.querySelector('.lightbox-image');
  const closeBtn = lightbox.querySelector('.lightbox-close');
  const prevBtn = lightbox.querySelector('.lightbox-prev');
  const nextBtn = lightbox.querySelector('.lightbox-next');
  const currentImageSpan = lightbox.querySelector('.current-image');
  
  let currentIndex = 0;
  let allImages = [];

  // Collect all images
  galleryItems.forEach((item, index) => {
    allImages.push({
      url: item.dataset.imageUrl,
      alt: item.dataset.alt
    });

    item.addEventListener('click', function() {
      currentIndex = index;
      openLightbox();
    });
  });

  function openLightbox() {
    lightbox.classList.add('active');
    updateLightboxImage();
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
  }

  function updateLightboxImage() {
    if (allImages.length > 0) {
      lightboxImage.src = allImages[currentIndex].url;
      lightboxImage.alt = allImages[currentIndex].alt;
      currentImageSpan.textContent = currentIndex + 1;
    }
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % allImages.length;
    updateLightboxImage();
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + allImages.length) % allImages.length;
    updateLightboxImage();
  }

  // Event listeners
  closeBtn.addEventListener('click', closeLightbox);
  nextBtn.addEventListener('click', showNext);
  prevBtn.addEventListener('click', showPrev);

  // Close on background click
  lightbox.addEventListener('click', function(e) {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (!lightbox.classList.contains('active')) return;
    
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') showNext();
    if (e.key === 'ArrowLeft') showPrev();
  });
});
</script>
@endsection

