<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll(){
        $categories=Category::all();
        return view('categories.list_categories',['categories'=>$categories]);
    }
    public function create(){
        return view('categories.create');
    }

    public function edit($id){
        $category=Category::where('id',$id)->first();
        return view('categories.create',['category'=>$category]);
    }

    public function save(Request $request){

        $validate=$this->validate($request,[
            'name' => ['required', 'alpha', 'max:255','unique:categories'],
        ]);

        $name=$request->input('name');

        $category=Category::create(array(
            'name'=>$name
        ));
        if ($category) {
                return redirect()->action('CategoryController@getAll')->with('status','Categoría guardada');
        }
        else{
            return redirect()->action('CategoryController@create')->with('status','No se ha podido creaar una categoría');
        }
    }

    public function update(Request $request){
        $id=$request->input('id');
        $validate=$this->validate($request,[
            'name' => ['required', 'alpha', 'max:255',Rule::unique('categories')->ignore($id),],
        ]);

        $name=$request->input('name');
        $category=Category::where('id',$id)
        ->update(array(
            'name'=>$name
        ));
        if ($category) {
            return redirect()->action('CategoryController@getAll')->with('status','Categoría guardada');
        }
        else{
            return redirect()->action('Category@edit',['id'=>$id])->with('status','No se pudo guardar la categoría');
        }
    }

    public function delete($id){
        $category=Category::where('id',$id)->delete();
        if ($category) {
            return redirect()->action('CategoryController@getAll')->with('status','Categoría eliminada');
        }
        else{
            return redirect()->action('CategoryController@getAll')->with('status','No se ha podido eliminar');
        }
        
    }
}
