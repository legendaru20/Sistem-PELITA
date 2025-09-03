@component('mail::message')
# Status Pengaduan Anda: Pending

Halo {{ $pengaduan->nama_lengkap }},

Kami informasikan bahwa status pengaduan Anda dengan detail berikut:

**Lokasi:** {{ $pengaduan->lokasi_pengaduan }}  
**Deskripsi:** {{ Str::limit($pengaduan->deskripsi_pengaduan, 100) }}

Saat ini masih dalam status **Pending**. Tim kami sedang mempelajari pengaduan Anda sebelum meneruskannya ke dinas terkait.

Terima kasih atas kesabaran Anda.

Salam,<br>
Tim PELITA
@endcomponent