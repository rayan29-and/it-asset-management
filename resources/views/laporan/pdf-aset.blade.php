<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Laporan Maintenance {{ $aset->kode_aset }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #222;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 25px 30px;
        }

        /* HEADER */
        .header {
            width: 100%;
            border-bottom: 2px solid #222;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: middle;
        }

        .company-name {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .company-subtitle {
            font-size: 10px;
            color: #555;
        }

        .document-title {
            text-align: right;
            font-size: 15px;
            font-weight: bold;
        }

        .document-number {
            text-align: right;
            font-size: 10px;
            color: #666;
            margin-top: 4px;
        }

        /* TITLE */
        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            font-size: 10px;
            margin-bottom: 20px;
        }

        /* SECTION */
        .section-title {
            background: #f1f3f5;
            border-left: 4px solid #333;
            padding: 8px 10px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        /* TABLE */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .info-table td {
            border: 1px solid #dcdcdc;
            padding: 8px;
            vertical-align: top;
        }

        .label {
            width: 22%;
            font-weight: bold;
            background: #f8f9fa;
        }

        .value {
            width: 28%;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 5px 10px;
            font-weight: bold;
            border-radius: 4px;
        }

        .status-proses {
            background: #fff3cd;
            color: #856404;
        }

        .status-maintenance {
            background: #fff3cd;
            color: #856404;
        }

        /* TEXT BOX */
        .text-box {
            border: 1px solid #dcdcdc;
            padding: 10px;
            min-height: 55px;
            line-height: 1.6;
        }

        /* FOOTER */
        .footer {
            margin-top: 35px;
            font-size: 9px;
            color: #777;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 8px;
        }

        /* SIGNATURE */
        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
        }

        .signature-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .signature-space {
            height: 65px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }

        .small {
            font-size: 9px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">
        <table class="header-table">
            <tr>
                <td>
                    <div class="company-name">
                        IT SUPPORT
                    </div>

                    <div class="company-subtitle">
                        Sistem Informasi Inventaris dan Pemeliharaan Aset Teknologi Informasi
                    </div>
                </td>

                <td>
                    <div class="document-title">
                        LAPORAN MAINTENANCE
                    </div>

                    <div class="document-number">
                        Kode Aset: {{ $aset->kode_aset }}
                    </div>
                </td>
            </tr>
        </table>
    </div>


    {{-- JUDUL --}}
    <div class="title">
        LAPORAN PEMELIHARAAN ASET TEKNOLOGI INFORMASI
    </div>

    <div class="subtitle">
        Laporan kondisi dan proses maintenance aset
    </div>


    {{-- INFORMASI ASET --}}
    <div class="section-title">
        A. INFORMASI ASET
    </div>

    <table class="info-table">

        <tr>
            <td class="label">
                Kode Aset
            </td>

            <td class="value">
                {{ $aset->kode_aset }}
            </td>

            <td class="label">
                Nama Aset
            </td>

            <td class="value">
                {{ $aset->nama_aset }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Kategori
            </td>

            <td class="value">
                {{ $aset->kategori->nama_kategori ?? '-' }}
            </td>

            <td class="label">
                Merk
            </td>

            <td class="value">
                {{ $aset->merk ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Model
            </td>

            <td class="value">
                {{ $aset->model ?? '-' }}
            </td>

            <td class="label">
                Nomor Seri
            </td>

            <td class="value">
                {{ $aset->nomor_seri ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Pengguna
            </td>

            <td class="value">
                {{ $aset->pengguna ?? '-' }}
            </td>

            <td class="label">
                Lokasi
            </td>

            <td class="value">
                {{ $aset->lokasi ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Kondisi
            </td>

            <td class="value">
                {{ $aset->kondisi }}
            </td>

            <td class="label">
                Status Aset
            </td>

            <td class="value">
                <span class="status status-maintenance">
                    {{ $aset->status }}
                </span>
            </td>
        </tr>

    </table>


    {{-- INFORMASI MAINTENANCE --}}
    <div class="section-title">
        B. INFORMASI MAINTENANCE
    </div>

    <table class="info-table">

        <tr>
            <td class="label">
                Tanggal Masuk
            </td>

            <td class="value">
                {{ \Carbon\Carbon::parse($maintenance->tanggal_masuk)->format('d/m/Y') }}
            </td>

            <td class="label">
                Status
            </td>

            <td class="value">
                <span class="status status-proses">
                    {{ $maintenance->status }}
                </span>
            </td>
        </tr>

        <tr>
            <td class="label">
                Teknisi
            </td>

            <td class="value">
                {{ $maintenance->teknisi ?? '-' }}
            </td>

            <td class="label">
                Tanggal Selesai
            </td>

            <td class="value">
                -
            </td>
        </tr>

    </table>


    {{-- KELUHAN --}}
    <div class="section-title">
        C. KELUHAN / PERMASALAHAN
    </div>

    <div class="text-box">
        {{ $maintenance->keluhan }}
    </div>


    {{-- TINDAKAN --}}
    <div class="section-title">
        D. TINDAKAN MAINTENANCE
    </div>

    <div class="text-box">
        {{ $maintenance->tindakan ?? 'Belum ada tindakan yang dicatat.' }}
    </div>


    {{-- KETERANGAN --}}
    <div class="section-title">
        E. KETERANGAN
    </div>

    <div class="text-box">
        {{ $maintenance->keterangan ?? '-' }}
    </div>


    {{-- TANDA TANGAN --}}
    <table class="signature-table">

        <tr>

            <td>
                Mengetahui,<br>
                IT Support

                <div class="signature-space"></div>

                <div class="signature-name">
                    ........................................
                </div>

                <div class="small">
                    Teknisi / IT Support
                </div>
            </td>

            <td>
                Dibuat pada,<br>
                {{ \Carbon\Carbon::now()->format('d/m/Y') }}

                <div class="signature-space"></div>

                <div class="signature-name">
                    ........................................
                </div>

                <div class="small">
                    Penanggung Jawab
                </div>
            </td>

        </tr>

    </table>


    {{-- FOOTER --}}
    <div class="footer">
        Dokumen ini dibuat melalui Sistem Informasi Inventaris dan Pemeliharaan Aset Teknologi Informasi.
    </div>

</div>

</body>
</html>