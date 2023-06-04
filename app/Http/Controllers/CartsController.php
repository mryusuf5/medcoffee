<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartsController extends Controller
{
    public function index()
    {
        $cartItems = [];
        $totalProductsCost = 0;
        if(Session::has('cart'))
        {
            $cartItems = Session::get('cart');
            foreach($cartItems as $index => &$cart)
            {
                $cart['product'] = Products::where('id', $cart['product_id'])->first();
                $cart['index'] = $index;
                $totalProductsCost += $cart['amount'] * $cart['product']->price;
            }
        }

        return view('user.cart', compact(
            'cartItems',
            'totalProductsCost'
        ));
    }

    public function store(Request $request)
    {
        Session::get('cart') !== null ? $cart = Session::get('cart') : $cart = [];

        $cart[] = [
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'options' => $request->options
        ];

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart');
    }

    public function delete($id)
    {
        $cart = Session::get('cart');
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function empty_cart()
    {
        Session::pull('cart');
    }
}
