@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-green-600 to-orange-500 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/pengaduan-bg.png') }}" alt="Pengaduan Background" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="container mx-auto px-4 py-12 sm:py-20 relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 sm:mb-4">Layanan Pengaduan Masyarakat</h1>
                <p class="text-lg sm:text-xl mb-8 opacity-90">
                    Sampaikan keluhan dan pengaduan Anda untuk lingkungan yang lebih baik
                </p>
                <a href="{{ route('pengaduan.create') }}" class="inline-flex items-center px-6 py-3 bg-white text-red-600 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Buat Pengaduan Baru
                </a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-12 sm:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-12">Bagaimana Proses Pengaduan?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <span class="text-red-600 text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Kirim Pengaduan</h3>
                    <p class="text-gray-600">Lengkapi formulir pengaduan dengan data valid dan foto pendukung.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <span class="text-orange-600 text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Verifikasi</h3>
                    <p class="text-gray-600">Tim kami akan memeriksa dan memverifikasi pengaduan Anda.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                        <span class="text-yellow-600 text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Penanganan</h3>
                    <p class="text-gray-600">Dinas terkait akan menindaklanjuti dan menangani permasalahan.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <span class="text-green-600 text-2xl font-bold">4</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Selesai</h3>
                    <p class="text-gray-600">Anda akan mendapat notifikasi saat pengaduan telah diselesaikan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-12">Pertanyaan Umum</h2>
            
            <div class="max-w-3xl mx-auto">
                <div x-data="{ open: false }" class="mb-4 border border-gray-200 rounded-lg bg-white">
                    <button @click="open = !open" class="flex justify-between w-full px-4 py-4 text-left">
                        <span class="font-medium">Bagaimana cara melacak status pengaduan saya?</span>
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 pb-4" style="display: none;">
                        <p class="text-gray-600">Status pengaduan akan dikirimkan melalui email yang Anda daftarkan. Anda akan menerima notifikasi saat status pengaduan berubah.</p>
                    </div>
                </div>
                
                <div x-data="{ open: false }" class="mb-4 border border-gray-200 rounded-lg bg-white">
                    <button @click="open = !open" class="flex justify-between w-full px-4 py-4 text-left">
                        <span class="font-medium">Berapa lama pengaduan saya akan ditanggapi?</span>
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 pb-4" style="display: none;">
                        <p class="text-gray-600">Kami berusaha untuk meninjau setiap pengaduan dalam waktu 1-2 hari kerja. Untuk pengaduan yang membutuhkan penanganan lebih lanjut oleh dinas terkait, waktu yang dibutuhkan dapat bervariasi tergantung kompleksitas masalah.</p>
                    </div>
                </div>
                
                <div x-data="{ open: false }" class="mb-4 border border-gray-200 rounded-lg bg-white">
                    <button @click="open = !open" class="flex justify-between w-full px-4 py-4 text-left">
                        <span class="font-medium">Apa saja jenis pengaduan yang dapat saya laporkan?</span>
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 pb-4" style="display: none;">
                        <p class="text-gray-600">Anda dapat melaporkan berbagai masalah lingkungan seperti pembuangan sampah ilegal, pencemaran, kerusakan fasilitas umum, masalah drainase, dan masalah lain yang berkaitan dengan lingkungan sekitar Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 sm:py-16 bg-gradient-to-r from-green-600 to-orange-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6">Siap Melaporkan Masalah Lingkungan?</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto opacity-90">
                Mari berkontribusi untuk lingkungan yang lebih baik. Laporkan masalah di sekitar Anda sekarang!
            </p>
            <div class="flex justify-center">
                <a href="{{ route('pengaduan.create') }}" class="inline-flex items-center px-6 py-3 bg-white text-red-600 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition transform hover:scale-105">
                    Buat Pengaduan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush
@endsection