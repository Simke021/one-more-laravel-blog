@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Edit post; <strong>{{ $post->title }}</strong>
		</div>
		<div class="panel-body">
			<form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Title:</label>
					<input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
				</div>
				<div class="form-group">
					<label for="featured">Featured image:</label>
					<input type="file" name="featured" id="featured" class="form-control">
				</div>
				<div class="form-group">
					<label for="category">Select a Category:</label>
					<select name="category_id" id="category" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="content">Content:</label>
					<textarea name="content" id="content" class="form-control" cols="5" rows="5">{{ $post->content }}</textarea>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update post</button>
					</div>
				</div>
			</form>
		</div>
	</div>	

@stop