<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(): View
    {
        $products = Produk::all();
        return view('welcome', compact('products'));
    }
    public function produk(): View
    {
        $products = Produk::latest()->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create(): View
    {
        return view('products.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $input['nama_produk'] = htmlspecialchars($input['nama_produk']);
        $input['deskripsi_produk'] = htmlspecialchars($input['deskripsi_produk']);
        

        if ($image = $request->file('gambar_produk')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar_produk'] = $profileImage;
        }

        Produk::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dibuat.');
    }


    public function show(Produk $product): View
    {
        return view('products.show', compact('product'));
    }


    public function edit(Produk $product): View
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Produk $product): RedirectResponse
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $input['nama_produk'] = htmlspecialchars($input['nama_produk']);
        $input['deskripsi_produk'] = htmlspecialchars($input['deskripsi_produk']);

        if ($image = $request->file('gambar_produk')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar_produk'] = "$profileImage";
        } else {
            unset($input['gambar_produk']);
        }

        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }


    public function destroy(Produk $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}