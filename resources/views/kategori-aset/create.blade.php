@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

    <!-- Header -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Tambah Kategori Aset</h3>
        <p class="text-muted mb-0">
            Tambahkan kategori baru untuk perangkat teknologi informasi.
        </p>
    </div>

    <!-- Form Card -->
    <div class="page-card">

        <div class="p-4 border-bottom">
            <h5 class="fw-bold mb-1">
                Form Kategori Aset
            </h5>

            <p class="text-muted small mb-0">
                Isi informasi kategori dengan lengkap.
            </p>
        </div>

        <div class="p-4">

            <form action="{{ url('/kategori-aset') }}" method="POST">

                @csrf

                <!-- Nama Kategori -->
                <div class="mb-4">
                    <label for="nama_kategori" class="form-label fw-semibold">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="nama_kategori"
                        name="nama_kategori"
                        placeholder="Contoh: Laptop"
                        required
                    >

                    <div class="form-text">
                        Masukkan nama kategori perangkat.
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="mb-4">
                    <label for="keterangan" class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        class="form-control"
                        id="keterangan"
                        name="keterangan"
                        rows="4"
                        placeholder="Contoh: Perangkat komputer portable"
                    ></textarea>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ url('/kategori-aset') }}"
                       class="btn btn-light border">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                    <button type="submit" class="btn btn-primary">

                        <i class="bi bi-check-lg me-1"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection