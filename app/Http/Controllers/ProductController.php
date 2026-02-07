<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return view('backend.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('backend.product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    Validation
    $request->validate(
        [
            'prod_name' => 'required|max:10|min:3',
            'price' => 'required',  
            'stock' => 'required',
            'category' => 'required',
            'sku' => 'required',
            'photo' => 'mimes:jpeg,png,jpg|max:2048',
        ]    
    ); 

    $product_img = '';
    
    if($request->photo==null){
        $product_img = 'product_photo/nophoto.jpg';
    } else {
        $product_img =  request()->photo->move('product_photo', $request->photo->getClientOriginalName());
    }

   // dd($product_img);

    //    Data
        $data = [
        'name' => $request->prod_name,
        'details' => $request->details,
        'sku' => $request->sku,
        'stock' => $request->stock,
        'price' => $request->price,
        'image' => $product_img,
        'category_id' => $request->category,
       ];
    //    Insert
       Product::create($data);
       return redirect()->route('product.index')->with('success', 'Product Added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //dd($product->image);
        $imagePath = public_path($product->image);
        unlink($imagePath);  
        
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Successfully Deleted');
    }
}
