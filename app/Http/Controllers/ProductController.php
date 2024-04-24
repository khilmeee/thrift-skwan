<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(10);

        return view("admin.products.index", compact("products"));
    }

    // untuk public
    public function public_index()
    {
        $products = Product::all();

        return view("products.index", compact("products"));
    }

    public function create(): View
    {
        return view("admin.products.create");
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $imgD = file_get_contents($image);
        $imgData = "data:image/png;base64,".base64_encode($imgD);

        //create product
        Product::create([
            'image'         => $imgData,
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('admin.product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id): View
    {
        $product = Product::findOrFail($id);

        return view("admin.products.show", compact("product"));
    }

    public function public_show($id): View
    {
        $product = Product::findOrFail($id);

        return view("products.show", compact("product"));
    }

    public function edit(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('admin.products.edit', compact('product'));
        // return view('admin.products.edit2', compact('product'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $imgD = file_get_contents($image);
            $imgData = "data:image/png;base64,".base64_encode($imgD);

            //update product with new image
            $product->update([
                'image'         => $imgData,
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);

        } else {

            //update product without image
            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }

        //redirect to index
        return redirect()->route('admin.product.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('admin.product.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
