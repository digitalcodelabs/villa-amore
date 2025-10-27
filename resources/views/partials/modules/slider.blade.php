<section class="hero-carousel">
  <div class="carousel-slides">
    @php
      $activeSlides = $module->slides->where('is_active', true)->values();
    @endphp
    @foreach($activeSlides as $index => $slide)
      <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}">
        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
        <div class="carousel-overlay"></div>
        <div class="carousel-content">
          <h1>{{ $slide->title }}</h1>
          @if($slide->subtitle)
            <p class="carousel-subtitle">{{ $slide->subtitle }}</p>
          @endif
          @if($slide->button_text && $slide->button_url)
            <a href="{{ $slide->button_url }}" class="book-now">{{ $slide->button_text }}</a>
          @elseif($slide->button_text)
            <button class="book-now">{{ $slide->button_text }}</button>
          @endif
        </div>
      </div>
    @endforeach
  </div>

  <button class="carousel-nav carousel-prev" aria-label="Previous slide">‹</button>
  <button class="carousel-nav carousel-next" aria-label="Next slide">›</button>

  <div class="carousel-indicators">
    @foreach($activeSlides as $index => $slide)
      <div class="indicator {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></div>
    @endforeach
  </div>

  <div class="scroll-down">SCROLL DOWN</div>
</section>

