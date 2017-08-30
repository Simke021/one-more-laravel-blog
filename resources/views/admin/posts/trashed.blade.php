@extends('layouts.app')
@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Title</th>
					<th>Editing</th>
					<th>Restore</th>
					<th>Destroy</th>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90" height="50"></td>
						<th>{{ $post->title }}</th>
						<td>Edit</a></td>
						<td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-success btn-xs">Restore</a></td>
						<td><a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop