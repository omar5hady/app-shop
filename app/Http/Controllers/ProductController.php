<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
      $products = Product::paginate(10);
      return view('admin.products.index')->with(compact('products')); //Listado
    }

    public function create(){
      return view('admin.products.create'); //formulario de registro
    }

    public function store(Request $request){
      //validar
      $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el producto.',
        'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
        'description.required' => 'Es necesario ingresar una descripción para el producto',
        'description.max' => 'La descripcion corta solo admite hasta 200 caracteres',
        'price.required' => 'Es obligatorio definir un precio para el producto',
        'price.numeric' => 'Ingrese un precio valido',
        'price.min' => 'No se admiten valores negativos',
      ];
      $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:250',
        'price' => 'required|numeric|min:0'
      ];
      $this->validate($request, $rules, $messages);

      $product = new Product();
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->save(); //INSERT

      return redirect('/admin/products');
    }

    public function edit($id){
      //return "Mostrar aqui form para edicion de $id ";
      $product = Product::find($id);
      return view('admin.products.edit')->with(compact('product')); //formulario de registro
    }

    public function update(Request $request,$id){
      //almacenar nuevo producto en BD
      //dd($request->all());
      //validar
      $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el producto.',
        'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
        'description.required' => 'Es necesario ingresar una descripción para el producto',
        'description.max' => 'La descripcion corta solo admite hasta 200 caracteres',
        'price.required' => 'Es obligatorio definir un precio para el producto',
        'price.numeric' => 'Ingrese un precio valido',
        'price.min' => 'No se admiten valores negativos',
      ];
      $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:250',
        'price' => 'required|numeric|min:0'
      ];
      $this->validate($request, $rules, $messages);
      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->save(); //UPDATE

      return redirect('/admin/products');
    }

    public function destroy($id){
      $product = Product::find($id);
      $product->delete(); //DELETE

      return back();
    }
}
