<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Product; // <-- Jangan lupa import model Product

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage) dengan semua produk.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua produk dari database, urutkan dari yang terbaru
        $latestProducts = Product::latest()->take(8)->get();

        // Kirim data produk ke view 'welcome'
        return view('welcome', [
           'latestProducts' => $latestProducts
        ]);
    }
    
    public function home()
    {
        $products = Produk::all();
        return view('dashboard', compact('products'));
    }
}
