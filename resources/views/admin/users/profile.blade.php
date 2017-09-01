@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Edit your profile
		</div>
		<div class="panel-body">
			<form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
				</div>
				<div class="form-group">
					<label for="password">New Password:</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="avatar">Upload new avatar:</label>
					<input type="file" name="avatar" id="avatar" class="form-control">
				</div>
				<div class="form-group">
					<label for="facebook">Facebook profile:</label>
					<input type="text" name="facebook" id="facebook" class="form-control" value="{{ $user->profile->facebook }}">
				</div>
				<div class="form-group">
					<label for="twitter">Twitter profile:</label>
					<input type="text" name="twitter" id="twitter" class="form-control" value="{{ $user->profile->twitter }}">
				</div>
				<div class="form-group">
					<label for="about">About me:</label>
					<textarea name="about" id="content" class="form-control" cols="5" rows="5">{{ $user->profile->about }}</textarea>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update profile</button>
					</div>
				</div>
			</form>
		</div>
	</div>	
@stop