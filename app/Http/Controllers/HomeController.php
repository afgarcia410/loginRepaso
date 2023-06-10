<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }
    public function edit()
    {
       //$user = User::find($id);
        
        return view('user.edit');
    }
    public function destroy($id){
        
    }
    
    public function update(Request $request) {
        $user = auth()->user();
        $request->validate([
            'old_password' => 'nullable',
            'new_password' => 'nullable|confirmed',
            'email' => 'required|email|max:255',
            'name' => 'required|min:3|max:255'
        ]);
        $send = false;
        if($request->email != $user->email) {
            $user->email_verified_at = null;
            $send = true;
            //enviar correo de verificacion
        }
        if($request->new_password != null) {
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->withErrors(['old_password' => 'La clave anterior no es correcta']);
            }
            $user->password = Hash::make($request->new_password);
        }
        if($user->update($request->all())) {
            if($send) {
                $user->sendEmailVerificationNotification();
            }
        }
        return redirect()->back()->withSuccess('Actualizado correctamente.!');
    }
    public function index2(){
        $users = User::all()->except(Auth::id());
        return view('user.index')->withUsers($users);
    }
}
