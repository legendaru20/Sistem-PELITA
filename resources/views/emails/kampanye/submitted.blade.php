<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('images/logo.png') }}" alt="Pelita Logo" style="max-width: 200px; height: auto;">
</div>

# Terima Kasih Atas Pengajuan Kampanye Anda

Halo {{ $kampanye->nama_pengaju }},

Kami telah menerima pengajuan kampanye Anda "{{ $kampanye->judul_kampanye }}". Tim kami akan segera meninjau dan memverifikasi kampanye yang Anda ajukan.

## Detail Kampanye:
- Judul: {{ $kampanye->judul_kampanye }}
- Lokasi: {{ $kampanye->lokasi }}
- Waktu Mulai: {{ $kampanye->tanggal_mulai->format('d M Y H:i') }}
- Waktu Selesai: {{ $kampanye->tanggal_selesai->format('d M Y H:i') }}

Anda akan menerima notifikasi melalui email ini ketika status kampanye Anda diperbarui (disetujui atau ditolak).

<x-mail::button :url="config('app.url')">
Kunjungi Website Pelita
</x-mail::button>

Terima kasih telah berpartisipasi dalam mewujudkan lingkungan yang lebih baik!

Hormat kami,<br>
Tim Pelita
</x-mail::message>
