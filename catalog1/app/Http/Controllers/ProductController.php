<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view("products.index", compact("products"));
    }

    public function create(){
        return view("products.create");
    }

    public function store(Request $requset)
    {
        $request->validate([
            "name"=>"required|string|max:150",
            "description"=>"required|string|min:20",
        ]);

        Product::create($request->all());
        
        return redirect()->route("products.index")->with("success", "Product is created");
    
    }

    public function edit(Product $product)
    {
        return view("product.edit", compact("product"));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>["required", "string", "max:255", Rule::unique("products")->ignore($product->id)],
            "description"=>"required|string|min:20",
        ]);

        $product->update($request->all());

        return redirect()->route("products.index")->with("success", "Product is updated");
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route("products.index")->with("succes", "Product is deleted");
    }

    
}
