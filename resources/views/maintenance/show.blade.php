@extends('layouts.app')

@section('title', 'Detail Maintenance')

@section('content')

<style>
    .maintenance-detail-header {
        margin-bottom: 24px;
    }

    .maintenance-detail-title {
        font-size: 26px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
        letter-spacing: -0.3px;
    }

    .maintenance-detail-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin: 0;
    }

    .detail-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 24px;
    }

    .detail-action-btn {
        min-height: 42px;
        padding: 9px 16px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
    }

    .detail-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.035);
        overflow: hidden;
    }

    .detail-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 22px 24px;
        border-bottom: 1px solid #eef1f5;
    }

    .detail-icon {
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

    .detail-card-title {
        font-size: 17px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 3px;
    }

    .detail-card-subtitle {
        color: #9ca3af;
        font-size: 12px;
        margin: 0;
    }

    .detail-card-body {
        padding: 24px;
    }

    .detail-item {
        padding: 14px 0;
        border-bottom: 1px solid #f0f2f5;
    }

    .detail-item:first-child {
        padding-top: 0;
    }

    .detail-item:last-child {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .detail-label {
        display: block;
        color: #9ca3af;
        font-size: 12px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .detail-value {
        color: #1f2937;
        font-size: 14px;
        font-weight: 500;
        word-break: break-word;
    }

    .maintenance-info-card {
        height: 100%;
    }

    .maintenance-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-process {
        background: #fff4d6;
        color: #8a5a00;
    }

    .status-done {
        background: #e9f8ef;
        color: #16803c;
    }

    .maintenance-grid {
        margin-top: 4px;
    }

    .maintenance-grid-item {
        padding: 15px 0;
    }

    .maintenance-grid-item.full {
        border-top: 1px solid #f0f2f5;
    }

    .maintenance-content-box {
        background: #f8fafc;
        border: 1px solid #eef1f5;
        border-radius: 11px;
        padding: 14px 15px;
        color: #374151;
        font-size: 14px;
        line-height: 1.7;
        min-height: 50px;
        white-space: pre-line;
        word-break: break-word;
    }

    .maintenance-content-box.empty {
        color: #9ca3af;
        font-style: italic;
    }

    .asset-highlight {
        background: #f8fafc;
        border: 1px solid #eef1f5;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 8px;
    }

    .asset-highlight-code {
        color: #0d6efd;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .asset-highlight-name {
        color: #111827;
        font-size: 15px;
        font-weight: 700;
    }

    @media (max-width: 767.98px) {
        .maintenance-detail-title {
            font-size: 22px;
        }

        .detail-actions {
            width: 100%;
        }

        .detail-action-btn {
            flex: 1 1 auto;
            justify-content: center;
        }

        .detail-card-header,
        .detail-card-body {
            padding: 18px;
        }

        .maintenance-card-top {
            flex-direction: column;
        }

        .status-badge {
            align-self: flex-start;
        }
    }

    @media (max-width: 575.98px) {
        .detail-actions {
            display: grid;
            grid-template-columns: 1fr;
        }

        .detail-action-btn {
            width: 100%;
        }

        .detail-icon {
            width: 42px;
            height: 42px;
            font-size: 19px;
        }

        .detail-card-title {
            font-size: 16px;
        }

        .detail-value,
        .maintenance-content-box {
            font-size: 13px;
        }
    }
</style>

{{-- Header --}}
<div class="maintenance-detail-header">
    <h1 class="maintenance-detail-title">Detail Maintenance</h1>
    <p class="maintenance-detail-subtitle">
        Informasi lengkap proses pemeliharaan dan perbaikan aset.
    </p>
</div>

{{-- Action Buttons --}}
<div class="detail-actions">

    <a href="{{ url('/maintenance') }}"
       class="btn btn-outline-secondary detail-action-btn">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>

    <a href="{{ url('/maintenance/' . $maintenance->id . '/edit') }}"
       class="btn btn-primary detail-action-btn">
        <i class="bi bi-pencil me-1"></i>
        Edit
    </a>

    <form action="{{ url('/maintenance/' . $maintenance->id) }}"
          method="POST"
          class="d-inline"
          onsubmit="return confirm('Yakin ingin menghapus data maintenance ini?')">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger detail-action-btn">
            <i class="bi bi-trash me-1"></i>
            Hapus
        </button>

    </form>

</div>

{{-- Content --}}
<div class="row g-4">

    {{-- Informasi Aset --}}
    <div class="col-12 col-lg-5">

        <div class="detail-card maintenance-info-card">

            <div class="detail-card-header">

                <div class="detail-icon">
                    <i class="bi bi-laptop"></i>
                </div>

                <div>
                    <h5 class="detail-card-title">
                        Informasi Aset
                    </h5>

                    <p class="detail-card-subtitle">
                        Aset yang menjalani maintenance
                    </p>
                </div>

            </div>

            <div class="detail-card-body">

                <div class="asset-highlight">

                    <div class="asset-highlight-code">
                        {{ $maintenance->aset->kode_aset ?? '-' }}
                    </div>

                    <div class="asset-highlight-name">
                        {{ $maintenance->aset->nama_aset ?? '-' }}
                    </div>

                </div>

                <div class="detail-item">

                    <span class="detail-label">
                        Kode Aset
                    </span>

                    <span class="detail-value">
                        {{ $maintenance->aset->kode_aset ?? '-' }}
                    </span>

                </div>

                <div class="detail-item">

                    <span class="detail-label">
                        Nama Aset
                    </span>

                    <span class="detail-value">
                        {{ $maintenance->aset->nama_aset ?? '-' }}
                    </span>

                </div>

                <div class="detail-item">

                    <span class="detail-label">
                        Kategori
                    </span>

                    <span class="detail-value">
                        {{ $maintenance->aset->kategori->nama_kategori ?? '-' }}
                    </span>

                </div>

                <div class="detail-item">

                    <span class="detail-label">
                        Pengguna
                    </span>

                    <span class="detail-value">
                        {{ $maintenance->aset->pengguna ?? '-' }}
                    </span>

                </div>

                <div class="detail-item">

                    <span class="detail-label">
                        Lokasi
                    </span>

                    <span class="detail-value">
                        {{ $maintenance->aset->lokasi ?? '-' }}
                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- Informasi Maintenance --}}
    <div class="col-12 col-lg-7">

        <div class="detail-card">

            <div class="detail-card-header">

                <div class="maintenance-card-top w-100">

                    <div>
                        <h5 class="detail-card-title">
                            Informasi Maintenance
                        </h5>

                        <p class="detail-card-subtitle">
                            Detail proses perbaikan aset
                        </p>
                    </div>

                    @if($maintenance->status === 'Proses')

                        <span class="status-badge status-process">
                            <i class="bi bi-tools"></i>
                            Proses
                        </span>

                    @else

                        <span class="status-badge status-done">
                            <i class="bi bi-check-circle"></i>
                            Selesai
                        </span>

                    @endif

                </div>

            </div>

            <div class="detail-card-body">

                <div class="row g-0 maintenance-grid">

                    {{-- Tanggal Masuk --}}
                    <div class="col-12 col-md-6 pe-md-4">

                        <div class="maintenance-grid-item">

                            <span class="detail-label">
                                Tanggal Masuk
                            </span>

                            <span class="detail-value">
                                {{ \Carbon\Carbon::parse($maintenance->tanggal_masuk)->format('d/m/Y') }}
                            </span>

                        </div>

                    </div>

                    {{-- Teknisi --}}
                    <div class="col-12 col-md-6 ps-md-4">

                        <div class="maintenance-grid-item">

                            <span class="detail-label">
                                Teknisi
                            </span>

                            <span class="detail-value">
                                {{ $maintenance->teknisi ?? '-' }}
                            </span>

                        </div>

                    </div>

                    {{-- Keluhan --}}
                    <div class="col-12">

                        <div class="maintenance-grid-item full">

                            <span class="detail-label">
                                Keluhan
                            </span>

                            <div class="maintenance-content-box">
                                {{ $maintenance->keluhan }}
                            </div>

                        </div>

                    </div>

                    {{-- Tindakan --}}
                    <div class="col-12">

                        <div class="maintenance-grid-item full">

                            <span class="detail-label">
                                Tindakan
                            </span>

                            @if($maintenance->tindakan)

                                <div class="maintenance-content-box">
                                    {{ $maintenance->tindakan }}
                                </div>

                            @else

                                <div class="maintenance-content-box empty">
                                    Belum ada tindakan yang dicatat.
                                </div>

                            @endif

                        </div>

                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="col-12 col-md-6">

                        <div class="maintenance-grid-item full">

                            <span class="detail-label">
                                Tanggal Selesai
                            </span>

                            <span class="detail-value">

                                @if($maintenance->tanggal_selesai)

                                    {{ \Carbon\Carbon::parse($maintenance->tanggal_selesai)->format('d/m/Y') }}

                                @else

                                    <span class="text-muted">
                                        Belum selesai
                                    </span>

                                @endif

                            </span>

                        </div>

                    </div>

                    {{-- Keterangan --}}
                    <div class="col-12">

                        <div class="maintenance-grid-item full">

                            <span class="detail-label">
                                Keterangan
                            </span>

                            @if($maintenance->keterangan)

                                <div class="maintenance-content-box">
                                    {{ $maintenance->keterangan }}
                                </div>

                            @else

                                <div class="maintenance-content-box empty">
                                    Tidak ada keterangan tambahan.
                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection