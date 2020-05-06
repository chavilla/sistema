<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use App\Product;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll(){
        $entries=Entry::orderBy('id','desc')->paginate(10);
        return view('entry.list_entries',['entries'=>$entries]);
    }

    public function create(){
        $products=Product::all();
        return view('entry.create',['products'=>$products]);
    }

    public function edit($id){

    }

    public function save(Request $request){

        $count=intval($request->input('count'));
        $cost=floatval($request->input('cost'));
        $idProd=intval($request->input('product'));

        $validate=$this->validate($request,[
            'count' => ['required', 'Integer'],
            'cost' => 'nullable|regex:/^\d*(\.\d{2})?$/',
            'product' => ['required', 'Integer'],
        ]);

        $entry=Entry::create(array(
            'product_id'=>$idProd,
            'count'=>$count,
            'cost'=>$cost,
            'user_id'=>\Auth::user()->id
        ));

        $productCount=Product::find($idProd);
        $countUpdated=intval($productCount->stock+$count);
        $product=Product::where('id',$idProd)
        ->update(array(
            'stock'=>$countUpdated
        ));

        if ($entry && $product) {
            return redirect(route('list_entries'))->with('status','Entrada ingresada');
        }
        else {
            return redirect(route('create_entry'))->with('status','Hubo un problema');
        }

    }

    public function update(){

    }

    public function delete($id){
        /* Obtener la entrada a eliminar para usar algunos datos */
        $entryCount=Entry::find($id);
        $entry=Entry::where('id',$id)->delete();
        /* Restar a la cantidad del producto la cantidad de la entrada a eliminar */
        $countUpdated=intval($entryCount->product->stock-$entryCount->count);
        /* Llamamos al producto a actualizar */
        $product=Product::where('id',$entryCount->product->id)
        ->update(array(
            'stock'=>$countUpdated
        ));
        return redirect()->action('EntryController@getAll')
        ->with('status','Entrada eliminada'); 
    }
}
