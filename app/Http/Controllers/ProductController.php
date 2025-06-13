<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploader;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * @param UploadedFile[] $images
     */
    private  function uploadProductImages( array $images, Product $product)
    {
        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {

                $path = FileUploader::upload($image);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }
    }

    public function allProduct()
    {
        $products = Product::with(['images','category'])->get();


        return view('pages.products.all-products', compact('products'));
    }

    public function createView()
    {
        return view('pages.products.create');
    }

    public function create(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string', 
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'category' => 'required|exists:categories,id',
            'three_d_image' => 'nullable', 

            'images' => 'required|array', // images must be an array
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // each file must be an image
        ]);

        try {

            $threeDImage = $request->file('three_d_image') ? FileUploader::upload($request->file('three_d_image'),'three_d_files') : null;

            $product = Product::create([
                'id' => Str::uuid(),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'three_d_image' => $threeDImage,
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'status' => $request->input('status'),
                'category_id' => $request->input('category'),
            ]);

            $this->uploadProductImages($request->file('images'), $product);


            return redirect()->route('products.all')->with('success', 'Product created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to create product. Please try again.');
        }
    }
}
