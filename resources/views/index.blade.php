@include('includes.head')
<body class=" ">

<div class="content-wrapper">
    
    @include('includes.header')

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @include('includes.first_post')
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                @include('includes.second_post')
            </div>
            <div class="col-lg-6">
                @include('includes.third_post')
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $wordpress->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                        @foreach($wordpress->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                                    </div>
                                    <h6 class="case-item__title text-center"><a href="{{ route('post.single', ['id' => $post->slug]) }}">{{ $post->title }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $php->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                        @foreach($php->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                                    </div>
                                    <h6 class="case-item__title text-center"><a href="{{ route('post.single', ['id' => $post->slug]) }}">{{ $post->title }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $mysql->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                        @foreach($mysql->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                                    </div>
                                    <h6 class="case-item__title text-center"><a href="{{ route('post.single', ['id' => $post->slug]) }}">{{ $post->title }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>

<!-- Subscribe Form -->
@include('includes.subscribe_form')
<!-- End Subscribe Form -->
</div>
<!-- Footer -->
@include('includes.footer')
<!-- End Footer -->
@include('includes.search')
<!-- Overlay Search -->
@include('includes.search')
<!-- End Overlay Search -->
<!-- JS Script -->
@include('includes.scripts')
<!-- ...end JS Script -->
</body>
</html>
