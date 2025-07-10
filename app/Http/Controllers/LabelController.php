<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\LabelProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function allLabel()
    {

        $labels = Label::all();

        return view('pages.labels.all-labels', compact('labels'));
    }

    public function createView()
    {
        $products = Product::with('singleImage')->get();

        return view('pages.labels.create', compact('products'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Label::create($data);

        return redirect()->route('labels.all')->with('success', 'Label created successfully.');
    }

    public function updateView(Label $label)
    {
        return view('pages.labels.update', compact('label'));
    }

    public function update(Request $request, Label $label)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $label->update($data);

        return redirect()->route('labels.all')->with('success', 'Label updated successfully.');
    }

     public function destroy(Label $label)
    {
        $label->delete();
        return redirect()->route('labels.all')->with('success', 'Label deleted successfully.');
    }

 
}
