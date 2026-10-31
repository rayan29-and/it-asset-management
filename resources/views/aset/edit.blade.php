@extends('layouts.app')

@section('title', 'Edit Aset')

@section('content')

<style>
    .asset-edit-header {
        margin-bottom: 24px;
    }

    .asset-edit-title {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.4px;
        margin-bottom: 5px;
    }

    .asset-edit-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 0;
    }

    .asset-edit-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .035);
        overflow: hidden;
    }

    .asset-edit-card-header {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f4;
    }

    .asset-edit-card-title {
        font-size: 16px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .asset-edit-card-subtitle {
        color: #9ca3af;
        font-size: 12px;
        margin-bottom: 0;
    }

    .asset-edit-body {
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

    .current-photo-wrapper {
        width: 100%;
        min-height: 220px;
        padding: 12px;
        border: 1px solid #e8ecf2;
        border-radius: 14px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }

    .current-photo {
        width: 100%;
        max-height: 250px;
        object-fit: contain;
        border-radius: 10px;
    }

    .no-photo-wrapper {
        width: 100%;
        min-height: 180px;
        border: 1px dashed #d5dbe4;
        border-radius: 14px;
        background: #f8fafc;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        margin-bottom: 12px;
    }

    .no-photo-wrapper i {
        font-size: 38px;
        margin-bottom: 8px;
    }

    .no-photo-wrapper p {
        margin: 0;
        font-size: 12px;
    }

    .asset-file-input {
        min-height: 44px;
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
        .asset-edit-header {
            margin-bottom: 18px;
        }

        .asset-edit-title {
            font-size: 23px;
        }

        .asset-edit-subtitle {
            font-size: 13px;
        }

        .asset-edit-card-header {
            padding: 18px 16px;
        }

        .asset-edit-body {
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

        .current-photo-wrapper {
            min-height: 190px;
        }
    }

    @media (max-width: 575.98px) {
        .asset-edit-title {
            font-size: 21px;
        }

        .asset-form-control,
        .asset-form-select {
            font-size: 13px;
        }
    }
</style>


{{-- HEADER --}}
<div class="asset-edit-header">

    <div>
        <h1 class="asset-edit-title">
            Edit Aset
        </h1>

        <p class="asset-edit-subtitle">
            Perbarui informasi perangkat teknologi informasi.
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
<div class="asset-edit-card">

    <div class="asset-edit-card-header">

        <div class="asset-edit-card-title">
            Form Edit Data Aset
        </div>

        <p class="asset-edit-card-subtitle">
            Perbarui informasi aset sesuai kondisi terbaru.
        </p>

    </div>


    <div class="asset-edit-body">

        <form
            action="{{ url('/aset/' . $aset->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

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
                            value="{{ old('kode_aset', $aset->kode_aset) }}"
                            required
                        >

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
                            value="{{ old('nama_aset', $aset->nama_aset) }}"
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
                                    {{ old('kategori_id', $aset->kategori_id) == $item->id ? 'selected' : '' }}
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
                            value="{{ old('merk', $aset->merk) }}"
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
                            value="{{ old('model', $aset->model) }}"
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
                            value="{{ old('nomor_seri', $aset->nomor_seri) }}"
                        >

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
                            value="{{ old('pengguna', $aset->pengguna) }}"
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
                            value="{{ old('lokasi', $aset->lokasi) }}"
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
                            value="{{ old('tanggal_perolehan', $aset->tanggal_perolehan) }}"
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

                            <option
                                value="Baik"
                                {{ old('kondisi', $aset->kondisi) === 'Baik' ? 'selected' : '' }}
                            >
                                Baik
                            </option>

                            <option
                                value="Rusak Ringan"
                                {{ old('kondisi', $aset->kondisi) === 'Rusak Ringan' ? 'selected' : '' }}
                            >
                                Rusak Ringan
                            </option>

                            <option
                                value="Rusak Berat"
                                {{ old('kondisi', $aset->kondisi) === 'Rusak Berat' ? 'selected' : '' }}
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

                            <option
                                value="Aktif"
                                {{ old('status', $aset->status) === 'Aktif' ? 'selected' : '' }}
                            >
                                Aktif — Sedang digunakan
                            </option>

                            <option
                                value="Maintenance"
                                {{ old('status', $aset->status) === 'Maintenance' ? 'selected' : '' }}
                            >
                                Maintenance — Bermasalah / berada di ruang IT
                            </option>

                            <option
                                value="Tidak Aktif"
                                {{ old('status', $aset->status) === 'Tidak Aktif' ? 'selected' : '' }}
                            >
                                Tidak Aktif — Baik / tersedia di ruang IT
                            </option>

                        </select>

                        <div class="asset-status-info">
                            <i class="bi bi-info-circle me-1"></i>
                            Pilih status sesuai kondisi dan penggunaan aset saat ini.
                            Status <strong>Maintenance</strong> dan <strong>Tidak Aktif</strong>
                            menunjukkan aset berada di ruang IT.
                        </div>

                    </div>

                </div>


                {{-- FOTO ASET --}}
                <div class="col-12 col-md-6">

                    <div class="asset-form-group">

                        <label for="foto" class="asset-form-label">
                            Foto Aset
                        </label>

                        @if($aset->foto)

                            <div class="current-photo-wrapper">

                                <img
                                    src="{{ asset('storage/' . $aset->foto) }}"
                                    alt="Foto {{ $aset->nama_aset }}"
                                    class="current-photo"
                                >

                            </div>

                            <div class="asset-form-help mb-2">
                                Foto saat ini. Pilih foto baru jika ingin menggantinya.
                            </div>

                        @else

                            <div class="no-photo-wrapper">

                                <i class="bi bi-image"></i>

                                <p>
                                    Belum ada foto aset
                                </p>

                            </div>

                        @endif


                        <input
                            type="file"
                            name="foto"
                            id="foto"
                            class="form-control asset-form-control asset-file-input"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="asset-form-help">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
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
                        >{{ old('keterangan', $aset->keterangan) }}</textarea>

                    </div>

                </div>

            </div>


            <hr class="asset-form-divider">


            {{-- ACTION --}}
            <div class="asset-form-actions">

                <a
                    href="{{ url('/aset/' . $aset->id) }}"
                    class="btn asset-back-btn"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>


                <button
                    type="submit"
                    class="btn btn-primary asset-save-btn"
                >
                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection