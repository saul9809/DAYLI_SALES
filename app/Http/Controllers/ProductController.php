<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        //Metodo latest ordena de forma desendiente por fecha de las mas antigua a la nueva 
        $products = Product::latest()->get(); //Listando información
        return Inertia::render('products/Index', compact('products')); //Listando y acomodando los datos e información
    }

    public function create_product()
    {
        return Inertia::render('products/CreateProduct');
    }
    public function store_product(Request $request)
    {
        //Validando los datos antes de persistirlos   
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        //Persisitiendo los datos en la base de datos
        Product::create($data);
        //Redirigiendo al usuario a la vista proncipal o listado de producto
        return redirect()->route('products.index')->with('message', 'Producto añadio satisfactoriamente');
    }
}
