@extends('main')

@section('content')

	<div class="wider_container">
		<font id="justtext">List of the pokemons</font>

		@if (Auth::user()->is_admin)
		<div><a href="{{ route('pokemons.create') }}" class="button">Create New Pokemon</a></div>
		@endif
		<div>
		<br><br><br>
		<table>
			<thead>
				@if (Auth::user()->is_admin)			
				<th>ID</th>
				@endif
				<th>Image</th>
				<th>Name</th>
				<th>Strength</th>
				@if (Auth::user()->is_admin)
				<th>Owned By</th>
				<th>Created at</th>
				@endif
				<th>Action</th>
			</thead>
			<tbody>
				@foreach ($pokemons as $pokemon)
					@if(!Auth::user()->is_admin)
						@if($pokemon->user_id==null)
					<tr>
						<td><img class="small_avatar" src="{{$pokemon->image_path}}" /></td>
						<td>{{ $pokemon->name }}</td>
						<td class="middle">{{ $pokemon->strength }}</td>
						<td>
						{!! Form::model($pokemon, array('route' => array('recruit', $pokemon->id), 'method' => 'PUT')) !!}
							{{ Form::submit('Recruit', array('class' => 'button_small')) }}
							{!! Form::close() !!}
						</td>
					</tr>
					@endif
					@endif
					@if(Auth::user()->is_admin)					
					<tr>
						<td>{{ $pokemon->id }}</td>						
						<td><img class="small_avatar" src="{{$pokemon->image_path}}" /></td>						
						<td>{{ $pokemon->name }}</td>
						<td class="middle">{{ $pokemon->strength }}</td>
						<td>
						@if ($pokemon->user_id != null)
						{{ $pokemon->user->name }}
						@endif
						</td>						
						<td>{{ $pokemon->created_at }}</td>
						
						<td>
						@if($pokemon->user_id == null)

							{!! Form::model($pokemon, array('route' => array('recruit', $pokemon->id), 'method' => 'PUT')) !!}
							{{ Form::submit('Recruit', array('class' => 'button_small')) }}
							{!! Form::close() !!}
							
						@endif	
						
						{!! Form::open(array('route' => array('pokemons.destroy', $pokemon->id), 'method' => 'DELETE')) !!}
						<a class="button_small" href="{{route('pokemons.edit', $pokemon->id)}}">Edit</a>
						{!! Form::submit('Delete', array('class' => 'button_small')) !!}
						</td>{!! Form::close() !!}
					</tr>
					@endif
					
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
@endsection