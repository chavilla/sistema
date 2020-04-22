<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Product;
use App\Category;
use App\User;
use App\Entry;

class ProductController extends Controller
{
    public function create(){
        $categories=Category::all();
        return view('product.create',['categories'=>$categories]);
    }

    public function edit($id){
        $categories=Category::all();
        $product=Product::where('id',$id)->first();
        return view('product.create',['product'=>$product,'categories'=>$categories]);
    }

    public function getAll(){
        $products=Product::all();
        return view('product.list_products',['products'=>$products]);
    }
    
    public function save(Request $request){


        $validate=$this->validate($request,[
            'category'=>['required','string'],
            'name' => ['required', 'string', 'max:255', 'unique:products'],
            'price' => ['required', 'string'],
            'tax' => ['required', 'string'],
            'inventory' => ['required', 'string', 'max:255'],
            'reference'=>['required', 'string', 'max:255'],
        ]);

        $name=$request->input('name');
        $category=intval($request->input('category'));
        $price=floatval($request->input('price'));
        $count=intval($request->input('count'));
        $tax=intval($request->input('tax'));
        $inventory=$request->input('inventory');
        $description=$request->input('description');
        $reference=$request->input('reference');

        $costTax=floatval($price*($tax/100));
        $total=$price+$costTax;

        $product=Product::create(array(
            'category_id'=>$category,
            'name'=>$name,
            'price'=>$price,
            'count'=>0,
            'priceTotal'=>$total,
            'tax'=>$tax,
            'inventory'=>$inventory,
            'description'=>$description,
            'reference'=>$reference,
            'user_id'=>\Auth::user()->id
            ));

            if($product) {
                return redirect()->action('ProductController@getAll')->with('status','Producto creado correctamente'); 
            }else{
                return redirect()->action('ProductController@create')->with('status','No se ha creado el producto');
            }

    }

    public function update(Request $request){

        $id=$request->input('id');
        $validate=$this->validate($request,[
            'category'=>['required','string'],
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id),],
            'price' => ['required', 'string'],
            'tax' => ['required', 'string'],
            'inventory' => ['required', 'string', 'max:255'],
            'reference'=>['required', 'string', 'max:255'],
        ]);

        $name=$request->input('name');
        $category=intval($request->input('category'));
        $price=floatval($request->input('price'));
        $count=intval($request->input('count'));
        $tax=intval($request->input('tax'));
        $inventory=$request->input('inventory');
        $description=$request->input('description');
        $reference=$request->input('reference');

        $costTax=floatval($price*($tax/100));
        $total=$price+$costTax;

        $product=Product::where('id',$id)
        ->update(array(
            'category_id'=>$category,
            'name'=>$name,
            'price'=>$price,
            'count'=>0,
            'priceTotal'=>$total,
            'tax'=>$tax,
            'inventory'=>$inventory,
            'description'=>$description,
            'reference'=>$reference,
            'user_id'=>\Auth::user()->id
        ));

        if ($product) {
            return redirect()->action('ProductController@getAll')
            ->with('status', 'Producto actualizado');   
        }
        else{
            return redirect()->action('ProductController@edit',['id'=>$id])->with('status','No se ha podido actualizar');
        }
    }

    public function delete($id){
        $product=Product::where('id',$id)->delete();

        $entry=Entry::where('product_id',$id)->delete();

        return redirect()->action('ProductController@getAll')
        ->with('status','Producto eliminado');   
    }
}
