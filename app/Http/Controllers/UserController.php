<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all()->except(Auth::id());
        return view('user.index')->withUsers($users);
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
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $index)
    {
        return view('users.show',compact('index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $index)
    {
        return view('users.edit',compact('index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $index)
    {
        $request->validate([
            'old_password' => 'nullable',
            'new_password' => 'nullable|confirmed',
            'email' => 'required|email|max:255',
            'name' => 'required|min:3|max:255'
        ]);
        $send = false;
        if($request->email != $index->email) {
            $index->email_verified_at = null;
            $send = true;
            //enviar correo de verificacion
        }
        if($request->new_password != null) {
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->withErrors(['old_password' => 'La clave anterior no es correcta']);
            }
            $index->password = Hash::make($request->new_password);
        }
        if($index->update($request->all())) {
            if($send) {
                $index->sendEmailVerificationNotification();
            }
        }
        //Flash::message('Actualizado correctamente.!');
        return redirect()->back()->with('sucess','Actualizado correctamente.!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $index)
    {
        $index->delete();
        return redirect()->route('index.index')->with('success','User deleted successfully');
    }
}
