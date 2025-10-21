@extends('app')

@section('content')
{{-- Hero Slider --}}
@include('partials.slider')

{{-- Experience Boxes --}}
@include('partials.boxes')

{{-- About Section --}}
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

{{-- Gallery Section --}}
@include('partials.gallery')

{{-- Testimonials Section --}}
@include('partials.testimonials')

{{-- Location Section --}}
@include('partials.location')

{{-- Contact/Booking Form Section --}}
@include('partials.contact')

@endsection