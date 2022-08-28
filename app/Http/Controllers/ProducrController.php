<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProducrController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

    public function dashboard()
    {
        $products = Product::all();
        return view('admin.dashboard', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'imageUrl' => 'required',
            'price' => 'required',
            'quantity' => 'required',

        ]);
        $product = Product::create($data);
        return Response::json($product);
    }
    public function increseQuantity($id, Request $request)
    {
        $product = Product::find($id);
        $product->quantity = $product->quantity + 1;
        $product->save();
        return response()->json($product);
    }
    public function decreseQuantity($id, Request $request)
    {
        $product = Product::find($id);
        $product->quantity = $product->quantity - 1;
        if($product->quantity==0){
            $product->delete();
            return response()->json(['message'=>'product has been deleted','id'=>$id]);

        }
        $product->save();
        return response()->json($product);
    }
}
