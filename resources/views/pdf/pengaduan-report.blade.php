<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan #{{ $pengaduan->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo {
            max-height: 80px;
        }
        h1 {
            font-size: 24px;
            color: #2e7d32;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 16px;
            color: #555;
        }
        table.info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table.info td {
            padding: 8px 15px;
        }
        table.info tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .label {
            font-weight: bold;
            width: 40%;
            vertical-align: top;
        }
        .description {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: bold;
        }
        .status-sedang {
            background-color: #2196F3;
            color: white;
        }
        .status-selesai {
            background-color: #4CAF50;
            color: white;
        }
        .images-container {
            margin: 20px 0;
        }
        .image-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .images {
            display: flex;
            flex-wrap: wrap;
        }
        .image-item {
            width: 48%;
            margin-right: 2%;
            margin-bottom: 15px;
        }
        .image-item img {
            width: 100%;
            border: 1px solid #ddd;
        }
        .signatures {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature-block {
            width: 45%;
            text-align: center;
        }
        .signature-line {
            margin-top: 70px;
            border-bottom: 1px solid #000;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        .verification {
            text-align: right;
            margin-top: 40px;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .metadata {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-container">
                <img src="{{ public_path('images/logo-pelita.png') }}" class="logo" alt="Logo PELITA">
            </div>
            <h1>LAPORAN PENGADUAN LINGKUNGAN</h1>
            <p class="subtitle">Platform Peduli Lingkungan Tulungagung (PELITA)</p>
        </div>
        
        <h2>Informasi Pengaduan</h2>
        <table class="info">
            <tr>
                <td class="label">ID Pengaduan</td>
                <td>{{ $pengaduan->id }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Pengaduan</td>
                <td>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d F Y H:i') }}</td>
            </tr>
            <tr>
                <td class="label">Status</td>
                <td>
                    <span class="status {{ $pengaduan->status === 'sedang_diatasi' ? 'status-sedang' : 'status-selesai' }}">
                        {{ $pengaduan->status === 'sedang_diatasi' ? 'Sedang Diatasi' : 'Telah Selesai' }}
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">Dinas Penanggung Jawab</td>
                <td>{{ $pengaduan->dinas_penanggung_jawab }}</td>
            </tr>
            @if($pengaduan->status === 'telah_selesai')
                <tr>
                    <td class="label">Tanggal Selesai</td>
                    <td>{{ \Carbon\Carbon::parse($pengaduan->updated_at)->format('d F Y H:i') }}</td>
                </tr>
            @endif
        </table>

        <h2>Detail Pengaduan</h2>
        <table class="info">
            <tr>
                <td class="label">Pelapor</td>
                <td>{{ $pengaduan->nama_lengkap }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td>{{ $pengaduan->nik }}</td>
            </tr>
            <tr>
                <td class="label">Kontak</td>
                <td>
                    Email: {{ $pengaduan->email }}<br>
                    Telepon: {{ $pengaduan->nomor_wa }}
                </td>
            </tr>
            <tr>
                <td class="label">Lokasi Pengaduan</td>
                <td>{{ $pengaduan->lokasi_pengaduan }}</td>
            </tr>
        </table>

        <h2>Deskripsi Masalah</h2>
        <div class="description">
            {{ $pengaduan->deskripsi_pengaduan }}
        </div>

        <div class="images-container">
            <div class="image-title">Foto Lampiran:</div>
            <div class="images">
                @foreach((is_array($pengaduan->lampiran_foto) ? $pengaduan->lampiran_foto : json_decode($pengaduan->lampiran_foto)) as $index => $photo)
                    <div class="image-item">
                        <img src="{{ public_path('storage/' . $photo) }}" alt="Foto Pengaduan {{ $index + 1 }}">
                        <p>Foto {{ $index + 1 }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="signatures">
            <div class="signature-block">
                <p>Diketahui oleh,</p>
                <div class="signature-line"></div>
                <p>Admin PELITA</p>
            </div>
            <div class="signature-block">
                <p>Penanggung Jawab,</p>
                <div class="signature-line"></div>
                <p>{{ $pengaduan->dinas_penanggung_jawab }}</p>
            </div>
        </div>

        <div class="verification">
            <div class="qr-code">
                {!! QrCode::size(100)->generate($qrData) !!}
                <p>Scan untuk verifikasi</p>
            </div>
        </div>

        <div class="footer">
            <p>Dokumen ini diterbitkan oleh Platform Peduli Lingkungan Tulungagung (PELITA)</p>
            <p>Jl. Lingkungan Sehat No. 1, Tulungagung, Jawa Timur</p>
        </div>
        
        <div class="metadata">
            <p>Dicetak pada: {{ $tanggal_cetak }}</p>
        </div>
    </div>
</body>
</html>