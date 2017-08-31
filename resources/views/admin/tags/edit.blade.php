@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Edit tag : <strong>{{ $tag->tag }}</strong>
		</div>
		<div class="panel-body">
			<form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Tag name:</label>
					<input type="text" name="tag" id="title" class="form-control" value="{{ $tag->tag }}">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update tag</button>
					</div>
				</div>
			</form>
		</div>
	</div>	

@stop