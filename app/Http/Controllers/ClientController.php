<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll(){
        $clients=Client::all();
        return view('client.list_clients',['clients'=>$clients]);
    }


    public function create(Request $request){

        $validate=$this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'nit' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255','unique:clients'],
            'email' => ['required','email', 'max:255', 'unique:clients'],
        ]);

        $client=new Client();
        $client->name=$request->name;
        $client->nit=$request->nit;
        $client->phone=$request->phone;
        $client->email=$request->email;
        $save=$client->save();
        if ($save) {
            return response()->json([
                'status'=>'success',
                'message'=>'Cliente insertado',
                'name'=>$client->name,
                'nit'=>$client->nit,
                'phone'=>$client->phone,
                'email'=>$client->email
                ]);
        }
        else{
            return response()->json([
                'status'=>'error',
                'message'=>'Alguno de los datos es incorrecto'
            ]);
        }
        
            
    }

    public function edit($id){
        $client=Client::where('id',$id)->first();
        return view('client.edit_client',['client'=>$client]);
    }

    public function update(Request $request){


        $validate=$this->validate($request,[
            'name' => ['required', 'alpha', 'max:255'],
            'nit' =>['required','string','max:255', Rule::unique('clients')->ignore($request->id),],
            'phone' => ['required', 'string', 'max:255', Rule::unique('clients')->ignore($request->id),],
            'email' => ['required','email', 'max:255',  Rule::unique('clients')->ignore($request->id),],
        ]);
        $client=Client::find($request->id);
        $client->nit=$request->nit;
        $client->name=$request->name;
        $client->phone=$request->phone;
        $client->email=$request->email;
        $client->save();

        if ($client) {
            return redirect()->action('ClientController@getAll')
            ->with('status', 'Cliente actualizado');   
        }
        else{
            return redirect()->action('ClientController@edit',['id'=>$id])->with('status','No se ha podido actualizar');
        }
        
    }

}
