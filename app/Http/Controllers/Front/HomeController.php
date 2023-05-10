<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home ()
    {
        return view('front.home.home', [
            'products' => Product::where('status', 1)->get()
        ]);
    }

    public function index ()
    {
        return view('front.category.index');
    }

    public function details ($id)
    {
        return view('front.category.details', [
            'product' => Product::find($id)
        ]);
    }
}
