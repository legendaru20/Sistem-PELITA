@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Banner Image Carousel -->
    <div class="w-full bg-gray-200 relative h-64 sm:h-80 md:h-96 overflow-hidden"
         x-data="{ activeSlide: 0, slides: {{ is_array($kampanye->banner_images) ? count($kampanye->banner_images) : 1 }} }">
        
        <!-- Carousel Images -->
        @if(is_array($kampanye->banner_images) && count($kampanye->banner_images) > 0)
            @foreach($kampanye->banner_images as $index => $image)
                <div class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                     :class="{ 'opacity-0': activeSlide !== {{ $index }}, 'opacity-100': activeSlide === {{ $index }} }">
                    <img src="{{ asset('storage/' . $image) }}" 
                         alt="{{ $kampanye->judul_kampanye }} - Image {{ $index+1 }}" 
                         class="w-full h-full object-cover">
                </div>
            @endforeach
        @else
            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $kampanye->thumbnail) }}" 
                     alt="{{ $kampanye->judul_kampanye }}" 
                     class="w-full h-full object-cover">
            </div>
        @endif
        
        <!-- Carousel Controls -->
        @if(is_array($kampanye->banner_images) && count($kampanye->banner_images) > 1)
            <!-- Previous Button -->
            <button @click="activeSlide = activeSlide === 0 ? slides - 1 : activeSlide - 1"
                    class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-2 rounded-full z-10 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            
            <!-- Next Button -->
            <button @click="activeSlide = activeSlide === slides - 1 ? 0 : activeSlide + 1"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-2 rounded-full z-10 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            
            <!-- Indicators -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                @foreach($kampanye->banner_images as $index => $image)
                    <button @click="activeSlide = {{ $index }}"
                            class="h-2 w-2 rounded-full focus:outline-none transition-colors duration-300"
                            :class="{ 'bg-white': activeSlide === {{ $index }}, 'bg-white bg-opacity-50': activeSlide !== {{ $index }} }">
                    </button>
                @endforeach
            </div>
        @endif
        
        <!-- Overlay Content -->
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-end">
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-5xl">
                    @php
                        $isExpired = \Carbon\Carbon::parse($kampanye->tanggal_selesai)->isPast();
                    @endphp
                    
                    @if($isExpired)
                        <div class="inline-block bg-orange-600 text-white text-xs uppercase tracking-wider px-3 py-1 mb-3 rounded-md">Kampanye Telah Selesai</div>
                    @else
                        <div class="inline-block bg-green-600 text-white text-xs uppercase tracking-wider px-3 py-1 mb-3 rounded-md">Kampanye Aktif</div>
                    @endif
                    
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white">{{ $kampanye->judul_kampanye }}</h1>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Rest of the content -->
    <div class="container mx-auto px-4 py-8 sm:py-12">
        <!-- Content remains the same -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Remove the separate image gallery section since we now have carousel -->
            <div class="lg:w-2/3">
                <!-- Description -->
                <div class="prose max-w-none mb-10">
                    <h2 class="text-2xl font-bold mb-4">Deskripsi Kampanye</h2>
                    <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
                        <div class="whitespace-pre-line text-gray-700">{{ $kampanye->deskripsi }}</div>
                    </div>
                </div>
                
                <!-- Proposal Download -->
                @if($kampanye->proposal)
                <div class="mt-8 mb-10">
                    <h2 class="text-2xl font-bold mb-4">Dokumen Kampanye</h2>
                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-6 flex items-center">
                        <div class="mr-4 bg-blue-500 text-white p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-medium">Proposal Kampanye</h3>
                            <p class="text-sm text-gray-500 mb-2">Dokumen PDF dengan detail lengkap kampanye</p>
                            <a href="{{ asset('storage/' . $kampanye->proposal) }}" target="_blank" 
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Share Section -->
                <div class="mt-8 mb-10">
                    <h2 class="text-2xl font-bold mb-4">Bagikan Kampanye Ini</h2>
                    <div class="flex flex-wrap gap-2">
                        <a href="https://wa.me/?text={{ urlencode($kampanye->judul_kampanye . ' - ' . route('kampanye.show', $kampanye->id)) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
                            <span class="mr-2">WhatsApp</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($kampanye->judul_kampanye) }}&url={{ urlencode(route('kampanye.show', $kampanye->id)) }}" target="_blank" class="bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 rounded-md flex items-center">
                            <span class="mr-2">Twitter</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('kampanye.show', $kampanye->id)) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center">
                            <span class="mr-2">Facebook</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:w-1/3 mt-8 lg:mt-0">
                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100 sticky top-24">
                    <h3 class="text-xl font-bold mb-4 pb-2 border-b">Informasi Kampanye</h3>
                    
                    <div class="space-y-6">
                        <!-- Location dengan peta -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Lokasi Kampanye</h4>
                            <div id="kampanye-map"></div>
                            <p class="text-gray-600">{{ $kampanye->lokasi }}</p>
                        </div>
                        
                        <!-- Date Range -->
                        <div class="flex items-start">
                            <div class="bg-green-50 p-3 rounded-full mr-4 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Periode Kampanye</h4>
                                <div class="text-gray-600">
                                    <div class="mb-1">
                                        <span class="font-medium text-gray-700">Mulai:</span>
                                        {{ \Carbon\Carbon::parse($kampanye->tanggal_mulai)->format('d M Y') }}
                                        <span class="text-gray-500 text-sm">
                                            ({{ \Carbon\Carbon::parse($kampanye->tanggal_mulai)->format('H:i') }} WIB)
                                        </span>
                                    </div>
                                    <div>
                                        <span class="font-medium text-gray-700">Selesai:</span>
                                        {{ \Carbon\Carbon::parse($kampanye->tanggal_selesai)->format('d M Y') }}
                                        <span class="text-gray-500 text-sm">
                                            ({{ \Carbon\Carbon::parse($kampanye->tanggal_selesai)->format('H:i') }} WIB)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Status Kampanye -->
                        <div class="flex items-start">
                            <div class="bg-{{ $isExpired ? 'gray' : 'green' }}-50 p-3 rounded-full mr-4 text-{{ $isExpired ? 'gray' : 'green' }}-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Status Kampanye</h4>
                                <div class="text-{{ $isExpired ? 'red' : 'green' }}-600 font-medium">
                                    {{ $isExpired ? 'Telah Berakhir' : 'Sedang Berlangsung' }}
                                </div>
                                @if($isExpired)
                                    <p class="text-sm text-gray-500 mt-1">Kampanye ini telah selesai pada {{ \Carbon\Carbon::parse($kampanye->tanggal_selesai)->format('d M Y') }}</p>
                                @else
                                    <p class="text-sm text-gray-500 mt-1">Kampanye masih berlangsung hingga {{ \Carbon\Carbon::parse($kampanye->tanggal_selesai)->format('d M Y') }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Organizer -->
                        <div class="flex items-start">
                            <div class="bg-green-50 p-3 rounded-full mr-4 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Diajukan oleh</h4>
                                <p class="text-gray-600">{{ $kampanye->nama_pengaju }}</p>
                            </div>
                        </div>
                        
                        <!-- Donation -->
                        @if($kampanye->rekening_donasi)
                        <div class="flex items-start">
                            <div class="bg-green-50 p-3 rounded-full mr-4 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Rekening Donasi</h4>
                                <p class="text-gray-600 font-medium">{{ $kampanye->rekening_donasi }}</p>
                                <p class="text-sm text-gray-500 mt-1">Silakan transfer donasi Anda untuk mendukung kampanye ini</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <!-- CTA Buttons -->
                    <div class="mt-8 space-y-3">
                        <a href="{{ route('kampanye.index') }}" class="block text-center bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg font-medium transition-colors">
                            Lihat Kampanye Lainnya
                        </a>
                        
                        <a href="{{ url('/kampanye/create') }}" class="block text-center border border-green-600 text-green-600 hover:bg-green-50 py-3 px-4 rounded-lg font-medium">
                            Ajukan Kampanye Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add auto-carousel functionality -->
@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        // Auto-advancing carousel
        setInterval(() => {
            const carouselElement = document.querySelector('[x-data*="activeSlide"]');
            if (carouselElement) {
                const Alpine = window.Alpine;
                const data = Alpine.$data(carouselElement);
                data.activeSlide = data.activeSlide === data.slides - 1 ? 0 : data.activeSlide + 1;
            }
        }, 5000); // Change slide every 5 seconds
    });
</script>
@endpush

<!-- Tambahkan di bagian styles -->
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    #kampanye-map { 
        height: 280px; 
        border-radius: 8px;
        margin-bottom: 16px;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gunakan koordinat dari database atau default ke Tulungagung
        const lat = {{ $kampanye->latitude ?? '-8.0658' }};
        const lng = {{ $kampanye->longitude ?? '111.9068' }};
        
        // Inisialisasi peta
        const map = L.map('kampanye-map').setView([lat, lng], 15);
        
        // Tambahkan layer peta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        // Tambahkan marker
        L.marker([lat, lng]).addTo(map)
            .bindPopup('<strong>{{ $kampanye->judul_kampanye }}</strong><br>{{ $kampanye->lokasi }}')
            .openPopup();
    });
</script>
@endpush
@endsection