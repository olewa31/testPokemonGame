@if (Session::has('success'))

	<div class="confirm_div">
		<strong>{{ Session::get('success') }}</strong>
	</div>
	
@endif

@if (Session::has('error'))
	<div class="error_div">
		<strong>{{ Session::get('error') }}</strong>
	</div>
@endif

@if (count($errors) > 0)

	<div class="error_div">
		<strong>
			
			@foreach ($errors->all() as $error)
				{{ $error }}<br>
			@endforeach

		</strong>
	</div>

@endif