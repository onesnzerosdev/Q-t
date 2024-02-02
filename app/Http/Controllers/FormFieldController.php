<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FormField;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('form.index', compact('categories'));
    }


    public function store(Request $request)
    {

        foreach ($request->label as $key => $label) {
            FormField::create([
                'category_id' => $request->category_id,
                'label' => $label,
                'input_name' => $request->input_name[$key],
            ]);
        }

        return back();
    }
}
