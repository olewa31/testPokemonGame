@extends('main')

@section('content')

<div class="wider_container">
		<font id="justtext">List of the Users</font>

		
		<div>
		
		<table>
			<thead>
				@if (Auth::user()->is_admin)			
				<th>ID</th>
				@endif
				<th>Avatar</th>
				<th>Username</th>
				<th>Army Strength</th>
				@if (Auth::user()->is_admin)
				<th>Full Name</th>
				<th>Date of Birth</th>
				<th>Email</th>
				<th>Priviledges</th>
				<th>Last activity</th>
				<th>Action</th>
				@endif
			</thead>
			<tbody>
				@foreach ($users as $user)
					@if(!Auth::user()->is_admin)
						
					<tr>
						<td><img class="small_avatar" src="{{$user->image_path}}" /></td>
						<td>{{ $user->name }}</td>
						<td class="middle">{{ $user->army_strength }}</td>
					</tr>
					@endif
					
					@if(Auth::user()->is_admin)					
					<tr>						
						<td>{{ $user->id }}</td>
						<td><img class="small_avatar" src="{{$user->image_path}}" /></td>						
						<td>{{ $user->name }}</td>
						<td class="middle">{{ $user->army_strength }}</td>
						<td>{{ $user->fullname }}</td>
						<td>{{ $user->birthday }}</td>
						<td>{{ $user->email }}</td>						
						<td>
							@if ($user->is_admin)
							{{ 'Admin' }}
							@else
							{{ 'Standard' }}
							@endif
						</td>
						<td>{{ $user->updated_at }}</td>
						
						<td>
						{!! Form::model($user, array('route' => array('admin', $user->id), 'method' => 'PUT')) !!}
						@if (!$user->is_admin)
						{{ Form::submit('Make admin', array('class' => 'button_small')) }}
						@else
						{{ Form::submit('Make standard', array('class' => 'button_small')) }}
						@endif
						{!! Form::close() !!}
						{!! Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'DELETE')) !!}
						{!! Form::submit('Delete', array('class' => 'button_small')) !!}{!! Form::close() !!}
						</td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>
		</div>
	</div>

@endsection