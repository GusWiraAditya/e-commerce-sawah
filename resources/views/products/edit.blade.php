@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Edit Produk</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label"><strong>Nama Produk:</strong></label>
            <input 
                type="text" 
                name="nama_produk" 
                value="{{ old('nama_produk', $product->nama_produk) }}"
                class="form-control @error('nama_produk') is-invalid @enderror" 
                placeholder="Masukkan nama produk">
            @error('nama_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Deskripsi:</strong></label>
            <textarea 
                name="deskripsi_produk" 
                class="form-control @error('deskripsi_produk') is-invalid @enderror" 
                rows="4" 
                placeholder="Deskripsi produk">{{ old('deskripsi_produk', $product->deskripsi_produk) }}</textarea>
            @error('deskripsi_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Harga:</strong></label>
            <input 
                type="number" 
                name="harga_produk" 
                value="{{ old('harga_produk', $product->harga_produk) }}"
                class="form-control @error('harga_produk') is-invalid @enderror">
            @error('harga_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Stok:</strong></label>
            <input 
                type="number" 
                name="stok_produk" 
                value="{{ old('stok_produk', $product->stok_produk) }}"
                class="form-control @error('stok_produk') is-invalid @enderror">
            @error('stok_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Gambar:</strong></label>
            <input 
                type="file" 
                name="gambar_produk" 
                class="form-control @error('gambar_produk') is-invalid @enderror">
            @if ($product->gambar_produk)
                <img src="/images/{{ $product->gambar_produk }}" width="200" class="mt-2">
            @endif
            @error('gambar_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>

  </div>
</div>
@endsection
