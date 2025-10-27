<section class="testimonials-section">
  <div class="testimonials-container">
    <h2 class="testimonials-title">{{ $module->title }}</h2>
    @if($module->subtitle)
      <p class="testimonials-subtitle">{{ $module->subtitle }}</p>
    @endif
    
    <div class="testimonials-slider">
      <div class="testimonials-track">
        @php
          $activeItems = $module->items->where('is_active', true)->values();
        @endphp
        @foreach($activeItems as $index => $item)
          <div class="testimonial-item {{ $index === 0 ? 'active' : '' }}">
            <div class="testimonial-content">
              <div class="quote-icon">"</div>
              <p class="testimonial-text">
                {{ $item->content }}
              </p>
              <div class="testimonial-author">
                <h4>{{ $item->author_name }}</h4>
                @if($item->author_location)
                  <p class="author-location">{{ $item->author_location }}</p>
                @endif
                <div class="testimonial-stars">
                  @for($i = 0; $i < $item->rating; $i++)
                    ★
                  @endfor
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <button class="testimonial-nav testimonial-prev" aria-label="Previous testimonial">‹</button>
      <button class="testimonial-nav testimonial-next" aria-label="Next testimonial">›</button>

      <div class="testimonial-indicators">
        @foreach($activeItems as $index => $item)
          <div class="testimonial-indicator {{ $index === 0 ? 'active' : '' }}" data-testimonial="{{ $index }}"></div>
        @endforeach
      </div>
    </div>
  </div>
</section>

