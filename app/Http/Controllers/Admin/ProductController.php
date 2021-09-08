<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(Constant::COUNT_PER_PAGE);
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'image | mimes:jpeg,png,jpg,svg | nullable | max:2048'
        ]);

        $image_url = $this->uploadImage($request);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            'category_id' => $request->category,
            'status' => 1,
            'image_url' => $image_url
        ]);

        session()->flash('success', 'Saved');

        return redirect()->route('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', [
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'image | mimes:jpeg,png,jpg,svg | nullable | max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->name =  $request->name;
        $product->price =  $request->price;
        $product->discount =  $request->discount;
        $product->description =  $request->description;
        $product->category_id =  $request->category;

        if ($request->hasFile('image')) {
            $oldImagePath = $product->image_url;
            $this->removeImage($oldImagePath);
            $image_url = $this->uploadImage($request);
            $product->image_url =  $image_url;
        }

        $product->save();

        session()->flash('success', 'Updated');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $imagePath = $product->image_url;
        if ($imagePath != null) {
            $this->removeImage($imagePath);
        }

        $product->delete();

        session()->flash('success', 'Deleted');

        return redirect()->back();
    }

    public function uploadImage($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'images/products';
            return $file->storeAs($destinationPath, $fileName, 'public');
        }
        return null;
    }

    public function removeImage($path)
    {
        if (file_exists(storage_path('app/public/' . $path))) {
            unlink(storage_path('app/public/' . $path));
        }
    }

    public function activateProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();

        session()->flash('success', 'Updated');

        return redirect()->back();
    }

    public function inactivateProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->save();

        session()->flash('success', 'Updated');

        return redirect()->back();
    }
}