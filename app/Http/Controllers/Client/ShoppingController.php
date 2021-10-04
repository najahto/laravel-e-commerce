<?php

namespace App\Http\Controllers\Client;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    public function cart()
    {
        if (!Session::has('cart')) {
            return view('client.cart');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $sectors = Sector::all();
        return view('client.cart', [
            'products' => $cart->items,
            'sectors' => $sectors
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function updateQuantity($id, Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQuantity($id, $request->quantity);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function estimateShipping(Request $request)
    {
        $this->validate($request, [
            'areaPrice' => 'required'
        ]);

        $estimatedShippingPrice = $request->areaPrice;
        if (Session::has('estimatedShippingPrice')) {
            Session::forget('estimatedShippingPrice');
            if ($estimatedShippingPrice > 0) {
                Session::put('estimatedShippingPrice', $estimatedShippingPrice);
            }
        }

        return redirect()->back();
    }
    public function checkout()
    {
        if (!Session::has('client'))
            return view('client.auth.login');
    }
}