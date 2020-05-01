<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Http;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('user.create');
    }

    public function edit($id){
        $user=User::where('id',$id)->first();
        return view('user.create',['user'=>$user]);
    }

    public function getAll(){
        $users=User::all();
        return view('user.list_user',['users'=>$users]);
    }
    
    public function save(Request $request){

        $validate=$this->validate($request,[
            'name' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'rol' => ['required', 'string', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $pass=$request->password;
        $passwod_hash=Hash::make($pass);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->username=$request->username;
        $user->password=$passwod_hash;
        $user->rol=$request->rol;
        $user->save();
            if($user) {
                return redirect()->action('UserController@getAll')->with('status','Usuario creado correctamente'); 
            }else{
                return redirect()->action('UserController@create')->with('status','No se ha creado el usuario');
            }

    }

    public function update(Request $request){

        $id=$request->input('id');
        $validate=$this->validate($request,[
            'name' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id),],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id),],
            'rol' => ['required', 'string', 'string', 'max:255'],
        ]);

        $name=$request->input('name');
        $email=$request->input('email');
        $username=$request->input('username');
        $rol=$request->input('rol');

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->username=$request->username;
        $user->rol=$request->rol;
        $user->save();

        if ($user) {
            return redirect()->action('UserController@getAll')
            ->with('status', 'Usuario actualizado');   
        }
        else{
            return redirect()->action('UsuarioController@edit',['id'=>$id])->with('status','No se ha podido actualizar');
        }
    }

    public function delete($id){
        $user=User::find($id)->delete();
        return redirect()->action('UserController@getAll')
            ->with('status', 'Usuario eliminado'); 

    }

    public function password(){

        return view('user.password');
    }

    public function updatePassword(Request $request){
        $validate=$this->validate($request,[
            'password_new' =>['required', 'string', 'min:8'],
        ]);

        if (!password_verify($request->password_old,\Auth::user()->password)){
            return redirect()->action('UserController@password')->with('status','Tu contraseña actual no coincide');
        }
        else{
            $id=\Auth::user()->id;
            $user=User::find($id);
            $user->password=Hash::make($request->password_new);
            $user->save();
            if ($user){
                return redirect()->action('UserController@password')->with('updated','Contraseña actualizada');
            }
            else{
                return redirect()->action('UserController@password')->with('updated','No se ha podido actualizar');
            }
        }
        
    }

}
