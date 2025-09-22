@extends('app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 600px; background: #fff7f0;">
        <div class="card-header text-white py-3 rounded-top-4" style="background: linear-gradient(90deg,#D6A99D); font-weight: 600;">
            <i class="bi bi-plus-circle-fill me-2"></i> Tambah Produk
        </div>

        <div class="card-body p-4">
            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm rounded-3">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> Terjadi kesalahan!
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">
                        <i class="bi bi-tag-fill me-1"></i> Nama Produk
                    </label>
                    <input type="text" name="nama" class="form-control form-control-lg rounded-4" 
                           id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama produk" required>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">
                        <i class="bi bi-file-earmark-text-fill me-1"></i> Deskripsi
                    </label>
                    <textarea name="deskripsi" class="form-control form-control-lg rounded-4" 
                              id="deskripsi" rows="3" placeholder="Tuliskan deskripsi produk">{{ old('deskripsi') }}</textarea>
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="harga" class="form-label fw-semibold">
                        <i class="bi bi-cash-coin me-1"></i> Harga (Rp)
                    </label>
                    <input type="number" name="harga" class="form-control form-control-lg rounded-4" 
                           id="harga" value="{{ old('harga') }}" placeholder="Masukkan harga produk" required>
                </div>

                {{-- Stok --}}
                <div class="mb-3">
                    <label for="stok" class="form-label fw-semibold">
                        <i class="bi bi-box-seam me-1"></i> Stok
                    </label>
                    <input type="number" name="stok" class="form-control form-control-lg rounded-4" 
                           id="stok" value="{{ old('stok') }}" placeholder="Masukkan jumlah stok" required>
                </div>

                {{-- Gambar --}}
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">
                        <i class="bi bi-image-fill me-1"></i> Gambar Produk
                    </label>
                    <input type="file" name="gambar" class="form-control form-control-lg rounded-4" 
                           id="gambar" accept="image/*" onchange="previewImage(event)">
                    <div class="mt-3 text-center">
                        <img id="img-preview" src="#" alt="Preview Gambar" class="img-fluid rounded-4 shadow-sm" style="display:none; max-height: 250px;">
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-danger btn-lg me-2" style="border-radius: 10px;">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-gradient btn-lg" style="border-radius: 10px; background: linear-gradient(90deg, #D6A99D); color: #fff; font-weight: 600;">
                        <i class="bi bi-save-fill me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Preview Gambar --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('img-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>

{{-- Styling --}}
<style>
    input:focus, textarea:focus {
        border-color: #D6A99D;
        box-shadow: 0 0 0 0.2rem rgba(255,112,67,.25);
    }
    .btn-lg {
        transition: transform 0.2s ease;
    }
    .btn-lg:hover {
        transform: scale(1.05);
    }
    .alert ul li {
        font-size: 0.95rem;
    }
    /* Gradient button hover */
    .btn-gradient:hover {
        background: linear-gradient(90deg, #D6A99D);
        color: #fff;
    }
</style>
@endsection
