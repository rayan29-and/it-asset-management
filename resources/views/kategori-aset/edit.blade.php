@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

    <!-- Header -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Kategori Aset</h3>
        <p class="text-muted mb-0">
            Perbarui informasi kategori perangkat teknologi informasi.
        </p>
    </div>

    <!-- Form Card -->
    <div class="page-card">

        <div class="p-4 border-bottom">
            <h5 class="fw-bold mb-1">
                Form Edit Kategori
            </h5>

            <p class="text-muted small mb-0">
                Ubah informasi kategori yang diperlukan.
            </p>
        </div>

        <div class="p-4">

            <form action="{{ url('/kategori-aset/' . $kategori->id) }}" method="POST">

                @csrf
                @method('PUT')

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
                        value="{{ $kategori->nama_kategori }}"
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
                        placeholder="Masukkan keterangan kategori"
                    >{{ $kategori->keterangan }}</textarea>
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
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection