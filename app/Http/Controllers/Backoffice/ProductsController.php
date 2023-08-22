<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        return view('backoffice.products.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $product = new Product;

        $product->router_id = session('router_id');
        $product->fill(request()->all());
        $product->save();

        return redirect()->route('backoffice.products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Product $product)
    {
        $product->fill(request()->all());
        $product->save();

        return redirect()->route('backoffice.products.index');
    }

    public function destroy(Product $product)
    {
        $poduct->delete();

        return redirect()->route('backoffice.permission.index');
    }
}
