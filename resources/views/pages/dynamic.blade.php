@extends('app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description ?? '')

@section('content')
@if($modules->count() > 0)
  {{-- Render dynamic modules --}}
  @foreach($modules as $pageModule)
    @php
      $module = $pageModule->moduleable;
      $moduleType = class_basename($pageModule->module_type);
    @endphp
    
    {{-- Only render if module exists and is active --}}
    @if($module && $module->is_active)
      @if($moduleType === 'Slider')
        @include('partials.modules.slider', ['module' => $module])
      @elseif($moduleType === 'AboutSection')
        @include('partials.modules.about', ['module' => $module])
      @elseif($moduleType === 'Gallery')
        @include('partials.modules.gallery', ['module' => $module])
      @elseif($moduleType === 'Testimonial')
        @include('partials.modules.testimonials', ['module' => $module])
      @endif
    @endif
  @endforeach
@else
  {{-- Fallback content if no modules --}}
  @if($page->content)
    <section class="page-content">
      <div class="container">
        <h1>{{ $page->title }}</h1>
        <div class="content">
          {!! $page->content !!}
        </div>
      </div>
    </section>
  @endif
@endif

{{-- Always include these sections for now (can be made modular later) --}}
@if($page->slug === 'home')
  {{-- Experience Boxes --}}
  @include('partials.boxes')

  {{-- Testimonials Section --}}
  {{-- @include('partials.testimonials') --}}

  {{-- Location Section --}}
  @include('partials.location')

  {{-- Contact/Booking Form Section --}}
  @include('partials.contact')
@endif
@endsection

