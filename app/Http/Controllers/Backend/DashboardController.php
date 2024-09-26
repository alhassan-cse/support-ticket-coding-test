<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $products = Product::with('size_types','categories')->orderBy("id", "DESC")->select('id', 'category_id', 'sub_category_id', 'size_type_id', 'name', 'short_name', 'thumbnail', 'design_no', 'status')->take(5)->get();
        return view('backend.index');
    }
}
