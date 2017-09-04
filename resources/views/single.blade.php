@extends('layouts.frontend')

    @section('content')
    <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">{{ $post->title }}</h1>
            </div>
        </div>

        <div class="container">
            <div class="row medium-padding120">
                <main class="main">
                    <div class="col-lg-10 col-lg-offset-1">
                        <article class="hentry post post-standard-details">

                            <div class="post-thumb">
                                <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                            </div>

                            <div class="post__content">
                                <div class="post-additional-info">
                                    <div class="post__author author vcard">
                                        Posted by: 
                                        <div class="post__author-name fn">
                                            <a href="#" class="post__author-link">{{ $post->user->name }}</a>
                                        </div>
                                    </div>
                                    <span class="post__date">
                                        <i class="seoicon-clock"></i>
                                        <time class="published" datetime="2016-03-20 12:00:00">
                                            {{ $post->created_at->toFormattedDateString()}}
                                        </time>
                                    </span>
                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="{{ route('category.single', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
                                    </span>
                                </div>
                                <div class="post__content-info">
                                {!! $post->content !!}
                                    <div class="widget w-tags">
                                        <div class="tags-wrap">
                                        @foreach($post->tags as $tag)
                                            <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                        @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="socials">Share:
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-facebook"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-twitter"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-linkedin"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-google-plus"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-pinterest"></i>
                                </a>
                            </div>

                        </article>

                        <div class="blog-details-author">

                            <div class="blog-details-author-thumb">
                                <img src="{{ asset($post->user->profile->avatar )}}" alt="Author-{{ $post->user->name }}" title="{{ $post->user->name }}">
                            </div>

                            <div class="blog-details-author-content">
                                <div class="author-info">
                                    <h5 class="author-name">{{ $post->user->name }}</h5>
                                </div>
                                <p class="text">{{ $post->user->profile->about }}</p>
                                <div class="socials">
                                    <a href="{{ $post->user->profile->facebook }}" class="social__item" target="_blank">
                                        <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                                    </a>

                                    <a href="{{ $post->user->profile->twitter }}" class="social__item" target="_blank">
                                        <img src="{{ asset('app/svg/twitter.svg') }}" alt="twitter">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="pagination-arrow">
                        @include('includes.pagination')
                        </div>
                        <div class="comments">
                            <div class="heading text-center">
                                <h4 class="h1 heading-title">Comments</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>                            
                            @include('includes.disqus')
                        </div>
                    </div>
                    <!-- End Post Details -->
                    <!-- Sidebar-->
                    @include('includes.tags')
                    <!-- End Sidebar-->
                </main>
            </div>
        </div>

    <!-- End Stunning Header -->
    @endsection