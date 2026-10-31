@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <style>
        /* =========================
           DASHBOARD
        ========================= */

        .dashboard-header {
            margin-bottom: 28px;
        }

        .dashboard-title {
            font-size: 26px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -0.4px;
        }

        .dashboard-subtitle {
            color: #6b7280;
            font-size: 14px;
        }

        .dashboard-date {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #ffffff;
            color: #6b7280;
            font-size: 13px;
        }

        /* =========================
           STAT CARD
        ========================= */

        .stat-card {
            position: relative;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.07);
        }

        .stat-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 7px;
        }

        .stat-number {
            color: #111827;
            font-size: 27px;
            font-weight: 700;
            line-height: 1;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            flex-shrink: 0;
        }

        .stat-icon.primary {
            background: #eaf2ff;
            color: #0d6efd;
        }

        .stat-icon.success {
            background: #eaf8ef;
            color: #198754;
        }

        .stat-icon.warning {
            background: #fff7df;
            color: #d99a00;
        }

        .stat-icon.secondary {
            background: #f1f3f5;
            color: #6c757d;
        }

        .stat-icon.info {
            background: #e7f8fb;
            color: #0dcaf0;
        }

        .stat-decoration {
            position: absolute;
            right: -25px;
            bottom: -35px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(13, 110, 253, 0.025);
        }

        /* =========================
           SECTION CARD
        ========================= */

        .dashboard-section {
            padding: 22px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .section-description {
            color: #9ca3af;
            font-size: 12px;
            margin-bottom: 0;
        }

        /* =========================
           VIEW ALL BUTTON
        ========================= */

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            padding: 7px 11px;
            transition: all 0.2s ease;
        }

        .view-all-btn:hover {
            transform: translateX(2px);
        }

        /* =========================
           TABLE
        ========================= */

        .dashboard-table {
            margin-top: 18px;
        }

        .dashboard-table thead th {
            background: #f8fafc;
            color: #6b7280;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.2px;
            padding: 12px 14px;
        }

        .dashboard-table tbody td {
            color: #374151;
            font-size: 13px;
            padding: 13px 14px;
        }

        .asset-code {
            display: inline-flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 7px;
            background: #f3f6fa;
            color: #374151;
            font-size: 12px;
            font-weight: 600;
        }

        .asset-name {
            font-weight: 600;
            color: #1f2937;
        }

        /* =========================
           STATUS BADGE
        ========================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-active {
            background: #eaf8ef;
            color: #198754;
        }

        .status-maintenance {
            background: #fff5d9;
            color: #9a6b00;
        }

        .status-inactive {
            background: #f0f1f3;
            color: #6c757d;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            padding: 50px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 15px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f6fa;
            color: #9ca3af;
            font-size: 25px;
        }

        .empty-title {
            color: #374151;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .empty-description {
            color: #9ca3af;
            font-size: 12px;
            margin-bottom: 0;
        }

        /* =========================
           SYSTEM INFORMATION
        ========================= */

        .system-icon {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eaf2ff;
            color: #0d6efd;
            font-size: 22px;
            flex-shrink: 0;
        }

        .system-description {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.7;
        }

        /* =========================
           QUICK ACCESS
        ========================= */

        .quick-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 11px 13px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .quick-action:hover {
            transform: translateX(2px);
        }

        .quick-action-content {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .quick-action-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #f3f6fa;
            color: #6b7280;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 767.98px) {

            .dashboard-header {
                margin-bottom: 20px;
            }

            .dashboard-title {
                font-size: 22px;
            }

            .dashboard-date {
                display: none;
            }

            .dashboard-section {
                padding: 17px;
            }

            .stat-number {
                font-size: 24px;
            }

            .stat-icon {
                width: 43px;
                height: 43px;
                border-radius: 11px;
                font-size: 19px;
            }

            .dashboard-table {
                margin-top: 14px;
            }

            .dashboard-table thead th,
            .dashboard-table tbody td {
                padding: 11px 12px;
            }
        }
    </style>


    {{-- =========================
         HEADER DASHBOARD
    ========================= --}}
    <div class="dashboard-header d-flex justify-content-between align-items-center">

        <div>

            <h1 class="dashboard-title mb-1">
                Dashboard
            </h1>

            <p class="dashboard-subtitle mb-0">
                Selamat datang kembali,
                <strong class="text-dark">
                    {{ auth()->user()->name }}
                </strong>
                👋
            </p>

        </div>


        <div class="dashboard-date">

            <i class="bi bi-calendar3"></i>

            <span>
                {{ date('d M Y') }}
            </span>

        </div>

    </div>


    {{-- =========================
         STATISTIK UTAMA
    ========================= --}}
    <div class="row g-3 mb-3">

        {{-- TOTAL ASET --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="page-card stat-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-start position-relative">

                    <div>

                        <div class="stat-label">
                            Total Aset
                        </div>

                        <div class="stat-number">
                            {{ $totalAset }}
                        </div>

                    </div>

                    <div class="stat-icon primary">
                        <i class="bi bi-laptop"></i>
                    </div>

                </div>

                <div class="stat-decoration"></div>

            </div>

        </div>


        {{-- ASET AKTIF --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="page-card stat-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-start position-relative">

                    <div>

                        <div class="stat-label">
                            Aset Aktif
                        </div>

                        <div class="stat-number">
                            {{ $asetAktif }}
                        </div>

                    </div>

                    <div class="stat-icon success">
                        <i class="bi bi-check-circle"></i>
                    </div>

                </div>

                <div class="stat-decoration"></div>

            </div>

        </div>


        {{-- MAINTENANCE --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="page-card stat-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-start position-relative">

                    <div>

                        <div class="stat-label">
                            Maintenance
                        </div>

                        <div class="stat-number">
                            {{ $asetMaintenance }}
                        </div>

                    </div>

                    <div class="stat-icon warning">
                        <i class="bi bi-tools"></i>
                    </div>

                </div>

                <div class="stat-decoration"></div>

            </div>

        </div>


        {{-- TIDAK AKTIF --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="page-card stat-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-start position-relative">

                    <div>

                        <div class="stat-label">
                            Aset Tidak Aktif
                        </div>

                        <div class="stat-number">
                            {{ $asetTidakAktif }}
                        </div>

                    </div>

                    <div class="stat-icon secondary">
                        <i class="bi bi-box"></i>
                    </div>

                </div>

                <div class="stat-decoration"></div>

            </div>

        </div>

    </div>


    {{-- =========================
         STATISTIK KATEGORI
    ========================= --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="page-card stat-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-start position-relative">

                    <div>

                        <div class="stat-label">
                            Kategori Aset
                        </div>

                        <div class="stat-number">
                            {{ $totalKategori }}
                        </div>

                    </div>

                    <div class="stat-icon info">
                        <i class="bi bi-folder"></i>
                    </div>

                </div>

                <div class="stat-decoration"></div>

            </div>

        </div>

    </div>


    {{-- =========================
         ASET TERBARU
    ========================= --}}
    <div class="row g-3 mb-3">

        <div class="col-12">

            <div class="page-card dashboard-section">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h5 class="section-title">
                            Aset Terbaru
                        </h5>

                        <p class="section-description">
                            Data aset yang baru ditambahkan ke sistem.
                        </p>

                    </div>


                    <a href="{{ url('/aset') }}"
                       class="btn btn-sm btn-outline-primary view-all-btn">

                        <span>Lihat Semua</span>

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>


                @if($asetTerbaru->count() > 0)

                    <div class="table-responsive dashboard-table">

                        <table class="table table-hover align-middle mb-0">

                            <thead>

                                <tr>

                                    <th>Kode Aset</th>

                                    <th>Nama Aset</th>

                                    <th>Kategori</th>

                                    <th>Pengguna</th>

                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($asetTerbaru as $aset)

                                    <tr>

                                        <td>

                                            <span class="asset-code">
                                                {{ $aset->kode_aset }}
                                            </span>

                                        </td>


                                        <td>

                                            <span class="asset-name">
                                                {{ $aset->nama_aset }}
                                            </span>

                                        </td>


                                        <td>
                                            {{ $aset->kategori->nama_kategori ?? '-' }}
                                        </td>


                                        <td>
                                            {{ $aset->pengguna ?? '-' }}
                                        </td>


                                        <td>

                                            @if($aset->status === 'Aktif')

                                                <span class="status-badge status-active">

                                                    <i class="bi bi-check-circle"></i>

                                                    Aktif

                                                </span>

                                            @elseif($aset->status === 'Maintenance')

                                                <span class="status-badge status-maintenance">

                                                    <i class="bi bi-tools"></i>

                                                    Maintenance

                                                </span>

                                            @else

                                                <span class="status-badge status-inactive">

                                                    <i class="bi bi-box"></i>

                                                    Tidak Aktif

                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-laptop"></i>

                        </div>

                        <div class="empty-title">
                            Belum ada data aset
                        </div>

                        <p class="empty-description">
                            Data aset terbaru akan muncul di sini.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =========================
         MAINTENANCE TERBARU
    ========================= --}}
    <div class="row g-3 mb-4">

        <div class="col-12">

            <div class="page-card dashboard-section">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h5 class="section-title">
                            Maintenance Terbaru
                        </h5>

                        <p class="section-description">
                            Riwayat maintenance terbaru.
                        </p>

                    </div>


                    <a href="{{ url('/maintenance') }}"
                       class="btn btn-sm btn-outline-primary view-all-btn">

                        <span>Lihat Semua</span>

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>


                @if($maintenanceTerbaru->count() > 0)

                    <div class="table-responsive dashboard-table">

                        <table class="table table-hover align-middle mb-0">

                            <thead>

                                <tr>

                                    <th>Tanggal</th>

                                    <th>Kode Aset</th>

                                    <th>Nama Aset</th>

                                    <th>Keluhan</th>

                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($maintenanceTerbaru as $item)

                                    <tr>

                                        <td>
                                            {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d/m/Y') }}
                                        </td>


                                        <td>

                                            <span class="asset-code">
                                                {{ $item->aset->kode_aset ?? '-' }}
                                            </span>

                                        </td>


                                        <td>

                                            <span class="asset-name">
                                                {{ $item->aset->nama_aset ?? '-' }}
                                            </span>

                                        </td>


                                        <td>

                                            <div style="max-width: 300px;">
                                                {{ \Illuminate\Support\Str::limit($item->keluhan, 60) }}
                                            </div>

                                        </td>


                                        <td>

                                            @if($item->status === 'Proses')

                                                <span class="status-badge status-maintenance">

                                                    <i class="bi bi-tools"></i>

                                                    Proses

                                                </span>

                                            @else

                                                <span class="status-badge status-active">

                                                    <i class="bi bi-check-circle"></i>

                                                    Selesai

                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-tools"></i>

                        </div>

                        <div class="empty-title">
                            Belum ada data maintenance
                        </div>

                        <p class="empty-description">
                            Riwayat maintenance akan muncul di sini.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =========================
         INFORMASI SISTEM & AKSES CEPAT
    ========================= --}}
    <div class="row g-3">

        {{-- INFORMASI SISTEM --}}
        <div class="col-12 col-lg-8">

            <div class="page-card dashboard-section h-100">

                <div class="d-flex align-items-center mb-3">

                    <div class="system-icon me-3">

                        <i class="bi bi-pc-display-horizontal"></i>

                    </div>

                    <div>

                        <h5 class="section-title">
                            IT Asset Management
                        </h5>

                        <p class="section-description">
                            Sistem manajemen aset teknologi informasi.
                        </p>

                    </div>

                </div>


                <p class="system-description mb-0">

                    Gunakan sistem ini untuk mengelola data aset,
                    memantau kondisi perangkat, mencatat maintenance,
                    dan membuat laporan aset teknologi informasi.

                </p>

            </div>

        </div>


        {{-- AKSES CEPAT --}}
        <div class="col-12 col-lg-4">

            <div class="page-card dashboard-section h-100">

                <h5 class="section-title mb-3">
                    Akses Cepat
                </h5>


                <div class="d-grid gap-2">

                    <a href="{{ url('/kategori-aset/create') }}"
                       class="btn btn-primary quick-action">

                        <span class="quick-action-content">

                            <span class="quick-action-icon">
                                <i class="bi bi-plus-lg"></i>
                            </span>

                            <span>
                                Tambah Kategori
                            </span>

                        </span>

                        <i class="bi bi-chevron-right"></i>

                    </a>


                    <a href="{{ url('/kategori-aset') }}"
                       class="btn btn-light border quick-action">

                        <span class="quick-action-content">

                            <span class="quick-action-icon">
                                <i class="bi bi-folder"></i>
                            </span>

                            <span>
                                Lihat Kategori Aset
                            </span>

                        </span>

                        <i class="bi bi-chevron-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection