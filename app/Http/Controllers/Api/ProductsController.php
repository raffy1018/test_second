<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Product::where('router_id', session('router_id'));

        return DataTables::eloquent($query)
            ->addColumn('col_action', function($product) {
                return \View::make('backoffice.products._col_action', compact('product'));
            })
            ->rawColumns(['_col_action'])
            ->make(true);
    }

    public function price() {
        $product = Product::find(request('product_id'));

        return ['price' => $product->price, 'description' => $product->type.'- '.$product->name];
    }
}
