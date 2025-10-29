@extends('app')

@section('title', $page->meta_title ?? $page->title)

@section('meta_description', $page->meta_description ?? '')

@section('styles')
<style>
    .static-page-container {
        min-height: 60vh;
        padding: 160px 20px;
        background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
    }

    .static-page-content {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        padding: 60px;
        border-radius: 10px;
    }

    .static-page-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 3rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 30px;
        text-align: center;
        line-height: 1.2;
    }

    .static-page-body {
        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;
        line-height: 1.8;
        color: #555;
    }

    .static-page-body h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-top: 40px;
        margin-bottom: 20px;
    }

    .static-page-body h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: #34495e;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .static-page-body p {
        margin-bottom: 20px;
    }

    .static-page-body ul, 
    .static-page-body ol {
        margin: 20px 0;
        padding-left: 30px;
    }

    .static-page-body li {
        margin-bottom: 10px;
    }

    .static-page-body a {
        color: #d4af37;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .static-page-body a:hover {
        color: #b8941f;
        text-decoration: underline;
    }

    .static-page-body strong {
        font-weight: 600;
        color: #2c3e50;
    }

    @media (max-width: 768px) {
        .static-page-content {
            padding: 40px 30px;
        }

        .static-page-title {
            font-size: 2.2rem;
        }

        .static-page-body {
            font-size: 0.95rem;
        }
    }

    @media (max-width: 480px) {
        .static-page-container {
            padding: 40px 15px;
        }

        .static-page-content {
            padding: 30px 20px;
        }

        .static-page-title {
            font-size: 1.8rem;
        }
    }
</style>

@endsection

@section('content')
<div class="static-page-container">
    <div class="static-page-content">
        <h1 class="static-page-title">{{ $page->title }}</h1>
        <div class="static-page-body">
            {!! $page->content !!}
        </div>
    </div>
</div>


@endsection

