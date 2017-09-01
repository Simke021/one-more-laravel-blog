@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Create a new post
		</div>
		<div class="panel-body">
			<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Title:</label>
					<input type="text" name="title" id="title" class="form-control">
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
					<label for="tags">Select a Tags:</label>
					@foreach($tags as $tag)
						<div class="checkbox">
						<label><input type="checkbox" name="tags[]" id="tags" value="{{ $tag->id }}">{{ $tag->tag }}</label>
					</div>
					@endforeach
				</div>
				<div class="form-group">
					<label for="content">Content:</label>
					<textarea name="content" id="content" class="form-control" cols="5" rows="5"></textarea>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Create post</button>
					</div>
				</div>
			</form>
		</div>
	</div>	

@stop