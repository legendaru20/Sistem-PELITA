@component('mail::message')
# Pengaduan Anda Telah Diterima

Halo {{ $pengaduan->nama_lengkap }},

Terima kasih telah menyampaikan pengaduan Anda. Pengaduan Anda dengan detail berikut telah kami terima:

**Lokasi:** {{ $pengaduan->lokasi_pengaduan }}  
**Deskripsi:** {{ Str::limit($pengaduan->deskripsi_pengaduan, 100) }}

Pengaduan Anda saat ini dalam status **Pending**. Tim kami akan segera meninjau pengaduan Anda.

Terima kasih atas kontribusi Anda untuk lingkungan yang lebih baik.

Salam,<br>
Tim PELITA
@endcomponent