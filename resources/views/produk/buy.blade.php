@extends('app')

@section('title', 'Beli Produk')

@section('content')
<div class="container mt-5" style="max-width: 900px;">
  <h2 class="text-center mb-5 fw-bold text-dark">
    <i class="bi bi-cart-check-fill me-2"></i> Beli Produk
  </h2>

  <div class="card border-0 rounded-4 shadow-lg overflow-hidden d-flex flex-row flex-wrap">
    <!-- Bagian Gambar & Info Produk -->
    <div class="flex-grow-1" style="min-width: 300px;">
      <!-- <img src="{{ $produk->image ?? 'https://via.placeholder.com/600x400' }}" class="img-fluid w-100" alt="{{ $produk->nama }}" style="object-fit: cover; height: 400px;"> -->
      <div class="p-4">
        <h3 class="fw-bold mb-3">{{ $produk->nama }}</h3>
        <div class="d-flex gap-2 mb-3">
          <span class="badge rounded-pill" style="background-color: #f59e0b; color: #fff;">
            Rp{{ number_format($produk->harga,0,',','.') }}
          </span>
          <span class="badge rounded-pill {{ $produk->stok>0 ? 'bg-success text-white' : 'bg-secondary text-white' }}">
            Stok: {{ $produk->stok }}
          </span>
        </div>
        <p class="text-muted">{{ $produk->deskripsi }}</p>
      </div>
    </div>

    <!-- Side Panel Tombol -->
    <div class="d-flex flex-column justify-content-center p-4" style="min-width: 200px; background-color: #f8f9fa;">
      {{-- Beli Sekarang --}}
      <form method="POST" action="{{ route('produk.purchase', $produk->id) }}" class="mb-3">
        @csrf
        <label class="form-label fw-semibold">Jumlah :</label>
        <input type="number" name="quantity" class="form-control mb-3" min="1" max="{{ $produk->stok }}" value="1" required>
        <button type="submit" class="btn w-100 text-white mb-2" style="background: linear-gradient(90deg, #D6A99D); border-radius: 10px; padding: 12px; font-weight: 600; transition: all 0.3s;"
          onmouseover="this.style.transform='scale(1.05)';" 
          onmouseout="this.style.transform='scale(1)';">
          <i class="bi bi-bag-check me-2"></i> Beli Sekarang
        </button>
      </form>

      {{-- Tambah ke Keranjang --}}
      <form method="POST" action="{{ route('cart.add', $produk->id) }}">
        @csrf
        <button type="submit" class="btn w-100 text-white" style="background-color: #a3744bff; border-radius: 10px; padding: 12px; font-weight: 600; transition: all 0.3s;"
          onmouseover="this.style.transform='scale(1.05)';" 
          onmouseout="this.style.transform='scale(1)';">
          <i class="bi bi-cart-plus me-2"></i> Keranjang
        </button>
      </form>
    </div>
  </div>

  <div class="text-center mt-4">
    <a href="{{ route('produk.index') }}" class="btn btn-dark rounded-3 px-4 py-2">
      ← Kembali
    </a>
  </div>
</div>
@endsection
