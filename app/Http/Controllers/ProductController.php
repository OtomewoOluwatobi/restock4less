<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProduct = Product::paginate(10);
        return View('admin', compact('allProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // In your ProductController.php
    public function store(Request $req)
    {
        $req->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'discription' => 'required|string',
        ]);

        $productData = [
            'name' => $req->product_name,
            'price' => $req->price,
            'discription' => $req->input('discription'),
        ];

        if ($req->hasFile('image_url')) {
            $image = $req->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('landing_page/images'), $imageName);
            $productData['image_url'] = $imageName;
        }

        Product::create($productData);

        return redirect()->back()->with('success', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
