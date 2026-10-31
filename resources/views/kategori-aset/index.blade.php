@extends('layouts.app')

@section('title', 'Kategori Aset')

@section('content')

<style>
    .category-page-header {
        margin-bottom: 24px;
    }

    .category-page-title {
        font-size: 25px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.4px;
        margin-bottom: 5px;
    }

    .category-page-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 0;
    }

    .add-category-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 16px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
    }

    .category-card {
        background: #fff;
        border: 1px solid #e8ecf2;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .035);
        overflow: hidden;
    }

    .category-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f4;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .category-section-title {
        color: #1f2937;
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .category-section-subtitle {
        color: #9ca3af;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .category-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f5f8ff;
        color: #0d6efd;
        border: 1px solid #e1ebff;
        padding: 7px 10px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .category-table {
        margin: 0;
    }

    .category-table thead th {
        background: #f8fafc;
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        border-bottom: 1px solid #e8ecf2;
        padding: 14px 16px;
        white-space: nowrap;
    }

    .category-table tbody td {
        padding: 15px 16px;
        border-bottom: 1px solid #f0f2f5;
        vertical-align: middle;
        font-size: 14px;
    }

    .category-table tbody tr:last-child td {
        border-bottom: none;
    }

    .category-table tbody tr {
        transition: background-color .15s ease;
    }

    .category-table tbody tr:hover {
        background: #fafcff;
    }

    .category-number {
        color: #9ca3af;
        font-size: 13px;
        font-weight: 500;
    }

    .category-name-wrapper {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .category-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #0d6efd;
        flex-shrink: 0;
        font-size: 17px;
    }

    .category-name {
        color: #1f2937;
        font-weight: 600;
    }

    .category-description {
        color: #6b7280;
        max-width: 430px;
        line-height: 1.5;
    }

    .category-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .category-action-btn {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid transparent;
        transition: all .2s ease;
    }

    .category-edit-btn {
        background: #fff8e6;
        color: #b77900;
        border-color: #ffedb8;
    }

    .category-edit-btn:hover {
        background: #ffefbf;
        color: #8f6200;
        transform: translateY(-1px);
    }

    .category-delete-btn {
        background: #fff1f2;
        color: #dc3545;
        border-color: #ffd9dd;
    }

    .category-delete-btn:hover {
        background: #ffe1e4;
        color: #bb2635;
        transform: translateY(-1px);
    }

    .category-empty-state {
        padding: 55px 20px;
        text-align: center;
    }

    .category-empty-icon {
        width: 68px;
        height: 68px;
        margin: 0 auto 16px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f8ff;
        color: #0d6efd;
        font-size: 30px;
    }

    .category-empty-title {
        color: #374151;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .category-empty-text {
        color: #9ca3af;
        font-size: 13px;
        margin: 0;
    }

    @media (max-width: 767.98px) {
        .category-page-header {
            align-items: flex-start !important;
            gap: 15px;
        }

        .category-page-title {
            font-size: 22px;
        }

        .category-page-subtitle {
            font-size: 13px;
        }

        .add-category-btn {
            padding: 9px 12px;
        }

        .category-card-header {
            padding: 17px;
        }

        .category-count {
            display: none;
        }

        .category-table thead th,
        .category-table tbody td {
            padding-left: 14px;
            padding-right: 14px;
        }

        .category-description {
            max-width: 250px;
        }
    }

    @media (max-width: 575.98px) {
        .category-page-header {
            flex-direction: column;
        }

        .add-category-btn {
            width: 100%;
            justify-content: center;
        }

        .category-card {
            border-radius: 13px;
        }

        .category-card-header {
            padding: 16px;
        }

        .category-section-title {
            font-size: 15px;
        }

        .category-section-subtitle {
            font-size: 12px;
        }

        .category-table {
            min-width: 650px;
        }

        .category-empty-state {
            padding: 45px 15px;
        }
    }
</style>


<!-- Header Halaman -->
<div class="category-page-header d-flex justify-content-between align-items-center">

    <div>
        <h3 class="category-page-title">
            Kategori Aset
        </h3>

        <p class="category-page-subtitle">
            Kelola kategori perangkat teknologi informasi.
        </p>
    </div>

    <a href="{{ url('/kategori-aset/create') }}"
       class="btn btn-primary add-category-btn">

        <i class="bi bi-plus-lg"></i>
        <span>Tambah Kategori</span>

    </a>

</div>


<!-- Card Daftar Kategori -->
<div class="category-card">

    <!-- Header Card -->
    <div class="category-card-header">

        <div>
            <h5 class="category-section-title">
                Daftar Kategori Aset
            </h5>

            <p class="category-section-subtitle">
                Daftar kategori perangkat yang digunakan dalam sistem.
            </p>
        </div>

        <div class="category-count">
            <i class="bi bi-folder2"></i>
            {{ $kategori->count() }} Kategori
        </div>

    </div>


    <!-- Tabel -->
    <div class="table-responsive">

        <table class="table category-table align-middle">

            <thead>

                <tr>
                    <th style="width: 70px;" class="ps-4">
                        No
                    </th>

                    <th>
                        Nama Kategori
                    </th>

                    <th>
                        Keterangan
                    </th>

                    <th style="width: 150px;" class="text-center">
                        Aksi
                    </th>
                </tr>

            </thead>


            <tbody>

                @forelse ($kategori as $item)

                    <tr>

                        <!-- Nomor -->
                        <td class="ps-4">
                            <span class="category-number">
                                {{ $loop->iteration }}
                            </span>
                        </td>


                        <!-- Nama Kategori -->
                        <td>

                            <div class="category-name-wrapper">

                                <div class="category-icon">
                                    <i class="bi bi-folder2"></i>
                                </div>

                                <div class="category-name">
                                    {{ $item->nama_kategori }}
                                </div>

                            </div>

                        </td>


                        <!-- Keterangan -->
                        <td>

                            <div class="category-description">

                                @if($item->keterangan)
                                    {{ $item->keterangan }}
                                @else
                                    <span class="text-muted">
                                        Tidak ada keterangan
                                    </span>
                                @endif

                            </div>

                        </td>


                        <!-- Aksi -->
                        <td>

                            <div class="category-actions">

                                <!-- Edit -->
                                <a href="{{ url('/kategori-aset/' . $item->id . '/edit') }}"
                                   class="category-action-btn category-edit-btn"
                                   title="Edit kategori"
                                   aria-label="Edit kategori">

                                    <i class="bi bi-pencil-square"></i>

                                </a>


                                <!-- Hapus -->
                                <form action="{{ url('/kategori-aset/' . $item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="category-action-btn category-delete-btn"
                                            title="Hapus kategori"
                                            aria-label="Hapus kategori"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4">

                            <div class="category-empty-state">

                                <div class="category-empty-icon">
                                    <i class="bi bi-folder2-open"></i>
                                </div>

                                <div class="category-empty-title">
                                    Belum ada kategori aset
                                </div>

                                <p class="category-empty-text">
                                    Tambahkan kategori aset untuk mulai mengelola perangkat.
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