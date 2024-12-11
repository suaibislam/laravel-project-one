<?php

namespace App\Http\Controllers;

use App\Rules\NoScriptTag;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Purifier;
use HTMLPurifier;
use HTMLPurifier_Config;

class ProductController extends Controller
{
    // This method will show products page
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('layouts.app', [
            'products' => $products
        ]);
    }



    // public function getEmployees()
    // {
    //     return datatables()->of(Product::query())->make(true);
    // }



    public function indexone()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();


        return view('welcome', [
            'products' => $products
        ]);
    }


    public function indextwo($id, Request $request)
    {
        $products = Product::findOrFail($id);

        return view(
            'welchild.index',
            compact('products')
          
        );
    }

    // This method will show create product page
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:20',                // Name: Text only, max length 20
            'color' => 'required|string|max:20',               // Color: Text only, max length 20
            'price' => 'required|numeric|digits_between:1,5',  // Price: Numeric, max length 5 digits
            'description' => [
                'required',
                'string',
                'max:5000', // Maximum length of the description
                function ($attribute, $value, $fail) {
                    // Check if the value contains <script> tags
                    if (preg_match('/<script.*?>.*?<\/script>/is', $value)) {
                        $fail("The $attribute field contains disallowed script tags.");
                    }
                },
            ],
            'image' => 'nullable|image', // Validate image only if it exists
        ];

        // Validate request
        $validator = Validator::make($request->all(),
                $rules
            );

        if ($validator->fails()) {
            return redirect()
                ->route('products.create')
                ->withInput()
                ->withErrors($validator);
        }
       
        // Create and save product
        $product = new Product();
        $product->name = scriptStripper($request->name);
        $product->color = $request->color;
        $product->price = $request->price;
        $product->description = scriptStripper($request->description); // Strip HTML tags from description
        $product->save();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Unique image name
            $image->move(public_path('uploads/products'), $imageName);        // Save image to products directory
            $product->image = $imageName;
            $product->save();                                                // Update product with image name
        }

        return redirect()
        ->route('products.index')
        ->with('success', 'Product added successfully.');
    }







    // This method will show edit product page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    // This method will update a product
    public function update($id, Request $request)
    {

        $product = Product::findOrFail($id);

        $rules = [
            // 'name' => 'required|min:5',
            // 'color' => 'required|min:3',
            // 'price' => 'required|numeric'

            'name' => 'required|string|max:20',    // Name: Text only, max length 20
            'color' => 'required|string|max:20',  // Color: Text only, max length 20
            'price' => 'required|numeric|digits_between:1,5', // Price: Numbers only, max length 5
        ];

        $content = $request->input('description');

        // Check if content contains HTML tags
        if ($content !== strip_tags($content)) {
            $description = 'html';
        } else {
            $description = 'text';
        }

        // Save to database
        // Product::create([
        //     'content' => $content,
        //     'description' => $description, // Save the format (text or html)
        // ]);


        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $product->id)->withInput()->withErrors($validator);
        }

        // here we will update product
        $product->name = scriptStripper($request->name);
        $product->color = $request->color;
        $product->price = $request->price;
        $product->description = scriptStripper($request->description); 
        $product->save();

        if ($request->image != "") {

            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));

            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // This method will delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // delete image
        File::delete(public_path('uploads/products/' . $product->image));

        // delete product from database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
