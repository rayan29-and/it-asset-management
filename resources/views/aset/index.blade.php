@extends('layouts.app')

@section('title', 'Data Aset')

@section('content')

    <style>
        /* =========================
           DATA ASET
        ========================= */

        .asset-page-header {
            margin-bottom: 26px;
        }

        .asset-page-title {
            font-size: 25px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -0.3px;
        }

        .asset-page-subtitle {
            color: #6b7280;
            font-size: 13px;
        }

        /* =========================
           HEADER BUTTON
        ========================= */

        .add-asset-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        /* =========================
           ALERT
        ========================= */

        .asset-alert {
            border-radius: 12px;
            border: 1px solid #ccebd8 !important;
            background: #f0fbf4;
            color: #146c43;
        }

        /* =========================
           SEARCH CARD
        ========================= */

        .filter-card {
            padding: 18px;
            margin-bottom: 22px;
        }

        .search-group .input-group-text {
            border-color: #dfe4ea;
            color: #9ca3af;
            border-radius: 10px 0 0 10px;
        }

        .search-group .form-control {
            border-left: 0;
            border-right: 0;
            border-radius: 0;
            min-height: 43px;
        }

        .search-group .form-control:focus {
            border-left: 0;
            border-right: 0;
        }

        .search-group .btn {
            min-height: 43px;
            border-radius: 0 10px 10px 0;
            padding-left: 16px;
            padding-right: 16px;
        }

        /* =========================
           FILTER BUTTON
        ========================= */

        .status-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .status-filter .btn {
            font-size: 12px;
            padding: 8px 11px;
            border-radius: 9px;
        }

        /* =========================
           TABLE CARD
        ========================= */

        .asset-table-header {
            padding: 20px 22px;
            border-bottom: 1px solid #eef0f3;
        }

        .asset-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }

        .asset-section-description {
            font-size: 12px;
            color: #9ca3af;
        }

        .asset-count {
            background: #f8fafc;
            color: #667085;
            border: 1px solid #e5e7eb !important;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 600;
        }

        /* =========================
           TABLE
        ========================= */

        .asset-table {
            margin-bottom: 0;
        }

        .asset-table thead th {
            background: #f8fafc;
            color: #667085;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.2px;
            border-bottom: 1px solid #e9edf2;
            padding: 13px 14px;
            white-space: nowrap;
        }

        .asset-table tbody td {
            color: #374151;
            font-size: 13px;
            padding: 14px;
            border-color: #f0f2f5;
            vertical-align: middle;
        }

        .asset-table tbody tr {
            transition: background-color 0.15s ease;
        }

        .asset-table tbody tr:hover {
            background-color: #fafcff;
        }

        /* =========================
           ASSET CODE
        ========================= */

        .asset-code {
            display: inline-flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 7px;
            background: #f3f6fa;
            color: #374151;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.2px;
        }

        /* =========================
           ASSET NAME
        ========================= */

        .asset-name {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .asset-meta {
            color: #9ca3af;
            font-size: 11px;
        }

        /* =========================
           STATUS
        ========================= */

        .asset-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .asset-status-active {
            background: #eaf8ef;
            color: #198754;
        }

        .asset-status-maintenance {
            background: #fff5d9;
            color: #946d00;
        }

        .asset-status-inactive {
            background: #f0f1f3;
            color: #6c757d;
        }

        /* =========================
           ACTION BUTTON
        ========================= */

        .asset-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .asset-action-btn {
            min-width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            border-radius: 9px;
            font-size: 12px;
            transition: all 0.2s ease;
        }

        .asset-action-btn:hover {
            transform: translateY(-1px);
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .asset-empty-state {
            padding: 55px 20px;
            text-align: center;
        }

        .asset-empty-icon {
            width: 62px;
            height: 62px;
            margin: 0 auto 15px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f6fa;
            color: #9ca3af;
            font-size: 27px;
        }

        .asset-empty-title {
            color: #374151;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .asset-empty-description {
            color: #9ca3af;
            font-size: 12px;
            margin-bottom: 0;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 767.98px) {

            .asset-page-header {
                margin-bottom: 20px;
            }

            .asset-page-title {
                font-size: 22px;
            }

            .asset-page-subtitle {
                font-size: 12px;
            }

            .add-asset-btn {
                padding: 9px 11px;
                font-size: 12px;
            }

            .filter-card {
                padding: 14px;
            }

            .asset-table-header {
                padding: 17px;
            }

            .asset-table thead th,
            .asset-table tbody td {
                padding: 11px 12px;
            }

            .asset-actions {
                justify-content: flex-start;
            }
        }

        @media (max-width: 575.98px) {

            .asset-page-header {
                align-items: flex-start !important;
                gap: 12px;
            }

            .asset-page-header .add-asset-btn {
                white-space: nowrap;
            }

            .search-group .btn {
                padding-left: 12px;
                padding-right: 12px;
            }

            .status-filter {
                gap: 6px;
            }

            .status-filter .btn {
                padding: 7px 9px;
            }

            .asset-count {
                font-size: 10px;
            }
        }
    </style>


    {{-- =========================
         SUCCESS ALERT
    ========================= --}}
    @if(session('success'))

        <div class="alert asset-alert alert-dismissible fade show shadow-sm mb-4"
             role="alert">

            <div class="d-flex align-items-center">

                <i class="bi bi-check-circle-fill fs-5 me-2"></i>

                <div>

                    <strong>Berhasil!</strong>

                    {{ session('success') }}

                </div>

                <button type="button"
                        class="btn-close ms-auto"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>

            </div>

        </div>

    @endif


    {{-- =========================
         HEADER
    ========================= --}}
    <div class="asset-page-header d-flex justify-content-between align-items-center">

        <div>

            <h1 class="asset-page-title mb-1">
                Data Aset
            </h1>

            <p class="asset-page-subtitle mb-0">
                Kelola seluruh aset teknologi informasi.
            </p>

        </div>


        <a href="{{ url('/aset/create') }}"
           class="btn btn-primary add-asset-btn">

            <i class="bi bi-plus-lg"></i>

            <span>Tambah Aset</span>

        </a>

    </div>


    {{-- =========================
         SEARCH & FILTER
    ========================= --}}
    <div class="page-card filter-card">

        <form action="{{ url('/aset') }}" method="GET">

            {{-- SEARCH --}}
            <div class="search-group">

                <div class="input-group">

                    <span class="input-group-text bg-white">

                        <i class="bi bi-search"></i>

                    </span>


                    <input type="text"
                           class="form-control"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari kode aset, nama perangkat, pengguna, lokasi...">


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-search me-1"></i>

                        Cari

                    </button>

                </div>

            </div>


            {{-- FILTER STATUS --}}
            <div class="status-filter mt-3">

                {{-- SEMUA --}}
                <a href="{{ request()->fullUrlWithQuery(['status' => null]) }}"
                   class="btn {{ !request('status') ? 'btn-primary' : 'btn-outline-primary' }}">

                    <i class="bi bi-grid me-1"></i>

                    Semua

                </a>


                {{-- AKTIF --}}
                <a href="{{ request()->fullUrlWithQuery(['status' => 'Aktif']) }}"
                   class="btn {{ request('status') === 'Aktif' ? 'btn-success' : 'btn-outline-success' }}">

                    <i class="bi bi-check-circle me-1"></i>

                    Aktif

                </a>


                {{-- MAINTENANCE --}}
                <a href="{{ request()->fullUrlWithQuery(['status' => 'Maintenance']) }}"
                   class="btn {{ request('status') === 'Maintenance' ? 'btn-warning' : 'btn-outline-warning' }}">

                    <i class="bi bi-tools me-1"></i>

                    Maintenance

                </a>


                {{-- TIDAK AKTIF --}}
                <a href="{{ request()->fullUrlWithQuery(['status' => 'Tidak Aktif']) }}"
                   class="btn {{ request('status') === 'Tidak Aktif' ? 'btn-secondary' : 'btn-outline-secondary' }}">

                    <i class="bi bi-box me-1"></i>

                    Tidak Aktif

                </a>


                {{-- RESET --}}
                @if(request('search') || request('status'))

                    <a href="{{ url('/aset') }}"
                       class="btn btn-outline-danger">

                        <i class="bi bi-arrow-counterclockwise me-1"></i>

                        Reset

                    </a>

                @endif

            </div>

        </form>

    </div>


    {{-- =========================
         DAFTAR ASET
    ========================= --}}
    <div class="page-card overflow-hidden">

        {{-- HEADER TABLE --}}
        <div class="asset-table-header">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="asset-section-title mb-1">
                        Daftar Aset
                    </h5>

                    <p class="asset-section-description mb-0">
                        Daftar perangkat teknologi informasi yang terdaftar.
                    </p>

                </div>


                <span class="asset-count">

                    <i class="bi bi-laptop me-1"></i>

                    {{ $aset->count() }} Aset

                </span>

            </div>

        </div>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table asset-table">

                <thead>

                    <tr>

                        <th class="px-4">
                            No
                        </th>

                        <th>
                            Kode Aset
                        </th>

                        <th>
                            Nama Aset
                        </th>

                        <th>
                            Pengguna
                        </th>

                        <th>
                            Lokasi
                        </th>

                        <th>
                            Status
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($aset as $item)

                        <tr>

                            {{-- NO --}}
                            <td class="px-4 text-muted">

                                {{ $loop->iteration }}

                            </td>


                            {{-- KODE ASET --}}
                            <td>

                                <span class="asset-code">

                                    {{ $item->kode_aset }}

                                </span>

                            </td>


                            {{-- NAMA ASET --}}
                            <td>

                                <div class="asset-name">

                                    {{ $item->nama_aset }}

                                </div>

                                <div class="asset-meta">

                                    {{ $item->merk ?? '-' }}

                                    {{ $item->model ?? '' }}

                                </div>

                            </td>


                            {{-- PENGGUNA --}}
                            <td>

                                <span class="text-dark">

                                    {{ $item->pengguna ?? '-' }}

                                </span>

                            </td>


                            {{-- LOKASI --}}
                            <td>

                                <span class="text-muted">

                                    {{ $item->lokasi ?? '-' }}

                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($item->status === 'Aktif')

                                    <span class="asset-status asset-status-active">

                                        <i class="bi bi-check-circle"></i>

                                        Aktif

                                    </span>

                                @elseif ($item->status === 'Maintenance')

                                    <span class="asset-status asset-status-maintenance">

                                        <i class="bi bi-tools"></i>

                                        Maintenance

                                    </span>

                                @else

                                    <span class="asset-status asset-status-inactive">

                                        <i class="bi bi-box"></i>

                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="asset-actions">

                                    {{-- DETAIL --}}
                                    <a href="{{ url('/aset/' . $item->id) }}"
                                       class="btn btn-sm btn-light border asset-action-btn"
                                       title="Detail">

                                        <i class="bi bi-eye"></i>

                                        <span class="d-none d-lg-inline">
                                            Detail
                                        </span>

                                    </a>


                                    {{-- EDIT --}}
                                    <a href="{{ url('/aset/' . $item->id . '/edit') }}"
                                       class="btn btn-sm btn-warning asset-action-btn"
                                       title="Edit">

                                        <i class="bi bi-pencil-square"></i>

                                        <span class="d-none d-lg-inline">
                                            Edit
                                        </span>

                                    </a>


                                    {{-- CETAK LAPORAN --}}
                                    @if ($item->status === 'Maintenance')

                                        <a href="{{ route('aset.laporan', $item->id) }}"
                                           class="btn btn-sm btn-outline-danger asset-action-btn"
                                           title="Cetak Laporan"
                                           target="_blank">

                                            <i class="bi bi-file-earmark-pdf"></i>

                                            <span class="d-none d-lg-inline">
                                                Cetak
                                            </span>

                                        </a>

                                    @endif


                                    {{-- HAPUS --}}
                                    <form action="{{ url('/aset/' . $item->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger asset-action-btn"
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus aset {{ $item->kode_aset }}?')">

                                            <i class="bi bi-trash"></i>

                                            <span class="d-none d-lg-inline">
                                                Hapus
                                            </span>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        {{-- EMPTY STATE --}}
                        <tr>

                            <td colspan="7">

                                <div class="asset-empty-state">

                                    <div class="asset-empty-icon">

                                        <i class="bi bi-laptop"></i>

                                    </div>


                                    <div class="asset-empty-title">

                                        Belum ada data aset

                                    </div>


                                    <p class="asset-empty-description">

                                        Data perangkat IT yang ditambahkan
                                        akan muncul di sini.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection