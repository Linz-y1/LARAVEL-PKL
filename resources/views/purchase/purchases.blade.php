@extends('app')

@section('title', 'flower bucket - Daftar Pembelian')

@section('content')
<div class="container mt-5">
   <h2 class="fw-bold mb-4" style="color: black;">
    <i class="bi bi-basket3-fill"></i> Daftar Pembelian
   </h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
          <div class="table-responsive">
            <div class="card shadow-lg rounded-4" style="border: none; background-color: #D6A99D;">
                <div class="card-body p-4">
                    <table class="table table-hover align-middle mb-0" style="border-collapse: separate; border-spacing: 0 8px;">
                        <thead style="background: linear-gradient(90deg, #8c5942ff, #dc8c76ff); color: white; border-radius: 12px;">
                            <tr>
                                <th class="rounded-start">No</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th class="rounded-end">Tanggal Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                                @php
                                    $harga = $purchase->produk->harga ?? 0;
                                    $total = $harga * $purchase->quantity;
                                @endphp
                                <tr style="background-color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.05); border-radius: 12px; margin-bottom: 8px;">
                                    <td class="fw-semibold">{{ $loop->iteration }}</td>
                                    <td>{{ $purchase->produk->nama ?? 'Produk tidak ditemukan' }}</td>
                                    <td>Rp{{ number_format($harga, 0, ',', '.') }}</td>
                                    <td>{{ $purchase->quantity }}</td>
                                    <td class="fw-bold text-success">
                                        Rp{{ number_format($total, 0, ',', '.') }}
                                    </td>
                                    <td>{{ $purchase->created_at->format('d M Y - H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        <i class="bi bi-info-circle me-1"></i> Belum ada pembelian
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                        @if ($purchases->isNotEmpty())
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Grand Total:</td>
                                <td class="fw-bold text-success">
                                    Rp{{ number_format($purchases->sum(fn($p) => ($p->produk->harga ?? 0) * $p->quantity), 0, ',', '.') }}
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

{{-- Style tambahan --}}
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
        transition: background-color 0.2s ease;
    }
    .table-responsive {
        overflow-x: auto;
    }
</style>
@endsection
