@extends('layouts.app')
@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Title</th>
					<th>Editing</th>
					<th>Deleting</th>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>Image</td>
						<th>{{ $post->title }}</th>
						<td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-xs">Edit</a></td>
						<td><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop