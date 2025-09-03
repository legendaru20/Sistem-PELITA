@component('mail::message')
# Status Pengaduan Anda: Sedang Diatasi

Halo {{ $pengaduan->nama_lengkap }},

Kami informasikan bahwa pengaduan Anda dengan detail berikut:

**Lokasi:** {{ $pengaduan->lokasi_pengaduan }}  
**Deskripsi:** {{ Str::limit($pengaduan->deskripsi_pengaduan, 100) }}

Saat ini sedang dalam proses penanganan oleh **{{ $pengaduan->dinas_penanggung_jawab }}**.

Kami akan memberikan update selanjutnya saat ada perkembangan baru.

Terima kasih atas laporan Anda untuk lingkungan yang lebih baik.

Salam,<br>
Tim PELITA
@endcomponent