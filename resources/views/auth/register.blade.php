@extends('main')
@section('content')

	<div class="container">
		{!! Form::open() !!}
			{{ Form::text('fullname', null, array('class' => 'input',
											 'placeholder' => 'Full Name'))
											 }}

			{{ Form::text('name', null, array('class' => 'input',
											 'placeholder' => 'Username'))
											 }}

			{{ Form::email('email', null, array('class' => 'input',
											 'placeholder' => 'Email Address'))
											 }}

			{{ Form::date('birthday', null, array('class' => 'input'
											 ))
											 }}
			
			{{ Form::password('password', array('class' => 'input',
										        'placeholder' => 'Password (min. 6 characters)'))
												 }}

			{{ Form::password('password_confirmation', array('class' => 'input',
										        'placeholder' => 'Confirm Password'))
												 }}

			

			{{ Form::submit('Register', array('class' => 'input')) }}
			
	</div>

@endsection