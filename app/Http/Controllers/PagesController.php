<?php 

namespace App\Http\Controllers;

use App\Pokemon;

use Auth;

class PagesController extends Controller {

	public function __construct(){
        $this->middleware('auth');
    }

	public function getIndex() {
		$pokemons = Pokemon::all();

		return redirect()->route('users.show', Auth::user()->id)->withPokemons($pokemons);
	}

	public function getLogin() {

		
	}

}