@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Hero Section with Background Image -->
    <section class="relative overflow-hidden text-white">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/tentang.jpg') }}" alt="Tentang Kami Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-700/50 to-orange-600/40"></div>
        </div>
        
        <!-- Content -->
        <div class="container mx-auto px-4 py-16 sm:py-24 relative z-10 text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 sm:mb-4 text-shadow">Tentang Kami</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-6 sm:mb-8 max-w-3xl mx-auto text-white/95">
                Mengenal lebih dekat platform Peduli Lingkungan Tulungagung
            </p>
        </div>
    </section>

    <!-- Tentang Kami Section - Keep existing content -->
    <section class="py-12 sm:py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 mb-12">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-center">Apa itu PELITA?</h2>
                    <div class="prose max-w-none">
                        <p class="mb-4">
                            <strong>PELITA</strong> (Peduli Lingkungan Tulungagung) adalah platform yang didedikasikan untuk edukasi, kampanye, dan kegiatan peduli lingkungan di wilayah Tulungagung dan sekitarnya. Kami hadir sebagai wadah bagi masyarakat yang peduli terhadap lingkungan dan ingin berkontribusi dalam menjaga keberlanjutan alam untuk generasi mendatang.
                        </p>
                        <p class="mb-4">
                            Dibentuk pada tahun 2025, PELITA berawal dari keprihatinan sekelompok mahasiswa dan aktivis lingkungan terhadap berbagai permasalahan lingkungan yang semakin memprihatinkan. Kami percaya bahwa dengan kolaborasi dan partisipasi aktif dari berbagai pihak, kita dapat menciptakan perubahan positif untuk lingkungan.
                        </p>
                    </div>
                </div>

                <!-- Visi & Misi -->
                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-white rounded-xl shadow-md p-6 sm:p-8">
                        <div class="text-center mb-4">
                            <div class="bg-green-100 text-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold">Visi</h3>
                        </div>
                        <p class="text-gray-600">
                            Menjadi platform terdepan dalam mewujudkan Tulungagung yang bersih, hijau, dan berkelanjutan melalui edukasi, kampanye, dan aksi nyata peduli lingkungan.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 sm:p-8">
                        <div class="text-center mb-4">
                            <div class="bg-green-100 text-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold">Misi</h3>
                        </div>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Mengedukasi masyarakat tentang pentingnya menjaga lingkungan
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Mengorganisir kampanye dan kegiatan peduli lingkungan
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Menjadi jembatan antara masyarakat, pemerintah, dan stakeholder lainnya
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Mendorong perilaku ramah lingkungan dalam kehidupan sehari-hari
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Program Kami -->
                <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 mb-12">
                    <h2 class="text-2xl font-bold mb-6 text-center">Program Kami</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-green-50 p-5 rounded-lg">
                            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold mb-2">Artikel</h3>
                            <p class="text-sm text-gray-600">
                                Menyelenggarakan seminar, workshop, dan pelatihan untuk meningkatkan kesadaran dan pengetahuan tentang lingkungan.
                            </p>
                        </div>

                        <div class="bg-green-50 p-5 rounded-lg">
                            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold mb-2">Kampanye</h3>
                            <p class="text-sm text-gray-600">
                                Mengorganisir kampanye-kampanye peduli lingkungan seperti penanaman pohon, bersih sungai, dan pengurangan sampah plastik.
                            </p>
                        </div>

                        <div class="bg-green-50 p-5 rounded-lg">
                            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold mb-2">Pengaduan</h3>
                            <p class="text-sm text-gray-600">
                                Menyediakan platform untuk pelaporan masalah lingkungan dan mendorong penanganannya oleh pihak terkait.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tim Kami -->
                <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 mb-12">
                    <h2 class="text-2xl font-bold mb-6 text-center">Tim Kami</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="bg-gray-200 w-24 h-24 rounded-full mx-auto mb-3 overflow-hidden">
                                <img src="{{ asset('images/tentangp1.png') }}" alt="Ndaru Anwar" class="object-cover w-full h-full">
                            </div>
                            <h3 class="font-medium">Ndaru Anwar</h3>
                            <p class="text-sm text-gray-500">Developer</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-gray-200 w-24 h-24 rounded-full mx-auto mb-3 overflow-hidden">
                                <img src="{{ asset('images/tentangp2.png') }}" alt="Siti Rahma" class="object-cover w-full h-full">
                            </div>
                            <h3 class="font-medium">Siti Rahma</h3>
                            <p class="text-sm text-gray-500">Manajemen</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-gray-200 w-24 h-24 rounded-full mx-auto mb-3 overflow-hidden">
                                <img src="{{ asset('images/tentangp3.png') }}" alt="Ahmad Faisal" class="object-cover w-full h-full">
                            </div>
                            <h3 class="font-medium">Ahmad Faisal</h3>
                            <p class="text-sm text-gray-500">Bendahara</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-gray-200 w-24 h-24 rounded-full mx-auto mb-3 overflow-hidden">
                                <img src="{{ asset('images/tentangp4.png') }}" alt="Dewi Lestari" class="object-cover w-full h-full">
                            </div>
                            <h3 class="font-medium">Dewi Lestari</h3>
                            <p class="text-sm text-gray-500">Koord. Kampanye</p>
                        </div>
                    </div>
                </div>

                <!-- Lokasi Kantor -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <h2 class="text-2xl font-bold mb-4">Lokasi Kantor</h2>
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-green-100 rounded-full p-2 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium">Jl. Lingkungan Sehat No.1</p>
                                <p class="text-gray-600">Tulungagung, Jawa Timur 66211</p>
                                <p class="text-sm text-green-600 mt-1">Senin - Jumat: 08:00 - 16:00 WIB</p>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Klik pada peta untuk melihat detail lokasi</span>
                        </div>
                    </div>
                    <div class="h-80 bg-gray-200">
                        <!-- Peta Leaflet -->
                        <div id="kantor-map" class="w-full h-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-12 bg-green-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6">Bergabunglah Dengan Kami</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Mari bersama-sama menjaga lingkungan untuk kehidupan yang lebih baik dan berkelanjutan.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/kampanye" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    Lihat Kampanye
                </a>
                <a href="/pengaduan" class="border border-green-600 text-green-600 hover:bg-green-50 px-6 py-3 rounded-lg font-medium transition-colors">
                    Buat Pengaduan
                </a>
            </div>
        </div>
    </section>
</div>

@push('styles')
<!-- CSS yang sudah ada -->
<style>
    .text-shadow {
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    /* Custom styles for tentang page */
    .prose p {
        line-height: 1.7;
        color: #374151;
    }
    
    /* Enhanced card hover effect */
    .bg-green-50 {
        transition: all 0.3s ease;
    }
    
    .bg-green-50:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.15);
    }
</style>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    #kantor-map {
        border-radius: 0 0 0.75rem 0.75rem;
        z-index: 1;
    }
    
    .leaflet-popup-content-wrapper {
        border-radius: 0.5rem;
    }
    
    .leaflet-popup-content {
        margin: 12px 18px;
    }
    
    .leaflet-popup-content h4 {
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 4px;
    }
    
    .office-popup p {
        margin: 0;
        font-size: 0.9rem;
        color: #4b5563;
    }
</style>
@endpush

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Koordinat kantor PELITA Tulungagung (perkiraan)
        // Tulungagung sekitar -8.0657, 111.9070
        const kantorLat = -8.0657;
        const kantorLng = 111.9070;
        
        // Inisialisasi peta
        const map = L.map('kantor-map').setView([kantorLat, kantorLng], 15);
        
        // Tambahkan layer peta OpenStreetMap dengan bahasa Indonesia
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);
        
        // Buat custom popup content
        const popupContent = `
            <div class="office-popup">
                <h4>Kantor PELITA</h4>
                <p>Jl. Lingkungan Sehat No.1</p>
                <p>Tulungagung, Jawa Timur</p>
            </div>
        `;
        
        // Tambahkan marker dengan custom icon
        const greenIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        
        // Tambahkan marker dengan popup
        L.marker([kantorLat, kantorLng], {icon: greenIcon})
            .addTo(map)
            .bindPopup(popupContent)
            .openPopup();
    });
</script>
@endpush
@endsection