<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'description', 'thumbnail', 'image_one', 'image_two', 'image_three', 'stock', 'price', 'category_id', 'description')->get();
        return view('admin.product.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $input = $request->validated();
        foreach($request->file() as $key => $file){
            $path = $file->store('shoes');
            $input[$key] = $path;
        }
        $product = Product::create($input);
        return redirect()->route('admin.product.index')->with('message', 'New product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show')->with(compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.update')->with(compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->validated();
        $files_arr = ['thumbnail', 'image_one', 'image_two', 'image_three'];
        foreach($request->file() as $key => $file){
            $path = $file->store('shoes');
            $input[$key] = $path;
            if(($i = array_search($key, $files_arr)) !== false) {
                unset($files_arr[$i]);
            }
            if($product[$key] && \Storage::exists($product[$key]))
                \Storage::delete($product[$key]);
        }
        foreach($files_arr as $file){
            unset($input[$file]);
        }
        $product->update($input);
        return redirect()->route('admin.product.index')->with('message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $product = Product::findOrFail($id);
            
            if($product->thumbnail && \Storage::exists($product->thumbnail))
            \Storage::delete($product->thumbnail);
            
            if($product->image_one && \Storage::exists($product->image_one))
            \Storage::delete($product->image_one);
            
            if($product->image_two && \Storage::exists($product->image_two))
            \Storage::delete($product->image_two);
            
            if($product->image_three && \Storage::exists($product->image_three))
            \Storage::delete($product->image_three);
            $product->delete();
            
            return redirect()->route('admin.product.index')->with('success','Product deleted!');
        }catch(\Exception $e){
            return redirect()->route('admin.product.index')->with('error','Some error occured!');
        }
    }
}
