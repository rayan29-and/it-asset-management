@extends('layouts.app')

@section('title', 'Detail Aset')

@section('content')

<style>
    .asset-detail-header {
        margin-bottom: 24px;
    }

    .asset-detail-title {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.4px;
        margin-bottom: 5px;
    }

    .asset-detail-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 0;
    }

    .asset-back-btn {
        border-radius: 10px;
        padding: 9px 15px;
        font-weight: 500;
        background: #fff;
        border: 1px solid #dfe4ea;
        color: #475569;
        transition: all .2s ease;
    }

    .asset-back-btn:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #1f2937;
        transform: translateY(-1px);
    }

    .asset-detail-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .035);
        overflow: hidden;
    }

    .asset-photo-section {
        padding: 24px;
    }

    .asset-section-heading {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 15px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 16px;
    }

    .asset-section-heading i {
        color: #0d6efd;
        font-size: 17px;
    }

    .asset-photo-wrapper {
        width: 100%;
        min-height: 280px;
        padding: 14px;
        border: 1px solid #e8ecf2;
        border-radius: 14px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .asset-photo {
        width: 100%;
        max-height: 330px;
        object-fit: contain;
        border-radius: 10px;
    }

    .asset-no-photo {
        width: 100%;
        min-height: 250px;
        border: 1px dashed #d5dbe4;
        border-radius: 14px;
        background: #f8fafc;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
    }

    .asset-no-photo i {
        font-size: 42px;
        margin-bottom: 10px;
    }

    .asset-no-photo p {
        margin: 0;
        font-size: 13px;
    }

    .asset-identity {
        text-align: center;
        padding-top: 22px;
    }

    .asset-identity-name {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .asset-identity-code {
        color: #9ca3af;
        font-size: 13px;
        font-family: monospace;
        margin-bottom: 14px;
    }

    .asset-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
    }

    .asset-status.active {
        background: #ecfdf3;
        color: #16834b;
    }

    .asset-status.maintenance {
        background: #fff7e6;
        color: #a15c00;
    }

    .asset-status.inactive {
        background: #f1f5f9;
        color: #64748b;
    }

    .asset-info-header {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f4;
    }

    .asset-info-title {
        font-size: 16px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .asset-info-subtitle {
        color: #9ca3af;
        font-size: 12px;
        margin-bottom: 0;
    }

    .asset-info-body {
        padding: 24px;
    }

    .asset-info-item {
        padding: 14px;
        border: 1px solid #edf0f4;
        border-radius: 12px;
        background: #fff;
        height: 100%;
    }

    .asset-info-label {
        color: #9ca3af;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .35px;
        margin-bottom: 6px;
    }

    .asset-info-value {
        color: #374151;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .asset-info-value i {
        color: #0d6efd;
        margin-right: 4px;
    }

    .asset-content-card {
        margin-top: 20px;
    }

    .asset-content-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf0f4;
    }

    .asset-content-title {
        font-size: 16px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .asset-content-subtitle {
        color: #9ca3af;
        font-size: 12px;
        margin-bottom: 0;
    }

    .asset-content-body {
        padding: 22px 24px;
    }

    .asset-description {
        color: #4b5563;
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
        white-space: pre-line;
    }

    .maintenance-header-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff7e6;
        color: #b76e00;
        font-size: 19px;
        flex-shrink: 0;
    }

    .maintenance-count {
        background: #f1f5f9;
        color: #64748b;
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .maintenance-table-wrapper {
        overflow-x: auto;
    }

    .maintenance-detail-table {
        min-width: 760px;
        margin-bottom: 0;
    }

    .maintenance-detail-table thead th {
        background: #f8fafc;
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        padding: 13px 16px;
        border-bottom: 1px solid #e8ecf2;
        white-space: nowrap;
    }

    .maintenance-detail-table tbody td {
        padding: 14px 16px;
        border-color: #f0f2f5;
        vertical-align: middle;
        font-size: 13px;
    }

    .maintenance-detail-table tbody tr {
        transition: background-color .15s ease;
    }

    .maintenance-detail-table tbody tr:hover {
        background: #fafcff;
    }

    .maintenance-number {
        color: #9ca3af;
        font-weight: 600;
    }

    .maintenance-date {
        color: #4b5563;
        font-weight: 500;
        white-space: nowrap;
    }

    .maintenance-complaint {
        max-width: 280px;
        color: #4b5563;
        line-height: 1.5;
        white-space: normal;
    }

    .maintenance-technician {
        color: #4b5563;
        font-weight: 500;
    }

    .maintenance-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 8px;
        padding: 6px 9px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .maintenance-status.process {
        background: #fff7e6;
        color: #a15c00;
    }

    .maintenance-status.done {
        background: #ecfdf3;
        color: #16834b;
    }

    .maintenance-status::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .maintenance-detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border-radius: 9px;
        padding: 7px 11px;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-size: 12px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .maintenance-detail-btn:hover {
        background: #eaf2ff;
        border-color: #cfe0ff;
        color: #0d6efd;
        transform: translateY(-1px);
    }

    .maintenance-empty {
        text-align: center;
        padding: 55px 20px;
    }

    .maintenance-empty-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        border-radius: 15px;
        background: #f1f5f9;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 27px;
    }

    .maintenance-empty-title {
        font-size: 15px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 5px;
    }

    .maintenance-empty-text {
        color: #9ca3af;
        font-size: 13px;
        margin: 0;
    }

    @media (max-width: 991.98px) {
        .asset-photo-section {
            padding: 20px;
        }

        .asset-info-header,
        .asset-info-body,
        .asset-content-header,
        .asset-content-body {
            padding-left: 20px;
            padding-right: 20px;
        }
    }

    @media (max-width: 767.98px) {
        .asset-detail-header {
            margin-bottom: 18px;
        }

        .asset-detail-title {
            font-size: 23px;
        }

        .asset-detail-subtitle {
            font-size: 13px;
        }

        .asset-back-btn {
            width: 100%;
            justify-content: center;
        }

        .asset-photo-section {
            padding: 16px;
        }

        .asset-photo-wrapper {
            min-height: 230px;
        }

        .asset-no-photo {
            min-height: 200px;
        }

        .asset-identity-name {
            font-size: 18px;
        }

        .asset-info-header,
        .asset-info-body,
        .asset-content-header,
        .asset-content-body {
            padding: 16px;
        }

        .asset-content-card {
            margin-top: 16px;
        }

        .maintenance-header-icon {
            width: 38px;
            height: 38px;
            font-size: 17px;
        }
    }

    @media (max-width: 575.98px) {
        .asset-detail-title {
            font-size: 21px;
        }

        .asset-section-heading {
            font-size: 14px;
        }

        .asset-info-item {
            padding: 12px;
        }

        .asset-info-value {
            font-size: 13px;
        }

        .maintenance-count {
            font-size: 11px;
        }
    }
</style>

<div class="asset-detail-header">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

        <div>
            <h1 class="asset-detail-title">
                Detail Aset
            </h1>

            <p class="asset-detail-subtitle">
                Informasi lengkap perangkat teknologi informasi.
            </p>
        </div>

        <a href="{{ url('/aset') }}"
           class="btn asset-back-btn">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>
</div>


<div class="row g-4">

    {{-- FOTO & IDENTITAS ASET --}}
    <div class="col-12 col-lg-4">

        <div class="asset-detail-card h-100">

            <div class="asset-photo-section">

                <div class="asset-section-heading">
                    <i class="bi bi-image"></i>
                    <span>Foto Aset</span>
                </div>

                @if($aset->foto)

                    <div class="asset-photo-wrapper">

                        <img
                            src="{{ asset('storage/' . $aset->foto) }}"
                            alt="Foto {{ $aset->nama_aset }}"
                            class="asset-photo"
                        >

                    </div>

                @else

                    <div class="asset-no-photo">

                        <i class="bi bi-image"></i>

                        <p>
                            Belum ada foto aset
                        </p>

                    </div>

                @endif


                <div class="asset-identity">

                    <div class="asset-identity-name">
                        {{ $aset->nama_aset }}
                    </div>

                    <div class="asset-identity-code">
                        {{ $aset->kode_aset }}
                    </div>


                    @if($aset->status === 'Aktif')

                        <span class="asset-status active">
                            <i class="bi bi-check-circle"></i>
                            Aktif
                        </span>

                    @elseif($aset->status === 'Maintenance')

                        <span class="asset-status maintenance">
                            <i class="bi bi-tools"></i>
                            Maintenance
                        </span>

                    @else

                        <span class="asset-status inactive">
                            <i class="bi bi-box"></i>
                            Tidak Aktif
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- INFORMASI PERANGKAT --}}
    <div class="col-12 col-lg-8">

        <div class="asset-detail-card h-100">

            <div class="asset-info-header">

                <div class="asset-info-title">
                    Informasi Perangkat
                </div>

                <p class="asset-info-subtitle">
                    Detail spesifikasi dan informasi aset.
                </p>

            </div>


            <div class="asset-info-body">

                <div class="row g-3">

                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Kategori
                            </div>

                            <div class="asset-info-value">
                                {{ $aset->kategori->nama_kategori ?? '-' }}
                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Merk
                            </div>

                            <div class="asset-info-value">
                                {{ $aset->merk ?? '-' }}
                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Model
                            </div>

                            <div class="asset-info-value">
                                {{ $aset->model ?? '-' }}
                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Nomor Seri
                            </div>

                            <div class="asset-info-value">
                                {{ $aset->nomor_seri ?? '-' }}
                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Pengguna
                            </div>

                            <div class="asset-info-value">

                                @if($aset->pengguna)

                                    <i class="bi bi-person"></i>
                                    {{ $aset->pengguna }}

                                @else

                                    -

                                @endif

                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Lokasi
                            </div>

                            <div class="asset-info-value">

                                @if($aset->lokasi)

                                    <i class="bi bi-geo-alt"></i>
                                    {{ $aset->lokasi }}

                                @else

                                    -

                                @endif

                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Kondisi
                            </div>

                            <div class="asset-info-value">
                                {{ $aset->kondisi ?? '-' }}
                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="asset-info-item">

                            <div class="asset-info-label">
                                Tanggal Perolehan
                            </div>

                            <div class="asset-info-value">

                                @if($aset->tanggal_perolehan)

                                    {{ \Carbon\Carbon::parse($aset->tanggal_perolehan)->format('d M Y') }}

                                @else

                                    -

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- KETERANGAN --}}
<div class="asset-detail-card asset-content-card">

    <div class="asset-content-header">

        <div class="asset-content-title">
            Keterangan
        </div>

        <p class="asset-content-subtitle">
            Catatan tambahan mengenai aset.
        </p>

    </div>

    <div class="asset-content-body">

        <p class="asset-description">
            {{ $aset->keterangan ?? 'Tidak ada keterangan.' }}
        </p>

    </div>

</div>


{{-- RIWAYAT MAINTENANCE --}}
<div class="asset-detail-card asset-content-card">

    <div class="asset-content-header">

        <div class="d-flex align-items-center justify-content-between gap-3">

            <div class="d-flex align-items-center gap-3">

                <div class="maintenance-header-icon">
                    <i class="bi bi-tools"></i>
                </div>

                <div>

                    <div class="asset-content-title">
                        Riwayat Maintenance
                    </div>

                    <p class="asset-content-subtitle">
                        Riwayat perbaikan dan maintenance aset.
                    </p>

                </div>

            </div>

            <div class="maintenance-count">
                {{ $aset->maintenance->count() }} Data
            </div>

        </div>

    </div>


    @if($aset->maintenance->count() > 0)

        <div class="maintenance-table-wrapper">

            <table class="table maintenance-detail-table">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Keluhan</th>
                        <th>Teknisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($aset->maintenance as $item)

                        <tr>

                            <td>
                                <span class="maintenance-number">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            <td>

                                <span class="maintenance-date">

                                    {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}

                                </span>

                            </td>

                            <td>

                                <div class="maintenance-complaint">

                                    {{ \Illuminate\Support\Str::limit($item->keluhan, 60) }}

                                </div>

                            </td>

                            <td>

                                <span class="maintenance-technician">

                                    {{ $item->teknisi ?? '-' }}

                                </span>

                            </td>

                            <td>

                                @if($item->status === 'Proses')

                                    <span class="maintenance-status process">
                                        Proses
                                    </span>

                                @else

                                    <span class="maintenance-status done">
                                        Selesai
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ url('/maintenance/' . $item->id) }}"
                                   class="maintenance-detail-btn">

                                    <i class="bi bi-eye"></i>
                                    Detail

                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="maintenance-empty">

            <div class="maintenance-empty-icon">
                <i class="bi bi-tools"></i>
            </div>

            <div class="maintenance-empty-title">
                Belum ada riwayat maintenance
            </div>

            <p class="maintenance-empty-text">
                Riwayat maintenance aset akan muncul di sini.
            </p>

        </div>

    @endif

</div>

@endsection