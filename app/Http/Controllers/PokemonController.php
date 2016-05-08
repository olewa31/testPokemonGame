<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pokemon;

use Session;

use Auth;



class PokemonController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //----RETRIEVE--ALL--POKEMONS--FROM--DATABASE----
        $pokemons = Pokemon::all();
        //----RETURN--A--VIEW----
        return view('pokemons.index')->withPokemons($pokemons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pokemons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //----VALIDATION----
        $this->validate($request, array(
                                    'name' => 'required|between:4,12|unique:pokemons,name',
                                    'strength' => 'required|between:1,100'
                                    ));
        //----INSERT--INTO--DATABASE----
        $pokemon = new Pokemon;
        if($request->file('image') != null)
        {
            $imageName = 'pokemon'.$pokemon->id.'image.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'\pokemonsImages', $imageName);
            $pokemon->image_path = '\pokemonsImages\\'.$imageName;
        }

        $pokemon->name = $request->name;
        $pokemon->strength = $request->strength;

        $pokemon->save();

        Session::flash('success', 'Pokemon added');

        //----REDIRECT----

        return redirect()->route('pokemons.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pokemon = Pokemon::find($id);

        return view('pokemons.edit')->withPokemon($pokemon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //----VALIDATION----
        $pokemon = Pokemon::find($id);
        $this->validate($request, array(
                                    'name' => 'required|between:4,12|unique:pokemons,name,'.$pokemon->id,
                                    'strength' => 'required|between:1,100',
                                    'image' => 'image'
                                    ));
        //----UPDATE--RECORD----

        //image processing
        if($request->file('image') != null)
        {
            $imageName = 'pokemon'.$pokemon->id.'image.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'\pokemonsImages', $imageName);
            $pokemon->image_path = '\pokemonsImages\\'.$imageName;
        }
        //pokemon update

        $pokemon->name = $request->input('name');
        $pokemon->strength = $request->input('strength');

        $pokemon->save();

        Session::flash('success', 'Pokemon updated');

        //----REDIRECT----

        return redirect()->route('pokemons.index');
    }


    public function abandon_pokemon($id)
    {
        $pokemon = Pokemon::find($id);

        Auth::user()->army_strength -= $pokemon->strength;
        $pokemon->user_id = null;
        Auth::user()->pokemons_owned--;
        $pokemon->save();
        Auth::user()->save();

        Session::flash('success', 'Pokemon abandoned');

        return redirect()->route('users.show', Auth::user()->id);
    }

    public function update_pokemons($id)
    {
        $pokemon = Pokemon::find($id);

        if(Auth::user()->pokemons_owned < 5 )
        {

            $pokemon->user_id = Auth::user()->id;
            Auth::user()->pokemons_owned += 1;
            Auth::user()->army_strength += $pokemon->strength;
            Auth::user()->save();
            $pokemon->save();
        }
        else
        {
            Session::flash('error', 'You can have maximum 5 pokemons');
            return redirect()->route('pokemons.index');
        }


        Session::flash('success', 'Pokemon recruited');
        return redirect()->route('pokemons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pokemon = Pokemon::find($id);
        if($pokemon->user_id != null)
        {
            $user = $pokemon->user;
            $user->pokemons_owned--;
            $user->army_strength -= $pokemon->strength;
            $user->save();
        }
        $pokemon->delete();

        Session::flash('success', 'Pokemon deleted');
        return redirect()->route('pokemons.index');
    }
}
