<?php

namespace App\Http\Controllers\Client;

use Facade\FlareClient\View;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $sliders = Slider::all()->where('status', 1);
        $products = Product::all()->where('status', 1);
        return view('client.home', [
            'sliders' => $sliders,
            'products' => $products,
        ]);
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::all()->where('status', 1);
        return view('client.shop', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function productDetail($id)
    {
        $productDetail = Product::findOrFail($id);
        $relatedProducts = Product::where('id', '!=', $productDetail->id)->where('category_id', $productDetail->category->id)->limit(4)->get();
        return view('client.product_detail', [
            'productDetail' => $productDetail,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function login()
    {
        return view('client.auth.login');
    }

    public function register()
    {
        return view('client.auth.register');
    }
}