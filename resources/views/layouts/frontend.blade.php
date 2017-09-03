@include('includes.head')

<body class=" ">

<div class="content-wrapper">
    
    @include('includes.header')
	
	@yield('content')

<!-- Subscribe Form -->
@include('includes.subscribe_form')
<!-- End Subscribe Form -->
</div>

<!-- Footer -->
@include('includes.footer')
<!-- End Footer -->
@include('includes.svg')
<!-- Overlay Search -->
@include('includes.search')
<!-- End Overlay Search -->
<!-- JS Script -->
@include('includes.scripts')
<!-- ...end JS Script -->

</body>
</html>
