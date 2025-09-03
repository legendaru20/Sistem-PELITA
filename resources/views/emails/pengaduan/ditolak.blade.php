@component('mail::message')
# Status Pengaduan Anda: Ditolak

Halo {{ $pengaduan->nama_lengkap }},

Kami informasikan bahwa pengaduan Anda dengan detail berikut:

**Lokasi:** {{ $pengaduan->lokasi_pengaduan }}  
**Deskripsi:** {{ Str::limit($pengaduan->deskripsi_pengaduan, 100) }}

Saat ini berstatus **Ditolak**. 

Pengaduan mungkin ditolak karena berbagai alasan, seperti kurangnya informasi yang cukup, lokasi di luar area layanan kami, atau masalah tersebut tidak termasuk dalam ruang lingkup penanganan kami.

Anda dapat mengirimkan pengaduan baru dengan informasi yang lebih lengkap atau menghubungi kami secara langsung untuk panduan lebih lanjut.

Salam,<br>
Tim PELITA
@endcomponent