<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('images/logo.png') }}" alt="Pelita Logo" style="max-width: 200px; height: auto;">
</div>

# Selamat! Kampanye Anda Telah Disetujui

Halo {{ $kampanye->nama_pengaju }},

Kami senang memberitahu bahwa kampanye Anda "{{ $kampanye->judul_kampanye }}" telah **DISETUJUI** dan sekarang aktif di sistem Pelita.

## Detail Kampanye:
- Judul: {{ $kampanye->judul_kampanye }}
- Lokasi: {{ $kampanye->lokasi }}
 - Waktu Mulai: {{ $kampanye->tanggal_mulai->format('d M Y H:i') }}
- Waktu Selesai: {{ $kampanye->tanggal_selesai->format('d M Y H:i') }}

<x-mail::button :url="config('app.url')">
    Kunjungi Website Pelita
</x-mail::button>

Terima kasih telah ikut berpartisipasi dalam mewujudkan lingkungan yang lebih baik!

Hormat kami,<br>
Tim Pelita
</x-mail::message>