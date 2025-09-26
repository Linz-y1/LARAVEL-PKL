    {{-- resources/views/produk/index.blade.php --}}
    @extends('app')

    @section('title', 'produk')

    @section('content')
        <div class="container mt-10 mb-5">
            <div class="d-flex justify-content-center align-items-center mb-4 ">
                <h2 class="fw-bold text-dark">
                    List Product
                </h2>

                @auth
                    @if (auth()->user()->role === 'admin')
                <a href="{{ route('produk.create') }}" 
                    class="btn position-fixed" 
                    style="top: 100px; right: 60px; 
                            background-color: #B07154; 
                            color: white; 
                            font-size: 1.2rem; 
                            padding: 0.6rem 1rem; 
                            border-radius: 8px; 
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <i class="bi bi-bookmark-plus-fill me-1"></i> 
                    </a>
                    @endif
                @endauth
            </div>

            {{-- Pesan sukses / error --}}
            @if (session('success'))
                <div class="alert alert-success text-center shadow-sm">
                    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                </div>
            @endif
c
            @if (session('error'))
                <div class="alert alert-danger text-center shadow-sm">
                    <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
                </div>
            @endif

            {{-- Cek apakah ada produk --}}
            @if ($produk->isEmpty())
                <div class="alert alert-info text-center shadow-sm">
                    <i class="bi bi-info-circle me-1"></i> Tidak ada produk tersedia.
                </div>
            @else
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($produk as $p)
                        <div class="col">
                            <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm produk-card">
                                {{-- Gambar produk --}}
                                @if ($p->gambar)
                                <div style="background-color: #fff; height: 300px; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ asset('storage/' . $p->gambar) }}"  
                                        alt="{{ $p->nama }}"
                                        style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                </div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">{{ $p->nama }}</h5>
                                    <p class="card-text text-muted small">
                                        {{ $p->deskripsi ?? 'Tidak ada deskripsi.' }}
                                    </p>

                                <div class="d-flex justify-content-between mb-3">
                                    <!-- Harga -->
                                    <span class="badge bg-success fs-6">
                                        Rp {{ number_format($p->harga, 0, ',', '.') }}

                                    </span>

                                    <!-- Stok -->
                                    <span class="badge {{ $p->stok > 0 ? 'bg-secondary' : 'bg-danger' }}">
                                        <i class="bi bi-box-seam"></i> {{ $p->stok }}
                                    </span>
                            </div>
                                    <div class="mt-auto">
                                        @auth
                                            @if (auth()->user()->role === 'admin')
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <a href="{{ route('produk.edit', $p->id) }}"
                                                            class="btn btn-warning w-100">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <form method="POST" action="{{ route('produk.destroy', $p->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger w-100"
                                                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                            <a href="{{ route('produk.buy', $p->id) }}"
                                                class="btn btn-beli w-100 {{ $p->stok == 0 ? 'disabled' : '' }}"
                                                style="background-color: rgba(176,113,84,1); color: white; border: none;">
                                               <ion-icon name="cart-outline"></ion-icon> Beli
                                            </a>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        {{-- Style tambahan --}}
        <style>
            .produk-card {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
                
            }
            .produk-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(254, 231, 21, 0.5);
            }

        </style>
    @endsection
