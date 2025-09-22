<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $grandTotal = collect($cart)->sum(fn($item) => $item['harga'] * $item['qty']);

        return view('cart.keranjang', compact('cart', 'grandTotal'));
    }

    public function add(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        // Optional: validasi stok minimum 1
        if ($produk->stok < 1) {
            return back()->with('error', 'Stok produk habis.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // tambah qty 1 (atau pakai input jumlah kalau disediakan)
            $cart[$id]['qty'] += 1;
        } else {
            $cart[$id] = [
                'nama'  => $produk->nama,
                'harga' => $produk->harga,
                'qty'   => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        foreach ($cart as $produkId => $item) {
            // simpan pembelian
            Purchase::create([
                'user_id'   => Auth::id(),
                'produk_id' => $produkId,
                'quantity'  => $item['qty'],
            ]);

            // kurangi stok
            if ($produk = Produk::find($produkId)) {
                $produk->decrement('stok', $item['qty']);
            }
        }

        session()->forget('cart');

        return redirect()->route('purchase.purchases')->with('success', 'Pembelian berhasil!');
    }
}
