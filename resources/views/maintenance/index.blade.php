@extends('layouts.app')

@section('title', 'Maintenance')

@section('content')

<style>
    .maintenance-page-header {
        margin-bottom: 24px;
    }

    .maintenance-page-title {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
        letter-spacing: -0.4px;
    }

    .maintenance-page-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 0;
    }

    .add-maintenance-btn {
        border-radius: 10px;
        padding: 10px 16px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
    }

    .add-maintenance-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.20);
    }

    .maintenance-alert {
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .maintenance-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.035);
        overflow: hidden;
    }

    .maintenance-toolbar {
        padding: 20px;
        border-bottom: 1px solid #edf0f4;
        background: #fff;
    }

    .maintenance-search {
        width: 100%;
    }

    .maintenance-search .input-group {
        width: 100%;
    }

    .maintenance-search .form-control {
        min-height: 44px;
        border-radius: 10px 0 0 10px;
    }

    .maintenance-search .btn {
        min-height: 44px;
        border-radius: 0 10px 10px 0;
        padding-left: 20px;
        padding-right: 20px;
    }

    .filter-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        margin-bottom: 7px;
    }

    .maintenance-filters {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .maintenance-filter-btn {
        border: 1px solid #dfe4ea;
        background: #fff;
        color: #667085;
        border-radius: 9px;
        padding: 8px 13px;
        font-size: 13px;
        font-weight: 500;
        transition: all .2s ease;
    }

    .maintenance-filter-btn:hover {
        border-color: #b9d2ff;
        background: #f5f8ff;
        color: #0d6efd;
    }

    .maintenance-filter-btn.active {
        border-color: #0d6efd;
        background: #eaf2ff;
        color: #0d6efd;
        font-weight: 600;
    }

    .maintenance-table-header {
        padding: 18px 20px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .maintenance-section-title {
        font-size: 16px;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }

    .maintenance-section-subtitle {
        color: #9ca3af;
        font-size: 12px;
        margin-top: 3px;
        margin-bottom: 0;
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

    .maintenance-table {
        margin-bottom: 0;
        min-width: 900px;
    }

    .maintenance-table thead th {
        background: #f8fafc;
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        padding: 13px 16px;
        border-bottom: 1px solid #e8ecf2;
        white-space: nowrap;
    }

    .maintenance-table tbody td {
        padding: 14px 16px;
        border-color: #f0f2f5;
        vertical-align: middle;
        font-size: 13px;
    }

    .maintenance-table tbody tr {
        transition: background-color .15s ease;
    }

    .maintenance-table tbody tr:hover {
        background: #fafcff;
    }

    .maintenance-number {
        color: #9ca3af;
        font-weight: 600;
    }

    .asset-info {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .asset-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #0d6efd;
        font-size: 17px;
        flex-shrink: 0;
    }

    .asset-name {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 2px;
    }

    .asset-code {
        font-size: 11px;
        color: #9ca3af;
    }

    .maintenance-date {
        color: #4b5563;
        font-weight: 500;
        white-space: nowrap;
    }

    .complaint-text {
        color: #4b5563;
        max-width: 260px;
        white-space: normal;
        line-height: 1.5;
    }

    .technician-name {
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
        color: #b76e00;
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

    .maintenance-actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .maintenance-detail-btn {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        color: #475569;
        border: 1px solid #e2e8f0;
        transition: all .2s ease;
    }

    .maintenance-detail-btn:hover {
        background: #eaf2ff;
        color: #0d6efd;
        border-color: #cfe0ff;
        transform: translateY(-1px);
    }

    .maintenance-empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .maintenance-empty-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 16px;
        border-radius: 16px;
        background: #f1f5f9;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .maintenance-empty-title {
        font-size: 16px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 5px;
    }

    .maintenance-empty-text {
        color: #9ca3af;
        font-size: 13px;
        margin-bottom: 18px;
    }

    .maintenance-empty-btn {
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
    }

    @media (max-width: 767.98px) {
        .maintenance-page-header {
            margin-bottom: 18px;
        }

        .maintenance-page-title {
            font-size: 23px;
        }

        .maintenance-page-subtitle {
            font-size: 13px;
        }

        .maintenance-page-header .btn {
            width: 100%;
            margin-top: 14px;
        }

        .maintenance-toolbar {
            padding: 15px;
        }

        .maintenance-table-header {
            padding: 15px;
        }

        .maintenance-count {
            font-size: 11px;
        }
    }

    @media (max-width: 575.98px) {
        .maintenance-page-title {
            font-size: 21px;
        }

        .maintenance-search .form-control {
            font-size: 13px;
        }

        .maintenance-search .btn {
            padding-left: 14px;
            padding-right: 14px;
        }

        .maintenance-filter-btn {
            font-size: 12px;
            padding: 7px 10px;
        }
    }
</style>

<div class="maintenance-page-header">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
            <h1 class="maintenance-page-title">Maintenance</h1>
            <p class="maintenance-page-subtitle">
                Kelola dan pantau riwayat pemeliharaan aset teknologi informasi.
            </p>
        </div>

        <a href="{{ url('/maintenance/create') }}"
           class="btn btn-primary add-maintenance-btn">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Maintenance
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success maintenance-alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger maintenance-alert">
        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('error') }}
    </div>
@endif

<div class="maintenance-card">

    <div class="maintenance-toolbar">

        <form method="GET"
              action="{{ url('/maintenance') }}"
              class="row g-3">

            <div class="col-12">
                <label class="filter-label">
                    Cari Maintenance
                </label>

                <div class="maintenance-search">
                    <div class="input-group">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari berdasarkan nama aset, kode aset, keluhan, atau teknisi..."
                            value="{{ request('search') }}"
                        >

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search me-1"></i>
                            Cari
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label class="filter-label">
                    Filter Status
                </label>

                <div class="maintenance-filters">

                    <a href="{{ request()->fullUrlWithQuery(['status' => null]) }}"
                       class="maintenance-filter-btn {{ !request('status') ? 'active' : '' }}">
                        Semua
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['status' => 'Proses']) }}"
                       class="maintenance-filter-btn {{ request('status') === 'Proses' ? 'active' : '' }}">
                        <i class="bi bi-clock me-1"></i>
                        Proses
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['status' => 'Selesai']) }}"
                       class="maintenance-filter-btn {{ request('status') === 'Selesai' ? 'active' : '' }}">
                        <i class="bi bi-check-circle me-1"></i>
                        Selesai
                    </a>

                    @if(request('search') || request('status'))
                        <a href="{{ url('/maintenance') }}"
                           class="maintenance-filter-btn">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                            Reset
                        </a>
                    @endif

                </div>
            </div>

        </form>

    </div>

    <div class="maintenance-table-header">
        <div>
            <h2 class="maintenance-section-title">
                Data Maintenance
            </h2>

            <p class="maintenance-section-subtitle">
                Daftar pemeliharaan aset yang tercatat dalam sistem.
            </p>
        </div>

        <div class="maintenance-count">
            {{ $maintenance->count() }} Data
        </div>
    </div>

    @if($maintenance->count() > 0)

        <div class="maintenance-table-wrapper">
            <table class="table maintenance-table">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Aset</th>
                        <th>Tanggal Masuk</th>
                        <th>Keluhan</th>
                        <th>Teknisi</th>
                        <th>Status</th>
                        <th width="90">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($maintenance as $item)

                        <tr>

                            <td>
                                <span class="maintenance-number">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            <td>
                                <div class="asset-info">

                                    <div class="asset-icon">
                                        <i class="bi bi-tools"></i>
                                    </div>

                                    <div>
                                        <div class="asset-name">
                                            {{ $item->aset->nama_aset ?? '-' }}
                                        </div>

                                        <div class="asset-code">
                                            {{ $item->aset->kode_aset ?? '-' }}
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <span class="maintenance-date">
                                    {{ $item->tanggal_masuk
                                        ? \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y')
                                        : '-' }}
                                </span>
                            </td>

                            <td>
                                <div class="complaint-text">
                                    {{ $item->keluhan ?? '-' }}
                                </div>
                            </td>

                            <td>
                                <span class="technician-name">
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

                                <div class="maintenance-actions">

                                    <a href="{{ url('/maintenance/'.$item->id) }}"
                                       class="maintenance-detail-btn"
                                       title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>

    @else

        <div class="maintenance-empty-state">

            <div class="maintenance-empty-icon">
                <i class="bi bi-tools"></i>
            </div>

            <div class="maintenance-empty-title">
                Belum Ada Data Maintenance
            </div>

            <div class="maintenance-empty-text">
                Belum terdapat data maintenance yang sesuai dengan pencarian atau filter.
            </div>

            @if(request('search') || request('status'))

                <a href="{{ url('/maintenance') }}"
                   class="btn btn-light maintenance-empty-btn">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>
                    Reset Filter
                </a>

            @else

                <a href="{{ url('/maintenance/create') }}"
                   class="btn btn-primary maintenance-empty-btn">
                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Maintenance
                </a>

            @endif

        </div>

    @endif

</div>

@endsection