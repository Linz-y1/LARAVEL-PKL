@extends('app')

@section('title', 'Keranjang Saya')

@section('content')
<div class="container mt-4">
  <h3 class="mb-4">🛒 Keranjang Saya</h3>

  {{-- Alerts --}}
  @if(session('success'))
    <div class="alert alert-success shadow-sm rounded-3">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger shadow-sm rounded-3">{{ session('error') }}</div>
  @endif

  @forelse($cart as $id => $item)
    <div class="card mb-3 shadow-sm rounded-4 border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h5 class="fw-bold mb-1" style="color:#5C4033;">{{ $item['nama'] }}</h5>
          <p class="mb-0 text-muted">Qty: <span class="fw-semibold">{{ $item['qty'] }}</span></p>
          <p class="mb-0 text-success fw-bold">Rp{{ number_format($item['harga'] * $item['qty'],0,',','.') }}</p>
        </div>

        {{-- Hapus --}}
        <form action="{{ route('cart.remove', $id) }}" method="POST" class="ms-3">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-trash-fill me-1"></i> Hapus
          </button>
        </form>
      </div>
    </div>
  @empty
    <div class="alert alert-info shadow-sm text-center rounded-3">
      Keranjang kosong.
    </div>
  @endforelse

  @if(!empty($cart))
    <div class="card shadow-sm rounded-4 border-0 mt-3">
      <div class="card-body d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Grand Total:</h5>
        <h5 class="text-success fw-bold mb-0">Rp{{ number_format($grandTotal,0,',','.') }}</h5>
      </div>
      <div class="card-footer bg-transparent border-0 text-end">
        <form action="{{ route('cart.checkout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-success btn-lg">
            <i class="bi bi-bag-check me-1"></i> Beli Sekarang
          </button>
        </form>
      </div>
    </div>
  @endif

  <div class="mt-4">
    <a href="{{ route('produk.index') }}" class="btn btn-secondary btn-lg">
      <i class="bi bi-arrow-left-circle me-1"></i> Lanjut Belanja
    </a>
  </div>
</div>

<style>
.card-body {
  background-color: #FDF5E6;
}
h5 {
  color: #5C4033;
}
.btn-lg {
  font-weight: 600;
  transition: transform 0.2s ease;
}
.btn-lg:hover {
  transform: scale(1.05);
}
.card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(176,113,84,0.3);
  transition: all 0.3s ease;
}
</style>
@endsection
