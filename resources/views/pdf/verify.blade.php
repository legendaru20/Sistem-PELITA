@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-green-700">Verifikasi Pengaduan</h1>
            <p class="text-gray-600">Detail pengaduan berdasarkan QR Code</p>
        </div>
        
        <div class="border-t border-b border-gray-200 py-4 mb-6">
            <div class="flex items-center justify-center mb-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm {{ $pengaduan->status === 'sedang_diatasi' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                    @if($pengaduan->status === 'sedang_diatasi')
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Sedang Diatasi
                    @else
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Telah Selesai
                    @endif
                </span>
            </div>
            <p class="text-center text-gray-700">ID Pengaduan: <span class="font-semibold">{{ $pengaduan->id }}</span></p>
            <p class="text-center text-gray-700">Tanggal Pengaduan: <span class="font-semibold">{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d F Y') }}</span></p>
            <p class="text-center text-gray-700">Penanggung Jawab: <span class="font-semibold">{{ $pengaduan->dinas_penanggung_jawab }}</span></p>
        </div>
        
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Detail Pengaduan:</h3>
                <p class="text-gray-700">Lokasi: {{ $pengaduan->lokasi_pengaduan }}</p>
                <div class="mt-2">
                    <p class="text-gray-700">{{ $pengaduan->deskripsi_pengaduan }}</p>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Foto Lampiran:</h3>
                <div class="grid grid-cols-2 gap-4 mt-2">
                    @foreach(json_decode($pengaduan->lampiran_foto) as $photo)
                        <div>
                            <img src="{{ asset('storage/' . $photo) }}" alt="Foto Pengaduan" class="rounded-lg">
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="text-center mt-8">
                <p class="text-gray-500 text-sm">Dokumen ini adalah sah dan dikeluarkan oleh PELITA</p>
                <p class="text-gray-500 text-sm">Platform Peduli Lingkungan Tulungagung</p>
            </div>
        </div>
    </div>
</div>
@endsection