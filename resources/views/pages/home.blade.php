@extends('main')
@section('content')
    
    <div class="container">
        @if(Auth::user())

        <table>
			<thead>
				
				<th>Name</th>
				<th>Strength</th>
				
				<th></th>
			</thead>
			<tbody>
				@foreach ($pokemons as $pokemon)
					<tr>
						@if ($pokemon->user_id == Auth::user()->id)
						<td>{{ $pokemon->name }}</td>
						<td class="middle">{{ $pokemon->strength }}</td>
						

						
						
						<td><a class="button_small" href="abandon")}}>Abandon</a>	
						<!--<a class="button_small" href="{{route('pokemons.edit', $pokemon->id)}}">Edit</a>-->
						
						
						


						
						
						</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
       @endif

    </div>
@endsection
