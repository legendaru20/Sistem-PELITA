<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('images/logo.png') }}" alt="Pelita Logo" style="max-width: 200px; height: auto;">
</div>

# Kampanye Anda Tidak Disetujui

Halo {{ $kampanye->nama_pengaju }},

Mohon maaf, kampanye Anda "{{ $kampanye->judul_kampanye }}" **TIDAK DISETUJUI** oleh tim kami.

## Detail Kampanye:
- Judul: {{ $kampanye->judul_kampanye }}
- Lokasi: {{ $kampanye->lokasi }}
- Waktu Mulai: {{ $kampanye->tanggal_mulai->format('d M Y H:i') }}
- Waktu Selesai: {{ $kampanye->tanggal_selesai->format('d M Y H:i') }}

Keputusan ini diambil setelah peninjauan menyeluruh terhadap proposal yang diajukan. Anda dapat mengajukan kampanye baru dengan memperhatikan ketentuan yang berlaku.

<x-mail::button :url="config('app.url')">
Kunjungi Website Pelita
</x-mail::button>

Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.

Hormat kami,<br>
Tim Pelita
</x-mail::message>