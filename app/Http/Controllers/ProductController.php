<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    // ... (metode index, publicIndex, create tidak perlu diubah)

    public function index(): View
    {
        $products = Produk::latest()->paginate(5);
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function publicIndex(): View
    {
        $products = Produk::latest()->paginate(16);
        return view('user.products.index', compact('products'));
    }

     public function publicShow(Produk $product): View
    {
        // Laravel secara otomatis akan menemukan produk berdasarkan ID di URL (Route Model Binding)
       $relatedProducts = Produk::where('id', '!=', $product->id)
                                 ->inRandomOrder()
                                 ->take(4)
                                 ->get();

        // Kirim data produk utama dan produk terkait ke view
        return view('user.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // ... (logika validasi dan penyimpanan Anda sudah benar)
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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

        // PERBAIKAN DI SINI
        return redirect()->route('admin.products.index')
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
        // ... (logika validasi dan update Anda sudah benar)
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

        // PERBAIKAN DI SINI
        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $product): RedirectResponse
    {
        $product->delete();

        // PERBAIKAN DI SINI
        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}