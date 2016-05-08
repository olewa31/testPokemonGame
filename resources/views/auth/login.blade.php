@extends('main')
@section('content')

	<div class="container">
		{!! Form::open() !!}
			{{ Form::email('email', null, array('class' => 'input',
											 'placeholder' => 'Email Address'))
											 }}
			
			{{ Form::password('password', array('class' => 'input',
										        'placeholder' => 'Password'))
												 }}<br>

			{{ Form::label('remember', 'Remember me:') }}<br>
			{{ Form::checkbox('remember') }}

			{{ Form::submit('Login', array('class' => 'input')) }}										  
		{!! Form::close() !!}
		
	</div>
@endsection