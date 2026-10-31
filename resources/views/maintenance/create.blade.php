@extends('layouts.app')

@section('title', 'Tambah Maintenance')

@section('content')

<style>
    .maintenance-form-header {
        margin-bottom: 24px;
    }

    .maintenance-form-title {
        font-size: 26px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
        letter-spacing: -0.3px;
    }

    .maintenance-form-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin: 0;
    }

    .maintenance-form-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.035);
        overflow: hidden;
    }

    .maintenance-form-card-header {
        padding: 22px 24px;
        border-bottom: 1px solid #eef1f5;
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .maintenance-form-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #0d6efd;
        font-size: 21px;
        flex-shrink: 0;
    }

    .maintenance-form-card-title {
        font-size: 17px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 3px;
    }

    .maintenance-form-card-subtitle {
        color: #9ca3af;
        font-size: 12px;
        margin: 0;
    }

    .maintenance-form-body {
        padding: 24px;
    }

    .form-label {
        color: #374151;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .required-mark {
        color: #dc3545;
    }

    .form-control,
    .form-select {
        min-height: 44px;
        border-radius: 10px;
        border-color: #dfe4ea;
        font-size: 14px;
        color: #1f2937;
    }

    textarea.form-control {
        min-height: auto;
        resize: vertical;
    }

    .form-control::placeholder {
        color: #adb5bd;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.12);
    }

    .form-helper {
        display: block;
        margin-top: 7px;
        color: #9ca3af;
        font-size: 12px;
        line-height: 1.5;
    }

    .form-section {
        background: #f8fafc;
        border: 1px solid #eef1f5;
        border-radius: 13px;
        padding: 18px;
    }

    .form-section-title {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #374151;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .form-section-title i {
        color: #0d6efd;
        font-size: 16px;
    }

    .status-info {
        margin-top: 10px;
        padding: 10px 12px;
        background: #fff;
        border: 1px solid #e9edf2;
        border-radius: 9px;
        color: #6b7280;
        font-size: 12px;
        line-height: 1.5;
    }

    .status-info i {
        color: #0d6efd;
    }

    .error-alert {
        border: 1px solid #f5c2c7;
        background: #fff5f5;
        color: #842029;
        border-radius: 12px;
    }

    .error-alert ul {
        padding-left: 20px;
    }

    .error-alert li {
        margin-bottom: 3px;
    }

    .form-footer {
        border-top: 1px solid #eef1f5;
        margin-top: 6px;
        padding-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .form-footer .btn {
        min-height: 42px;
        padding: 9px 17px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
    }

    .asset-option-note {
        color: #9ca3af;
        font-size: 12px;
    }

    @media (max-width: 767.98px) {
        .maintenance-form-title {
            font-size: 22px;
        }

        .maintenance-form-card-header,
        .maintenance-form-body {
            padding: 18px;
        }

        .form-section {
            padding: 15px;
        }
    }

    @media (max-width: 575.98px) {
        .maintenance-form-title {
            font-size: 21px;
        }

        .maintenance-form-card-title {
            font-size: 16px;
        }

        .form-footer {
            flex-direction: column-reverse;
        }

        .form-footer .btn {
            width: 100%;
        }

        .maintenance-form-icon {
            width: 42px;
            height: 42px;
            font-size: 19px;
        }
    }
</style>

{{-- Header --}}
<div class="maintenance-form-header">
    <h1 class="maintenance-form-title">Tambah Maintenance</h1>
    <p class="maintenance-form-subtitle">
        Catat proses pemeliharaan atau perbaikan aset IT.
    </p>
</div>

{{-- Validation Error --}}
@if($errors->any())
    <div class="alert error-alert shadow-sm mb-4">
        <div class="d-flex align-items-start">
            <i class="bi bi-exclamation-triangle-fill fs-5 me-2"></i>

            <div class="flex-grow-1">
                <strong>Periksa kembali data yang dimasukkan.</strong>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

{{-- Form --}}
<div class="maintenance-form-card">

    <div class="maintenance-form-card-header">

        <div class="maintenance-form-icon">
            <i class="bi bi-tools"></i>
        </div>

        <div>
            <h5 class="maintenance-form-card-title">
                Form Maintenance
            </h5>

            <p class="maintenance-form-card-subtitle">
                Lengkapi informasi pemeliharaan aset.
            </p>
        </div>

    </div>

    <div class="maintenance-form-body">

        <form action="{{ url('/maintenance') }}" method="POST">
            @csrf

            <div class="row g-4">

                {{-- Aset --}}
                <div class="col-12">

                    <label for="aset_id" class="form-label">
                        Aset <span class="required-mark">*</span>
                    </label>

                    <select
                        name="aset_id"
                        id="aset_id"
                        class="form-select @error('aset_id') is-invalid @enderror"
                        required
                    >
                        <option value="">
                            -- Pilih Aset --
                        </option>

                        @foreach($aset as $item)
                            <option
                                value="{{ $item->id }}"
                                {{ old('aset_id') == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->kode_aset }} -
                                {{ $item->nama_aset }}
                                @if($item->pengguna)
                                    | {{ $item->pengguna }}
                                @endif
                            </option>
                        @endforeach
                    </select>

                    @error('aset_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="form-helper">
                        <i class="bi bi-info-circle me-1"></i>
                        Pilih aset yang sedang mengalami masalah atau membutuhkan pemeliharaan.
                    </small>

                </div>

                {{-- Informasi Dasar --}}
                <div class="col-12">

                    <div class="form-section">

                        <div class="form-section-title">
                            <i class="bi bi-calendar-check"></i>
                            Informasi Dasar
                        </div>

                        <div class="row g-3">

                            {{-- Tanggal Masuk --}}
                            <div class="col-12 col-md-6">

                                <label for="tanggal_masuk" class="form-label">
                                    Tanggal Masuk
                                    <span class="required-mark">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_masuk"
                                    id="tanggal_masuk"
                                    value="{{ old('tanggal_masuk', date('Y-m-d')) }}"
                                    class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                    required
                                >

                                @error('tanggal_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Teknisi --}}
                            <div class="col-12 col-md-6">

                                <label for="teknisi" class="form-label">
                                    Teknisi
                                </label>

                                <input
                                    type="text"
                                    name="teknisi"
                                    id="teknisi"
                                    value="{{ old('teknisi') }}"
                                    class="form-control @error('teknisi') is-invalid @enderror"
                                    placeholder="Nama teknisi"
                                >

                                @error('teknisi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Keluhan --}}
                <div class="col-12">

                    <label for="keluhan" class="form-label">
                        Keluhan <span class="required-mark">*</span>
                    </label>

                    <textarea
                        name="keluhan"
                        id="keluhan"
                        rows="4"
                        class="form-control @error('keluhan') is-invalid @enderror"
                        placeholder="Jelaskan masalah atau keluhan pada aset..."
                        required
                    >{{ old('keluhan') }}</textarea>

                    @error('keluhan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="form-helper">
                        Jelaskan kondisi atau masalah yang ditemukan pada aset.
                    </small>

                </div>

                {{-- Tindakan --}}
                <div class="col-12">

                    <label for="tindakan" class="form-label">
                        Tindakan
                    </label>

                    <textarea
                        name="tindakan"
                        id="tindakan"
                        rows="4"
                        class="form-control @error('tindakan') is-invalid @enderror"
                        placeholder="Jelaskan tindakan perbaikan yang dilakukan..."
                    >{{ old('tindakan') }}</textarea>

                    @error('tindakan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="form-helper">
                        Dapat diisi setelah tindakan perbaikan dilakukan.
                    </small>

                </div>

                {{-- Status & Tanggal Selesai --}}
                <div class="col-12">

                    <div class="form-section">

                        <div class="form-section-title">
                            <i class="bi bi-clipboard-check"></i>
                            Status Maintenance
                        </div>

                        <div class="row g-3">

                            {{-- Status --}}
                            <div class="col-12 col-md-6">

                                <label for="status" class="form-label">
                                    Status <span class="required-mark">*</span>
                                </label>

                                <select
                                    name="status"
                                    id="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    required
                                >

                                    <option
                                        value="Proses"
                                        {{ old('status', 'Proses') === 'Proses' ? 'selected' : '' }}
                                    >
                                        Proses
                                    </option>

                                    <option
                                        value="Selesai"
                                        {{ old('status') === 'Selesai' ? 'selected' : '' }}
                                    >
                                        Selesai
                                    </option>

                                </select>

                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="status-info">
                                    <i class="bi bi-info-circle me-1"></i>
                                    <span id="statusHelp">
                                        Pilih <strong>Proses</strong> jika maintenance masih berlangsung.
                                    </span>
                                </div>

                            </div>

                            {{-- Tanggal Selesai --}}
                            <div class="col-12 col-md-6">

                                <label for="tanggal_selesai" class="form-label">
                                    Tanggal Selesai
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_selesai"
                                    id="tanggal_selesai"
                                    value="{{ old('tanggal_selesai') }}"
                                    class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                >

                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <small id="tanggalSelesaiHelp" class="form-helper">
                                    Diisi ketika maintenance sudah selesai.
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Keterangan --}}
                <div class="col-12">

                    <label for="keterangan" class="form-label">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        id="keterangan"
                        rows="3"
                        class="form-control @error('keterangan') is-invalid @enderror"
                        placeholder="Keterangan tambahan..."
                    >{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            {{-- Footer --}}
            <div class="form-footer">

                <a
                    href="{{ url('/maintenance') }}"
                    class="btn btn-outline-secondary"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="bi bi-save me-1"></i>
                    Simpan Maintenance
                </button>

            </div>

        </form>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const status = document.getElementById('status');
    const tanggalMasuk = document.getElementById('tanggal_masuk');
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    const tanggalSelesaiHelp = document.getElementById('tanggalSelesaiHelp');
    const statusHelp = document.getElementById('statusHelp');

    function updateTanggalSelesai() {

        if (status.value === 'Selesai') {

            tanggalSelesai.disabled = false;
            tanggalSelesai.required = true;

            if (tanggalMasuk.value) {
                tanggalSelesai.min = tanggalMasuk.value;
            }

            tanggalSelesaiHelp.textContent =
                'Wajib diisi karena maintenance sudah selesai.';

            statusHelp.innerHTML =
                'Status <strong>Selesai</strong> menandakan proses maintenance telah selesai.';

        } else {

            tanggalSelesai.disabled = true;
            tanggalSelesai.required = false;
            tanggalSelesai.value = '';

            tanggalSelesaiHelp.textContent =
                'Tidak perlu diisi selama maintenance masih berlangsung.';

            statusHelp.innerHTML =
                'Pilih <strong>Proses</strong> jika maintenance masih berlangsung.';

        }
    }

    status.addEventListener('change', updateTanggalSelesai);

    tanggalMasuk.addEventListener('change', function () {

        if (status.value === 'Selesai' && tanggalMasuk.value) {
            tanggalSelesai.min = tanggalMasuk.value;
        }

    });

    updateTanggalSelesai();

});
</script>

@endsection