<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function getAll(){
        $clients=Client::all();
        return view('client.list_clients',['clients'=>$clients]);
    }

    public function create(Request $request){

        $validate=$this->validate($request,[
            'name' => ['required', 'alpha', 'max:255'],
            'phone' => ['required', 'string', 'max:255','unique:clients'],
            'email' => ['required','email', 'max:255', 'unique:clients'],
        ]);

        $client=new Client();
        $client->name=$request->name;
        $client->phone=$request->phone;
        $client->email=$request->email;
        $client->save();
        return response()->json(['message'=>'Cliente insertado']);
    }
}
