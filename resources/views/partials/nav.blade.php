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
    <img src="{{ asset('uploads/images/menu-image.jpg')}}" alt="Navigation background" class="nav-background">
    <div class="nav-content">
      <div class="nav-grid">
        @foreach($navPages ?? [] as $page)
          <a href="{{ route('page.show', $page->slug) }}" class="nav-link">{{ $page->title }}</a>
        @endforeach
      </div>
    </div>
  </nav>