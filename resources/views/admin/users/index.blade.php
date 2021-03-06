@extends('layouts.app')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Users
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Avatar</th>
					<th>Name</th>
					<th>Permissions</th>
					<th>Status</th>
					<th>Delete</th>
				</thead>
				<tbody>
				@if(count($users) > 0)
					@foreach($users as $user)
						<tr>
							<td><img src="{{ asset($user->profile->avatar) }}" alt="avatar" width="50px" height="50px" style="border-radius: 50%;" title="{{ $user->name }} - avatar"></td>
							<td>{{ $user->name }}</td>
							<td>
								@if($user->admin)
									<a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Remove permission</a>
								@else
									<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-success btn-xs">Make admin</a>
								@endif
							</td>
							<td>
								@if($user->admin)
									Admin
								@else
									User
								@endif
							</td>
							<td>
							<!--Ne dozvoljavam user-u da obrise sam svoj profil-->
								@if(Auth::id() !== $user->id)
									<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Delete</a>
								@endif
							</td>
						</tr>
					@endforeach
				@else
					<tr>
 						<th colspan="5" class="text-center">No users.</th>
 					</tr>
				@endif
				</tbody>
			</table>
		</div>
	</div>
@stop