<!DOCTYPE html>
<html>
    <head>
        <title>The Pokemon Game</title>

        <link rel="stylesheet" type="text/css" href="/css/default.css" />

        
    </head>
    <body>
    <center><div class="title">
        <h1 class="title">The Pokemon Game</h1>

        @include('popups._messages')


    </div></center>
    
    <div class="user_info">

    @if (Auth::check()) 
    You are logged in as {{ Auth::user()->name }} 
        @if (!Auth::user()->is_admin)
        (you are a standard user)
        @else
        (you are an admin)
        @endif
    <a href="{{ route('users.show', Auth::user()->id)}}" class="button_small">Account</a>
    <a href="{{ route('users.index') }}" class="button_small">Users</a>
    <a href="{{ route('pokemons.index') }}" class="button_small">Pokemons</a>
    <a href="{{ route('logout')}}" class="button_small">Logout</a>
    <div class="army">Your Army Strength: {{ Auth::user()->army_strength }}</div>

    @else
    You are not logged in. <a href="{{route('login')}}" class="button_small">Login</a>
    <a href="{{route('register')}}" class="button_small">Register</a>
    @endif

    </div>


        <center>
            @yield('content')
        </center>
    </body>
</html>