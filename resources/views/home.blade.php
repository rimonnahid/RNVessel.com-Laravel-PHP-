@extends('layouts.app')
@if($setting)
@section('title','Home | '. $setting->website_title )
@else

@section('title','Home')
@endif
@section('content')
    <main class="blog-grid-page">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">@lang('home.newpost')</h1>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="blog-post-card wow fadeInUp">
                                <a href="{{ route('post.single',$post->slug) }}" style="text-decoration: none;"><div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('storage/app/public/'.$post->image) }}" alt="blog">
                                </div>
                                <p class="blog-post-date text-dark">{{ $post->created_at->diffForHumans() }}</p>
                                <h5 class="blog-post-title">{{ Str::words($post->title ,'8' ,'...') }}</h5></a>
                            </div>
                        </div>
                    @endforeach                    
                    </div>
                </div>
                <div class="col-md-3">
                    @include('layouts.sidebar')
                </div>
            </div>
            <div class="row">
                <div class="col-12 pb-5 mb-5">
                    <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp">
                        {{ $posts->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </main>
@endsection
