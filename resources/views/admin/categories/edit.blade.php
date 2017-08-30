@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Update category: <strong>{{ $category->name }}</strong>
		</div>
		<div class="panel-body">
			<form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Category Name:</label>
					<input type="text" name="name" id="title" class="form-control" value="{{ $category->name }}">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update category</button>
					</div>
				</div>
			</form>
		</div>
	</div>	

@stop