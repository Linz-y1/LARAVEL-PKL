@extends('app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Checkout</h5>
        </div>
        <div class="card-body">
            <p>Terima kasih sudah membeli produk kami! Silakan lengkapi proses pembayaran.</p>

            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="bi bi-house"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
