@extends('layouts.app')
@section('content')
    
	<div class="col-lg-3">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h5 class="text-center">POSTED</h5>
			</div>
			<div class="panel-body text-center">
				<h2>{{ $post_count }}</h2>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h5 class="text-center">TRASHED POSTS</h5>
			</div>
			<div class="panel-body text-center">
				<h2>{{ $trashed_count }}</h2>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h5 class="text-center">Users</h5>
			</div>
			<div class="panel-body text-center">
				<h2>{{ $users_count }}</h2>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h5 class="text-center">CATEGORIES</h5>
			</div>
			<div class="panel-body text-center">
				<h2>{{ $categories_count }}</h2>
			</div>
		</div>
	</div>
    
@endsection
