@extends('products.layout')
  
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Add New Product</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="inputNama" class="form-label"><strong>Nama Produk:</strong></label>
            <input 
                type="text" 
                name="nama_produk" 
                class="form-control @error('nama_produk') is-invalid @enderror" 
                id="inputNama" 
                placeholder="Nama Produk">
            @error('nama_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDeskripsi" class="form-label"><strong>Deskripsi Produk:</strong></label>
            <textarea 
                class="form-control @error('deskripsi_produk') is-invalid @enderror" 
                style="height:150px" 
                name="deskripsi_produk" 
                id="inputDeskripsi" 
                placeholder="Deskripsi Produk"></textarea>
            @error('deskripsi_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputHarga" class="form-label"><strong>Harga Produk:</strong></label>
            <input 
                type="number" 
                name="harga_produk" 
                class="form-control @error('harga_produk') is-invalid @enderror" 
                id="inputHarga" 
                placeholder="Harga Produk">
            @error('harga_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputStok" class="form-label"><strong>Stok Produk:</strong></label>
            <input 
                type="number" 
                name="stok_produk" 
                class="form-control @error('stok_produk') is-invalid @enderror" 
                id="inputStok" 
                placeholder="Stok Produk">
            @error('stok_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputGambar" class="form-label"><strong>Gambar Produk:</strong></label>
            <input 
                type="file" 
                name="gambar_produk" 
                class="form-control @error('gambar_produk') is-invalid @enderror" 
                id="inputGambar">
            @error('gambar_produk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
@endsection
