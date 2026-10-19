<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // 🔹 Warenkorb anzeigen
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // 🔹 Produkt in den Warenkorb legen
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        // Wenn Produkt schon im Warenkorb, Menge erhöhen
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produkt zum Warenkorb hinzugefügt!');
    }

    // 🔹 Produkt entfernen
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Produkt entfernt.');
    }

    // 🔹 Warenkorb leeren
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Warenkorb geleert.');
    }
}
