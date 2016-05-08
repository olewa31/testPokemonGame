@extends('main')
@section('content')

<div class="container">
	{!! Form::model($user, array('route' => array('users.update', $user->id),
									'method' => 'PUT', 'files' => true)) !!}
    		
			
			{{ Form::text('fullname', null, array('class' => 'input', 
											  'placeholder' => 'Full Name')) }}

			{{ Form::text('name', null, array('class' => 'input', 
											        'placeholder' => 'Username',
											        'min' => '1',
											        'max' => '100')) }}
	        {{ Form::email('email', null, array('class' => 'input',
											 'placeholder' => 'Email Address'))
											 }}
			{{ Form::date('birthday', null, array('class' => 'input'))}}

			<br>Avatar: {{ Form::file('image')}}

											        
		
	<br><a class="button_small" href="{{route('users.show', $user->id)}}">Cancel</a><br> 

	{{ Form::submit('Save', array('class' => 'button_small')) }}
	
		{!! Form::close() !!}
	</div>

@endsection