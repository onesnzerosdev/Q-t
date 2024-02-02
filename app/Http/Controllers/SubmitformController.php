<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FormField;
use App\Models\Submitform;
use Illuminate\Http\Request;

class SubmitformController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $category = Category::find(2);

        $fields = FormField::latest()->get();

        return view('submitform.index', compact('fields', 'categories'));
    }







    public function store(Request $request)
    {
        $requestData = $request->except('_token');

        Submitform::create(['data' => json_encode($requestData)]);

        return back();
    }
}
