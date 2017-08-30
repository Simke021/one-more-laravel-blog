@extends('layouts.app')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Published posts
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Title</th>
					<th>Editing</th>
					<th>Trash</th>
				</thead>
				<tbody>
				@if(count($posts) > 0)
					@foreach($posts as $post)
						<tr>
							<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90" height="50"></td>
							<th>{{ $post->title }}</th>
							<td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-xs">Edit</a></td>
							<td><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">Trash</a></td>
						</tr>
					@endforeach
				@else
					<tr>
 						<th colspan="5" class="text-center">No published posts. Look into trashed posts to restore or create new.</th>
 					</tr>
				@endif
				</tbody>
			</table>
		</div>
	</div>
@stop