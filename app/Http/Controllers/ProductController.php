<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Label;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin_or_product_manager');
        return $this->middleware('has_category_and_label')->only('create');
       
        
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::all(),
        ];
       
        return view('products.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'products' => Product::all(),
            'categories' => Category::all(),
            'labels' => Label::all(),
        ];
       
        return view('products.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {      
        $product = new Product();   
        $image = $product->storeImage($request->image);
        Product::create([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category,
            'label_id' => $request->label,
        ]);
        return redirect(route('products.index'))->with('success', 'A product has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = [
            'product' => $product,
            'categories' => Category::all(),
            'labels' => Label::all(),
        ];
        return view('products.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->all());
        $product->slug = null;
        $data = $request->only(['name', 'price', 'description', 'content', 'category_id', 'label_id']);
        if($request->hasFile('image')){  
            $product->deleteExistingImage();
            $data['image'] = $product->storeImage($request->image);
        }
        $product->update($data);
        return redirect(route('products.index'))->with('success', 'A product has been updated');

    }

    public function confirmDelete(Product $product)
    {
        return view('products.confirmDelete', compact('product'));
    }
    public function destroy(Product $product)
    {
        $product->deleteExistingImage();
        $product->delete();
        return redirect(route('products.index'))->with('success', 'A product has been deleted');
    }
}
