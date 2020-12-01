<?php

namespace App\Http\Controllers;

use App\Label;
use App\Http\Requests\Labels\CreateLabelRequest;
use App\Http\Requests\Labels\UpdateLabelRequest;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin_or_product_manager');
    }
    
    public function index()
    {
        $labels = Label::all();
        return view('labels.index', compact('labels'));
    }

    public function show(Label $label)
    {
        return view('labels.show', compact('label'));
    }

    public function create()
    {
        return view('labels.create');
    }

    public function store(CreateLabelRequest $request)
    {
        Label::create($request->all());
        return redirect(route('labels.index'))->with('success', 'A label has been created');
    }
    public function edit(Label $label)
    {       
        return view('labels.edit', compact('label'));
    }

    public function update(UpdateLabelRequest $request, Label $label)
    {       
        $label->slug = null;
        $label->update($request->all());
        return redirect(route('labels.index'))->with('success', 'A label has been updated');
    }

    public function confirmDelete(Label $label)
    {
        return view('labels.confirmDelete', compact('label'));
    }
    public function destroy(Request $request, Label $label)
    {
        if($label->products->count() > 0){
            session()->flash('error', 'You cannot delete this label because there is associated products');
        }else{
            $label->delete();
            session()->flash('success', 'A label has been deleted');
        }       
        return redirect(route('labels.index'));
    }
}
