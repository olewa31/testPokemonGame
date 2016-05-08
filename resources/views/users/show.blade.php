@extends('main')

@section('content')
	<div class="wider_container">
	<font id="justtext">
	<table class="no_border">
		<tr>
			<td class="no_border" rowspan="4"><img class="avatar" src="{{ $user->image_path }}" /></td>
			<td class="no_border">Name:</td><td class="no_border">{{ $user->fullname }}</td>
		</tr>
		<tr>
			<td class="no_border">Username:</td><td class="no_border">{{ $user->name }}</td>
		</tr>
		<tr>
			<td class="no_border">Email:</td><td class="no_border">{{ $user->email }}</td>
		</tr>
		<tr>
			<td class="no_border">Date of Birth:</td><td class="no_border">{{ $user->birthday }}</td> 
		</tr>
		
		
	</table>
	<a href="{{ route('users.edit', Auth::user()->id)}}" class="button_small">Edit profile</a><br><br>

	@if($user->pokemons_owned == 0)
	
		{{Session::flash('error','You have no pokemons. Recruit some in a Pokemons panel.')}}

	@else
		Your Pokemons:<br>
		<table>
			<thead>
				<th>Image</th>
				<th>Name</th>
				<th>Strength</th>
				<th>Action</th>
			</thead>
		<tbody>
		@foreach ($pokemons as $pokemon)

			@if ($pokemon->user_id == Auth::user()->id)

				
				<tr>
					<td><img class="small_avatar" src="{{$pokemon->image_path}}" /></td>
					<td>{{ $pokemon->name }}</td>
					<td class="middle">{{ $pokemon->strength }}</td>
					<td>
					{!! Form::model($pokemon, array('route' => array('abandon', $pokemon->id), 'method' => 'PUT')) !!}
							{{ Form::submit('Abandon', array('class' => 'button_small')) }}
							<a class="button_small" href="{{route('pokemons.edit', $pokemon->id)}}">Rename</a>
					{!! Form::close() !!}
					</td>
				</tr>		
					

			@endif

		@endforeach
		</tbody>
		</table>
	@endif

	</font>
	</div>
@endsection