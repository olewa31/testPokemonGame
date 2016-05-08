@extends('main')

@section('content')

	<div class="container">
		<font id="justtext">Fill the form and add a Pokemon</font>

		{!! Form::open(array('route' => 'pokemons.store', 'files' => true)) !!}
    		
			
			{{ Form::text('name', null, array('class' => 'input', 
											  'placeholder' => 'Name (4 - 12 characters long)')) }}

			{{ Form::number('strength', null, array('class' => 'input', 
											        'placeholder' => 'Strength (1 - 100)',
											        'min' => '1',
											        'max' => '100')) }}
			<br>Image: {{ Form::file('image')}}
			
			{{ Form::submit('Add a Pokemon') }}								        
			
		{!! Form::close() !!}

	</div>

@endsection