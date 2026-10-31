@extends('layouts.app')

@section('title', 'Tambah Aset')

@section('content')

<style>
    .asset-form-header {
        margin-bottom: 24px;
    }

    .asset-form-title {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.4px;
        margin-bottom: 5px;
    }

    .asset-form-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 0;
    }

    .asset-form-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .035);
        overflow: hidden;
    }

    .asset-form-card-header {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f4;
    }

    .asset-form-card-title {
        font-size: 16px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .asset-form-card-subtitle {
        color: #9ca3af;
        font-size: 12px;
        margin-bottom: 0;
    }

    .asset-form-body {
        padding: 24px;
    }

    .asset-form-group {
        height: 100%;
    }

    .asset-form-label {
        display: block;
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .asset-required {
        color: #dc3545;
    }

    .asset-form-control,
    .asset-form-select {
        width: 100%;
        min-height: 44px;
        border: 1px solid #dfe4ea;
        border-radius: 10px;
        padding: 10px 14px;
        color: #374151;
        background: #fff;
        font-size: 13px;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .asset-form-control::placeholder {
        color: #adb5bd;
    }

    .asset-form-control:focus,
    .asset-form-select:focus {
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .12);
    }

    textarea.asset-form-control {
        min-height: 110px;
        resize: vertical;
    }

    .asset-form-help {
        color: #9ca3af;
        font-size: 11px;
        line-height: 1.5;
        margin-top: 6px;
    }

    .asset-file-wrapper {
        position: relative;
    }

    .asset-file-input {
        padding: 9px 12px;
        cursor: pointer;
    }

    .asset-file-input::file-selector-button {
        border: 0;
        background: #eaf2ff;
        color: #0d6efd;
        padding: 7px 11px;
        margin-right: 10px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .asset-status-info {
        margin-top: 8px;
        padding: 10px 12px;
        border-radius: 9px;
        background: #f8fafc;
        border: 1px solid #edf0f4;
        color: #64748b;
        font-size: 11px;
        line-height: 1.6;
    }

    .asset-status-info i {
        color: #0d6efd;
    }

    .asset-form-divider {
        border: 0;
        border-top: 1px solid #edf0f4;
        margin: 28px 0 22px;
        opacity: 1;
    }

    .asset-form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .asset-back-btn {
        border-radius: 10px;
        padding: 10px 16px;
        background: #fff;
        border: 1px solid #dfe4ea;
        color: #475569;
        font-size: 13px;
        font-weight: 500;
        transition: all .2s ease;
    }

    .asset-back-btn:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #1f2937;
        transform: translateY(-1px);
    }

    .asset-save-btn {
        border-radius: 10px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(13, 110, 253, .15);
        transition: all .2s ease;
    }

    .asset-save-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(13, 110, 253, .20);
    }

    .asset-validation {
        border-radius: 11px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .asset-validation ul {
        margin-bottom: 0;
    }

    @media (max-width: 767.98px) {
        .asset-form-header {
            margin-bottom: 18px;
        }

        .asset-form-title {
            font-size: 23px;
        }

        .asset-form-subtitle {
            font-size: 13px;
        }

        .asset-form-card-header {
            padding: 18px 16px;
        }

        .asset-form-body {
            padding: 16px;
        }

        .asset-form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .asset-back-btn,
        .asset-save-btn {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 575.98px) {
        .asset-form-title {
            font-size: 21px;
        }

        .asset-form-control,
        .asset-form-select {
            font-size: 13px;
        }
    }
</style>


{{-- HEADER --}}
<div class="asset-form-header">

    <div>
        <h1 class="asset-form-title">
            Tambah Aset
        </h1>

        <p class="asset-form-subtitle">
            Tambahkan perangkat teknologi informasi baru.
        </p>
    </div>

</div>


{{-- VALIDATION ERROR --}}
@if($errors->any())

    <div class="alert alert-danger asset-validation">

        <div class="fw-semibold mb-2">
            <i class="bi bi-exclamation-circle me-1"></i>
            Terdapat kesalahan pada data yang diisi.
        </div>

        <ul class="ps-4">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

@endif


{{-- FORM CARD --}}
<div class="asset-form-card">

    <div class="asset-form-card-header">

        <div class="asset-form-card-title">
            Form Data Aset
        </div>

        <p class="asset-form-card-subtitle">
            Isi informasi perangkat dengan lengkap.
        </p>

    </div>


    <div class="asset-form-body">

        <form action="{{ url('/aset') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row g-4">

                {{-- KODE ASET --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="kode_aset" class="asset-form-label">
                            Kode Aset
                            <span class="asset-required">*</span>
                        </label>

                        <input
                            type="text"
                            id="kode_aset"
                            name="kode_aset"
                            class="asset-form-control"
                            placeholder="Contoh: AST-001"
                            value="{{ old('kode_aset') }}"
                            required
                        >

                        <div class="asset-form-help">
                            Gunakan kode unik untuk setiap aset.
                        </div>

                    </div>

                </div>


                {{-- NAMA ASET --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="nama_aset" class="asset-form-label">
                            Nama Aset
                            <span class="asset-required">*</span>
                        </label>

                        <input
                            type="text"
                            id="nama_aset"
                            name="nama_aset"
                            class="asset-form-control"
                            placeholder="Contoh: Laptop Lenovo ThinkPad"
                            value="{{ old('nama_aset') }}"
                            required
                        >

                    </div>

                </div>


                {{-- KATEGORI --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="kategori_id" class="asset-form-label">
                            Kategori Aset
                            <span class="asset-required">*</span>
                        </label>

                        <select
                            id="kategori_id"
                            name="kategori_id"
                            class="asset-form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach($kategori as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('kategori_id') == $item->id ? 'selected' : '' }}
                                >
                                    {{ $item->nama_kategori }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                {{-- MERK --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="merk" class="asset-form-label">
                            Merk
                        </label>

                        <input
                            type="text"
                            id="merk"
                            name="merk"
                            class="asset-form-control"
                            placeholder="Contoh: Lenovo"
                            value="{{ old('merk') }}"
                        >

                    </div>

                </div>


                {{-- MODEL --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="model" class="asset-form-label">
                            Model
                        </label>

                        <input
                            type="text"
                            id="model"
                            name="model"
                            class="asset-form-control"
                            placeholder="Contoh: ThinkPad E14"
                            value="{{ old('model') }}"
                        >

                    </div>

                </div>


                {{-- NOMOR SERI --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="nomor_seri" class="asset-form-label">
                            Nomor Seri
                        </label>

                        <input
                            type="text"
                            id="nomor_seri"
                            name="nomor_seri"
                            class="asset-form-control"
                            placeholder="Masukkan nomor seri perangkat"
                            value="{{ old('nomor_seri') }}"
                        >

                    </div>

                </div>


                {{-- FOTO ASET --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="foto" class="asset-form-label">
                            Foto Aset
                        </label>

                        <div class="asset-file-wrapper">

                            <input
                                type="file"
                                id="foto"
                                name="foto"
                                class="form-control asset-form-control asset-file-input"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                        </div>

                        <div class="asset-form-help">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </div>

                    </div>

                </div>


                {{-- PENGGUNA --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="pengguna" class="asset-form-label">
                            Pengguna
                        </label>

                        <input
                            type="text"
                            id="pengguna"
                            name="pengguna"
                            class="asset-form-control"
                            placeholder="Contoh: Andi"
                            value="{{ old('pengguna') }}"
                        >

                        <div class="asset-form-help">
                            Isi jika aset sedang digunakan oleh karyawan.
                        </div>

                    </div>

                </div>


                {{-- LOKASI --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="lokasi" class="asset-form-label">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            id="lokasi"
                            name="lokasi"
                            class="asset-form-control"
                            placeholder="Contoh: Ruang Finance"
                            value="{{ old('lokasi') }}"
                        >

                    </div>

                </div>


                {{-- TANGGAL PEROLEHAN --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="tanggal_perolehan" class="asset-form-label">
                            Tanggal Perolehan
                        </label>

                        <input
                            type="date"
                            id="tanggal_perolehan"
                            name="tanggal_perolehan"
                            class="asset-form-control"
                            value="{{ old('tanggal_perolehan') }}"
                        >

                    </div>

                </div>


                {{-- KONDISI --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="kondisi" class="asset-form-label">
                            Kondisi
                            <span class="asset-required">*</span>
                        </label>

                        <select
                            id="kondisi"
                            name="kondisi"
                            class="asset-form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Kondisi --
                            </option>

                            <option
                                value="Baik"
                                {{ old('kondisi') === 'Baik' ? 'selected' : '' }}
                            >
                                Baik
                            </option>

                            <option
                                value="Rusak Ringan"
                                {{ old('kondisi') === 'Rusak Ringan' ? 'selected' : '' }}
                            >
                                Rusak Ringan
                            </option>

                            <option
                                value="Rusak Berat"
                                {{ old('kondisi') === 'Rusak Berat' ? 'selected' : '' }}
                            >
                                Rusak Berat
                            </option>

                        </select>

                    </div>

                </div>


                {{-- STATUS --}}
                <div class="col-12">

                    <div class="asset-form-group">

                        <label for="status" class="asset-form-label">
                            Status Aset
                            <span class="asset-required">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="asset-form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option
                                value="Aktif"
                                {{ old('status') === 'Aktif' ? 'selected' : '' }}
                            >
                                Aktif — Sedang digunakan
                            </option>

                            <option
                                value="Maintenance"
                                {{ old('status') === 'Maintenance' ? 'selected' : '' }}
                            >
                                Maintenance — Bermasalah / berada di ruang IT
                            </option>

                            <option
                                value="Tidak Aktif"
                                {{ old('status') === 'Tidak Aktif' ? 'selected' : '' }}
                            >
                                Tidak Aktif — Baik / tersedia di ruang IT
                            </option>

                        </select>

                        <div class="asset-status-info">
                            <i class="bi bi-info-circle me-1"></i>
                            Status menunjukkan penggunaan dan keberadaan aset saat ini.
                            Aset <strong>Maintenance</strong> dan <strong>Tidak Aktif</strong>
                            berada di ruang IT.
                        </div>

                    </div>

                </div>


                {{-- KETERANGAN --}}
                <div class="col-12">

                    <div class="asset-form-group">

                        <label for="keterangan" class="asset-form-label">
                            Keterangan
                        </label>

                        <textarea
                            id="keterangan"
                            name="keterangan"
                            class="asset-form-control"
                            rows="4"
                            placeholder="Tambahkan keterangan aset jika diperlukan"
                        >{{ old('keterangan') }}</textarea>

                    </div>

                </div>

            </div>


            <hr class="asset-form-divider">


            {{-- ACTION --}}
            <div class="asset-form-actions">

                <a href="{{ url('/aset') }}"
                   class="btn asset-back-btn">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali

                </a>


                <button type="submit"
                        class="btn btn-primary asset-save-btn">

                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Aset

                </button>

            </div>

        </form>

    </div>

</div>

@endsection