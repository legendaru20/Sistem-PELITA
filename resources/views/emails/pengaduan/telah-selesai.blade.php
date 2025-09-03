@component('mail::message')
# Status Pengaduan Anda: Telah Selesai

Halo {{ $pengaduan->nama_lengkap }},

Dengan senang hati kami informasikan bahwa pengaduan Anda dengan detail berikut:

**Lokasi:** {{ $pengaduan->lokasi_pengaduan }}  
**Deskripsi:** {{ Str::limit($pengaduan->deskripsi_pengaduan, 100) }}

Telah **SELESAI** ditangani oleh tim kami. 

@if($pengaduan->dinas_penanggung_jawab)
Penanganan telah dilakukan oleh **{{ $pengaduan->dinas_penanggung_jawab }}**.
@endif

Terima kasih atas partisipasi Anda dalam membantu mewujudkan lingkungan yang lebih baik. Jika Anda memiliki pertanyaan atau pengaduan lain, jangan ragu untuk menghubungi kami kembali.

Salam,<br>
Tim PELITA
@endcomponent