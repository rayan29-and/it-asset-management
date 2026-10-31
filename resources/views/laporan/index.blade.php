@extends('layouts.app')

@section('title', 'Laporan Maintenance')

@section('content')

<style>
    .report-page-header {
        margin-bottom: 24px;
    }

    .report-page-title {
        font-size: 25px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.4px;
        margin-bottom: 5px;
    }

    .report-page-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 0;
    }

    .report-filter-card,
    .report-data-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .035);
        overflow: hidden;
    }

    .report-filter-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f4;
    }

    .report-section-title {
        color: #1f2937;
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .report-section-subtitle {
        color: #9ca3af;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .report-filter-body {
        padding: 22px;
    }

    .report-form-label {
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .report-date-input {
        min-height: 43px;
    }

    .report-filter-actions {
        display: flex;
        gap: 8px;
    }

    .report-filter-btn {
        min-height: 43px;
        padding: 9px 15px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
    }

    .report-reset-btn {
        background: #fff;
        border: 1px solid #dfe4ea;
        color: #667085;
    }

    .report-reset-btn:hover {
        background: #f8fafc;
        color: #374151;
        border-color: #cfd5dd;
    }

    .report-data-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f4;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .report-data-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f5f8ff;
        color: #0d6efd;
        border: 1px solid #e1ebff;
        padding: 7px 11px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .report-table {
        margin: 0;
    }

    .report-table thead th {
        background: #f8fafc;
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        border-bottom: 1px solid #e8ecf2;
        padding: 14px 16px;
        white-space: nowrap;
    }

    .report-table tbody td {
        padding: 15px 16px;
        border-bottom: 1px solid #f0f2f5;
        vertical-align: middle;
        font-size: 13px;
    }

    .report-table tbody tr:last-child td {
        border-bottom: none;
    }

    .report-table tbody tr {
        transition: background-color .15s ease;
    }

    .report-table tbody tr:hover {
        background: #fafcff;
    }

    .report-number {
        color: #9ca3af;
        font-weight: 500;
    }

    .report-date {
        color: #374151;
        white-space: nowrap;
        font-weight: 500;
    }

    .report-date-empty {
        color: #9ca3af;
    }

    .report-asset {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 190px;
    }

    .report-asset-icon {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        background: #eaf2ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 17px;
    }

    .report-asset-code {
        color: #0d6efd;
        font-size: 12px;
        font-weight: 600;
    }

    .report-asset-name {
        color: #1f2937;
        font-weight: 600;
        margin-top: 2px;
    }

    .report-complaint {
        color: #4b5563;
        max-width: 350px;
        line-height: 1.5;
    }

    .report-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 8px;
        padding: 7px 10px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .report-status-process {
        background: #fff8e6;
        color: #946200;
        border: 1px solid #ffedb8;
    }

    .report-status-done {
        background: #ecfdf3;
        color: #087443;
        border: 1px solid #c7f0d9;
    }

    .report-delete-btn {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #fff1f2;
        color: #dc3545;
        border: 1px solid #ffd9dd;
        transition: all .2s ease;
    }

    .report-delete-btn:hover {
        background: #ffe1e4;
        color: #bb2635;
        transform: translateY(-1px);
    }

    .report-empty-state {
        padding: 60px 20px;
        text-align: center;
    }

    .report-empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 16px;
        border-radius: 18px;
        background: #f5f8ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    .report-empty-title {
        color: #374151;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .report-empty-text {
        color: #9ca3af;
        font-size: 13px;
        margin: 0;
    }

    @media (max-width: 767.98px) {
        .report-page-title {
            font-size: 22px;
        }

        .report-page-subtitle {
            font-size: 13px;
        }

        .report-filter-header,
        .report-filter-body,
        .report-data-header {
            padding: 17px;
        }

        .report-data-count {
            display: none;
        }
    }

    @media (max-width: 575.98px) {
        .report-filter-card,
        .report-data-card {
            border-radius: 13px;
        }

        .report-filter-actions {
            width: 100%;
        }

        .report-filter-btn {
            flex: 1;
        }

        .report-table {
            min-width: 950px;
        }

        .report-empty-state {
            padding: 45px 15px;
        }
    }
</style>


<!-- Header -->
<div class="report-page-header">

    <h3 class="report-page-title">
        Laporan Maintenance
    </h3>

    <p class="report-page-subtitle">
        Lihat dan kelola laporan riwayat maintenance aset.
    </p>

</div>


<!-- Filter Periode -->
<div class="report-filter-card mb-4">

    <div class="report-filter-header">

        <h5 class="report-section-title">
            Filter Periode Laporan
        </h5>

        <p class="report-section-subtitle">
            Pilih periode tanggal untuk menampilkan laporan maintenance.
        </p>

    </div>


    <div class="report-filter-body">

        <form method="GET"
              action="{{ route('laporan.index') }}">

            <div class="row g-3 align-items-end">

                <!-- Tanggal Mulai -->
                <div class="col-12 col-md-4">

                    <label class="report-form-label">
                        Tanggal Mulai
                    </label>

                    <input type="date"
                           name="tanggal_mulai"
                           class="form-control report-date-input"
                           value="{{ request('tanggal_mulai') }}">

                </div>


                <!-- Tanggal Selesai -->
                <div class="col-12 col-md-4">

                    <label class="report-form-label">
                        Tanggal Selesai
                    </label>

                    <input type="date"
                           name="tanggal_selesai"
                           class="form-control report-date-input"
                           value="{{ request('tanggal_selesai') }}">

                </div>


                <!-- Tombol -->
                <div class="col-12 col-md-4">

                    <div class="report-filter-actions">

                        <button type="submit"
                                class="btn btn-primary report-filter-btn">

                            <i class="bi bi-funnel me-1"></i>
                            Tampilkan

                        </button>


                        <a href="{{ route('laporan.index') }}"
                           class="btn report-reset-btn report-filter-btn">

                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                            Reset

                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- Data Laporan -->
<div class="report-data-card">

    <div class="report-data-header">

        <div>

            <h5 class="report-section-title">
                Data Maintenance
            </h5>

            <p class="report-section-subtitle">
                Total {{ $maintenance->count() }} data maintenance.
            </p>

        </div>


        <div class="report-data-count">

            <i class="bi bi-file-earmark-text"></i>

            {{ $maintenance->count() }} Data

        </div>

    </div>


    @if($maintenance->count() > 0)

        <!-- Tabel -->
        <div class="table-responsive">

            <table class="table report-table align-middle">

                <thead>

                    <tr>

                        <th style="width: 60px;" class="ps-4">
                            No
                        </th>

                        <th>
                            Tanggal Masuk
                        </th>

                        <th>
                            Tanggal Selesai
                        </th>

                        <th>
                            Aset
                        </th>

                        <th>
                            Keluhan
                        </th>

                        <th>
                            Status
                        </th>

                        <th style="width: 90px;" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($maintenance as $index => $item)

                        <tr>

                            <!-- No -->
                            <td class="ps-4">

                                <span class="report-number">
                                    {{ $index + 1 }}
                                </span>

                            </td>


                            <!-- Tanggal Masuk -->
                            <td>

                                <span class="report-date">

                                    {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d/m/Y') }}

                                </span>

                            </td>


                            <!-- Tanggal Selesai -->
                            <td>

                                @if($item->tanggal_selesai)

                                    <span class="report-date">

                                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}

                                    </span>

                                @else

                                    <span class="report-date-empty">
                                        Belum selesai
                                    </span>

                                @endif

                            </td>


                            <!-- Aset -->
                            <td>

                                <div class="report-asset">

                                    <div class="report-asset-icon">
                                        <i class="bi bi-laptop"></i>
                                    </div>

                                    <div>

                                        <div class="report-asset-code">
                                            {{ $item->aset->kode_aset ?? '-' }}
                                        </div>

                                        <div class="report-asset-name">
                                            {{ $item->aset->nama_aset ?? '-' }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            <!-- Keluhan -->
                            <td>

                                <div class="report-complaint">
                                    {{ $item->keluhan }}
                                </div>

                            </td>


                            <!-- Status -->
                            <td>

                                @if($item->status === 'Proses')

                                    <span class="report-status report-status-process">

                                        <i class="bi bi-tools"></i>
                                        Proses

                                    </span>

                                @else

                                    <span class="report-status report-status-done">

                                        <i class="bi bi-check-circle"></i>
                                        Selesai

                                    </span>

                                @endif

                            </td>


                            <!-- Aksi -->
                            <td class="text-center">

                                <form action="{{ url('/maintenance/' . $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data maintenance ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="report-delete-btn"
                                            title="Hapus data"
                                            aria-label="Hapus data">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <!-- Empty State -->
        <div class="report-empty-state">

            <div class="report-empty-icon">

                <i class="bi bi-file-earmark-text"></i>

            </div>

            <div class="report-empty-title">
                Tidak ada data maintenance
            </div>

            <p class="report-empty-text">
                Data maintenance pada periode yang dipilih belum tersedia.
            </p>

        </div>

    @endif

</div>

@endsection