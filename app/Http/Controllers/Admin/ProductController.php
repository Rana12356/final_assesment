<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct ()
    {
        return view('backend.product.add');
    }

    public function newProduct (Request $request)
    {
        Product::newProduct($request);
        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    public function manageProduct ()
    {
        return view('backend.product.manage', [
            'products' => Product::all()
        ]);
    }

    public function editProduct ($id)
    {
        return view('backend.product.edit', [
            'product' => Product::find($id)
        ]);
    }

    public function updateProduct (Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('success', 'Product Updated Successfully');
    }
}
