<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin_or_product_manager');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect(route('categories.index'))->with('success', 'A category has been created');
    }
    public function edit(Category $category)
    {       
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {      
        $category->slug = null; 
        $category->update($request->all());
        return redirect(route('categories.index'))->with('success', 'A category has been updated');
    }

    public function confirmDelete(Category $category)
    {
        return view('categories.confirmDelete', compact('category'));
    }
    public function destroy(Category $category)
    {
        if($category->products->count() > 0){
            session()->flash('error', 'You cannot delete this category because there is associated products');
        }else{
            $category->delete();
            session()->flash('success', 'A category has been deleted');
        }       
        return redirect(route('categories.index'));
    }
}
