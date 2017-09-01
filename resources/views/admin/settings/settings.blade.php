@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Edit site settings
		</div>
		<div class="panel-body">
			<form action="{{ route('settings.update') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Site Name:</label>
					<input type="text" name="site_name" id="name" class="form-control" value="{{ $settings->site_name }}">
				</div>
				<div class="form-group">
					<label for="adderss">Address:</label>
					<input type="text" name="address" id="address" class="form-control" value="{{ $settings->address }}">
				</div>
				<div class="form-group">
					<label for="contact_number">Contact phone:</label>
					<input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $settings->contact_number }}">
				</div>
				<div class="form-group">
					<label for="contact_email">Contact eamil:</label>
					<input type="text" name="contact_email" id="contact_email" class="form-control" value="{{ $settings->contact_email }}">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update site info</button>
					</div>
				</div>
			</form>
		</div>
	</div>	
@stop