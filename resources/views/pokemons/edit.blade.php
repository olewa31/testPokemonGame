@extends('main')
@section('content')

	<div class="container">
	{!! Form::model($pokemon, array('route' => array('pokemons.update', $pokemon->id),
									'method' => 'PUT', 'files' => true)) !!}
    		
			
			{{ Form::text('name', null, array('class' => 'input', 
											  'placeholder' => 'Name (4 - 12 characters long)')) }}
			@if( Auth::user()->is_admin===1)
			{{ Form::number('strength', null, array('class' => 'input', 
											        'placeholder' => 'Strength (1 - 100)',
											        'min' => '1',
											        'max' => '100')) }}
			<br>Image: {{ Form::file('image')}}
			@else
			{!! Form::hidden('strength', null, array('class' => 'input', 
											        'placeholder' => 'Strength (1 - 100)',
											        'min' => '1',
											        'max' => '100')) !!}
			@endif
											        
		
	<br><a class="button_small" href="{{route('pokemons.index')}}">Cancel</a><br> 

	{{ Form::submit('Save', array('class' => 'button_small')) }}
	
		{!! Form::close() !!}
	</div>
@endsection