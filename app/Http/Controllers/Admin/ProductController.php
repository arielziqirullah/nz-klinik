<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.product.create', [
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $image = null;
        if($request->hasFile('image')){
            $image =  $request->file('image')->store('products');
        }

        $categories = Category::find($request->categories);

        $data = array_merge(
            $request->except('_token', 'categories', 'image'), 
            compact('image')
                );        

        $product = Product::create($data);

        // $product = Product::create([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'description' => $request->description,
        //     'image' => $image,
        //     'price' => $request->price,
        //     'qty' => $request->qty
        // ]);

        $product->categories()->attach($categories);

        session()->flash('message', 'Produk berhasil ditambahkan.');

        return redirect()->route('product_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('back.product.edit', [
            'categories' => Category::orderBy('name', 'asc')->get(),
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        $image = $product->image ?? null;

        if($request->hasFile('image')){
            if($product->image){
                Storage::delete($product->image);
            }
            $image = $request->file('image')->store('products');
        }

        $categories = Category::find($request->categories);

        $product->update([
            'name' => $request->name,
            // 'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'qty' => $request->qty
        ]);

        $product->categories()->sync($categories);

        session()->flash('message', 'Produk berhasil diubah.');

        return redirect()->route('product_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image){
            // Storage::delete('products/' . $product->image);
            Storage::disk('local')->delete( $product->image);
        }
        $product->delete();

        return response()->json(['success' => true]);
    }
}
