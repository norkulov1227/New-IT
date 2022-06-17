<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category')->get();
        return view('admin.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $params = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        // dd($params);

        $category = null;
        if($request->category_name){
            $category = Category::create([
                'name' => $request->category_name,
                'slug' => Str::slug($request->name)
            ]);
        }


        $image_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('/public/images', $image_name);

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'category_id' => $category ? $category->id : $request->category_id,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image_name,
        ]);

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('admin.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = Category::get();
        $product = Product::where('slug', $slug)->first();

        // dd($product->image);
        return view('admin.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // dd($request->file('image'));

        $product = Product::where('slug', $slug)->first();

        $params = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'status' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        // dd($request->file('image'));

        $image = null;
        if($product->image){

            if($request->file('image')){
                $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('/public/images/', $image);

                unlink('storage/images/' . $product->image);
            }
        }else{
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/public/images', $image);
        }


        $category = null;
        if($request->category_name){
            $category = Category::create([
                'name' => $request->category_name,
                'slug' => Str::slug($request->category_name)
            ]);
        }

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'category_id' => $category ? $category->id : $request->category_id,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image??$product->image
        ];

        $product->update($data);

        return redirect()->route('admin.product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();

        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
