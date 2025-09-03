<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('images/logo.png') }}" alt="Pelita Logo" style="max-width: 200px; height: auto;">
</div>

# Status Kampanye Anda Diubah ke Pending

Halo {{ $kampanye->nama_pengaju }},

Status kampanye Anda "{{ $kampanye->judul_kampanye }}" telah diubah kembali ke **PENDING** (menunggu persetujuan).

## Detail Kampanye:
- Judul: {{ $kampanye->judul_kampanye }}
- Lokasi: {{ $kampanye->lokasi }}
- Waktu Mulai: {{ $kampanye->tanggal_mulai->format('d M Y H:i') }}
- Waktu Selesai: {{ $kampanye->tanggal_selesai->format('d M Y H:i') }}

Tim kami akan meninjau kembali kampanye Anda dan akan memberikan keputusan dalam waktu dekat.

<x-mail::button :url="config('app.url')">
Kunjungi Website Pelita
</x-mail::button>

Terima kasih atas pengertian dan kesabaran Anda.

Hormat kami,<br>
Tim Pelita
</x-mail::message>