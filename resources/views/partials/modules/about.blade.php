<section class="about-section">
  <div class="">
    <div class="about-content">
      <h2>{{ $module->title }}</h2>
      <div class="about-text">
        {!! $module->content !!}
      </div>
      @if($module->button_text && $module->button_url)
        <a href="{{ $module->button_url }}" class="learn-more-btn">{{ $module->button_text }}</a>
      @elseif($module->button_text)
        <button class="learn-more-btn">{{ $module->button_text }}</button>
      @endif
    </div>
  </div>
</section>

