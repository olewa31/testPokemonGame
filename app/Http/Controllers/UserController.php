<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Session;
use App\Pokemon;
use Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
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
        //
        $users = User::all();

        return view('users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        if(Auth::user()->id != $id)
        {
            Session::flash('error','You have no rights to view this resource');
            return redirect()->route('users.show', Auth::user()->id);
        }
        else
        {

        $pokemons = Pokemon::all();
        return view('users.show')->withUser($user)->withPokemons($pokemons);
        }
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
        $user = User::find($id);
        
        return view('users.edit')->withUser($user);

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
        //
        $user = User::find($id);
        $this->validate($request, array(
                                    'name' => 'required|between:4,12|unique:users,name,'.$user->id,
                                    'fullname' => 'required|between:1,100',
                                    'birthday' => 'required|before: 3 years ago|after: 100 years ago',
                                    'email' => 'required|unique:users,email,'.$user->id,
                                    'image' => 'image'
                                    ));

        //profile image proccessing
        if($request->file('image') != null)
        {
            $imageName = 'user'.$user->id.'avatar.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'\avatars', $imageName);
            $user->image_path = '\avatars\\'.$imageName;
        }
        //updating the user
        $user->name = $request->input('name');
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        
        $user->save();
        Session::flash('success', 'Profile updated');
        return redirect()->route('users.show', $user->id);
    }

    public function update_admin($id)
    {

        $user = User::find($id);
        if($user->is_admin){
            $user->is_admin = 0;
        }
        else{
            $user->is_admin = 1;
        }
        $user->save();
        Session::flash('success', 'User priviledges changed');
        return redirect()->route('users.index');

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
        $user = User::find($id);
        if($user->pokemons_owned > 0)
        {
            $pokemons = Pokemon::where('user_id', $user->id)->get();
            foreach($pokemons as $pokemon)
            {
                $pokemon->user_id = null;
                $pokemon->save();
            }
        }

        $user->delete();

        Session::flash('success', 'User deleted');
        return redirect()->route('users.index');
    }
}
