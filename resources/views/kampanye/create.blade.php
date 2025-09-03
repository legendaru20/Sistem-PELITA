@extends('layouts.app')

@push('styles')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<!-- Leaflet Geocoder CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<style>
    /* Background pattern yang lebih terlihat */
    .bg-pattern {
        background-color: #f0f9f4; /* Warna dasar lebih vibrant */
        position: relative;
    }

    .leaf-pattern {
        opacity: 0.08; /* Ditingkatkan dari 0.04 */
        background-size: 80px 80px; /* Pattern lebih besar */
    }

    /* Gradien background untuk form container */
    .form-container {
        background: linear-gradient(135deg, #ffffff, #f6fcf9);
        box-shadow: 0 15px 35px -10px rgba(16, 185, 129, 0.15);
        border: 1px solid rgba(16, 185, 129, 0.1);
    }

    /* Tambahkan aksen di setiap section */
    .form-section {
        border-left: 3px solid transparent;
        border-image: linear-gradient(to bottom, #10b981, transparent);
        border-image-slice: 1;
        margin-left: 0.5rem;
        padding-left: 1.5rem;
    }

    /* Efek hover yang lebih responsif */
    .input-focus-ring input:focus,
    .input-focus-ring textarea:focus,
    .input-focus-ring select:focus {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px -3px rgba(16, 185, 129, 0.2);
        transition: all 0.3s ease;
    }

    /* Tambahkan bubble design elemen */
    .bubble {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.03) 70%);
        z-index: 0;
    }

    .bubble-1 {
        width: 150px;
        height: 150px;
        top: 15%;
        right: -50px;
    }

    .bubble-2 {
        width: 200px;
        height: 200px;
        bottom: 25%;
        left: -80px;
    }

    /* Section dengan background alternating */
    .form-section:nth-child(odd) {
        background-color: rgba(16, 185, 129, 0.03);
        border-radius: 0.75rem;
        padding: 1.5rem;
    }

    .header-banner {
        background: linear-gradient(to right, rgba(16, 185, 129, 0.8), rgba(6, 95, 70, 0.9)), url('https://images.unsplash.com/photo-1516253593875-bd7ba052fbc5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');
        background-size: cover;
        background-position: center;
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .form-section {
        position: relative;
        overflow: hidden;
    }
    
    .form-section::before {
        content: '';
        position: absolute;
        top: -15px;
        left: -15px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: rgba(16, 185, 129, 0.1);
    }
    
    .form-section::after {
        content: '';
        position: absolute;
        bottom: -25px;
        right: -25px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: rgba(16, 185, 129, 0.1);
    }
    
    .input-focus-ring:focus-within {
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    }
    
    .form-container {
        background: white;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    #map-container { 
        height: 400px; 
        border-radius: 0.5rem;
        margin-top: 0.5rem;
        z-index: 1;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    
    .map-instructions {
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        padding: 0.5rem;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #4b5563;
    }

    .map-pin {
        display: flex;
        align-items: center;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #4b5563;
    }
    
    .leaflet-control-geocoder {
        border-radius: 0.375rem !important;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
    }
</style>
@endpush

@section('content')
<div class="pt-16 sm:pt-20 bg-pattern min-h-screen">
    <div class="relative">
        <div class="leaf-pattern"></div>
        <!-- Tambahkan bubble design elements -->
        <div class="bubble bubble-1"></div>
        <div class="bubble bubble-2"></div>
        
        <div class="container mx-auto px-4 py-8 sm:py-12">
            <div class="max-w-4xl mx-auto">
                <!-- Banner Header -->
                <div class="header-banner p-8 text-center text-white mb-0">
                    <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm p-2 rounded-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 drop-shadow-sm">Ajukan Kampanye Baru</h1>
                    <p class="max-w-xl mx-auto text-white text-opacity-90">
                        Jadilah bagian dari perubahan nyata untuk lingkungan hidup di Tulungagung
                    </p>
                </div>
                
                @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-6 border border-red-100">
                    <div class="font-medium mb-1">Oops! Ada beberapa kesalahan:</div>
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ route('kampanye.store') }}" method="POST" enctype="multipart/form-data" class="form-container rounded-xl rounded-tl-none rounded-tr-none p-6 sm:p-8">
                    @csrf
                    
                    <div class="mb-10 form-section">
                        <div class="bg-gradient-to-r from-green-50 to-transparent p-4 rounded-lg mb-4">
                            <h2 class="text-xl font-semibold flex items-center text-green-800">
                                <span class="bg-green-100 h-8 w-8 rounded-full flex items-center justify-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                Data Pengaju
                            </h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="input-focus-ring">
                                <label for="nama_pengaju" class="block text-gray-700 mb-2 font-medium">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_pengaju" id="nama_pengaju" required 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       value="{{ old('nama_pengaju') }}">
                            </div>
                            
                            <div class="input-focus-ring">
                                <label for="nik" class="block text-gray-700 mb-2 font-medium">NIK (16 digit) <span class="text-red-500">*</span></label>
                                <input type="text" name="nik" id="nik" required minlength="16" maxlength="16"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       value="{{ old('nik') }}">
                            </div>
                            
                            <div class="input-focus-ring">
                                <label for="email_pengaju" class="block text-gray-700 mb-2 font-medium">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email_pengaju" id="email_pengaju" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       value="{{ old('email_pengaju') }}">
                            </div>
                            
                            <div class="input-focus-ring">
                                <label for="wa_pengaju" class="block text-gray-700 mb-2 font-medium">Nomor WhatsApp <span class="text-red-500">*</span></label>
                                <input type="tel" name="wa_pengaju" id="wa_pengaju" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       value="{{ old('wa_pengaju') }}" placeholder="Contoh: 081234567890">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-10 form-section relative">
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-green-50 rounded-full opacity-30 z-0"></div>
                        <div class="bg-gradient-to-r from-green-50 to-transparent p-4 rounded-lg mb-4 relative z-10">
                            <h2 class="text-xl font-semibold flex items-center text-green-800">
                                <span class="bg-green-100 h-8 w-8 rounded-full flex items-center justify-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                Data Kampanye
                            </h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="input-focus-ring">
                                <label for="judul_kampanye" class="block text-gray-700 mb-2 font-medium">Judul Kampanye <span class="text-red-500">*</span></label>
                                <input type="text" name="judul_kampanye" id="judul_kampanye" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       value="{{ old('judul_kampanye') }}">
                            </div>
                            
                            <div class="input-focus-ring">
                                <label for="deskripsi" class="block text-gray-700 mb-2 font-medium">Deskripsi Kampanye <span class="text-red-500">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" rows="6" required
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('deskripsi') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Jelaskan detail tentang kampanye, tujuan, dan kegiatan yang akan dilakukan.</p>
                            </div>
                            
                            <div class="input-focus-ring">
                                <label for="lokasi" class="block text-gray-700 mb-2 font-medium">Lokasi Kampanye <span class="text-red-500">*</span></label>
                                <div class="flex flex-col">
                                    <input type="text" name="lokasi" id="lokasi" required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                           value="{{ old('lokasi') }}" placeholder="Cari lokasi atau klik pada peta">
                                           
                                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
                                    
                                    <!-- Peta -->
                                    <div id="map-container"></div>
                                    
                                    <!-- Instruksi dalam Bahasa Indonesia -->
                                    <div class="map-pin">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Pilih lokasi dengan mengklik pada peta atau mencari alamat pada kolom pencarian</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="input-focus-ring">
                                    <label for="tanggal_mulai" class="block text-gray-700 mb-2 font-medium">Tanggal & Waktu Mulai <span class="text-red-500">*</span></label>
                                    <input type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                           value="{{ old('tanggal_mulai') }}">
                                </div>
                                
                                <div class="input-focus-ring">
                                    <label for="tanggal_selesai" class="block text-gray-700 mb-2 font-medium">Tanggal & Waktu Selesai <span class="text-red-500">*</span></label>
                                    <input type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                           value="{{ old('tanggal_selesai') }}">
                                </div>
                            </div>
                            
                            <div class="input-focus-ring">
                                <label for="rekening_donasi" class="block text-gray-700 mb-2 font-medium">Rekening Donasi (opsional)</label>
                                <input type="text" name="rekening_donasi" id="rekening_donasi"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       value="{{ old('rekening_donasi') }}"
                                       placeholder="Contoh: BCA 1234567890 a.n. Nama">
                                <p class="mt-1 text-sm text-gray-500">Isi jika kampanye Anda memerlukan donasi untuk mendukung kegiatan.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-10 form-section">
                        <div class="bg-gradient-to-r from-green-50 to-transparent p-4 rounded-lg mb-4">
                            <h2 class="text-xl font-semibold flex items-center text-green-800">
                                <span class="bg-green-100 h-8 w-8 rounded-full flex items-center justify-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                Media Kampanye
                            </h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div>
                                <label for="thumbnail" class="block text-gray-700 mb-2 font-medium">Thumbnail Kampanye <span class="text-red-500">*</span></label>
                                <input type="file" name="thumbnail" id="thumbnail" required accept="image/*"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <p class="mt-1 text-sm text-gray-500">Gambar utama yang akan muncul di grid kampanye. Maksimal 2MB.</p>
                            </div>
                            
                            <div>
                                <label for="banner_images" class="block text-gray-700 mb-2 font-medium">Banner/Foto Kampanye <span class="text-red-500">*</span></label>
                                <input type="file" name="banner_images[]" id="banner_images" required accept="image/*" multiple
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <p class="mt-1 text-sm text-gray-500">Unggah 1-5 gambar yang akan ditampilkan di halaman detail kampanye. Maksimal 2MB per gambar.</p>
                            </div>
                            
                            <div>
                                <label for="proposal" class="block text-gray-700 mb-2 font-medium">Proposal Kampanye (PDF) <span class="text-red-500">*</span></label>
                                <input type="file" name="proposal" id="proposal" required accept="application/pdf"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <p class="mt-1 text-sm text-gray-500">Dokumen PDF yang berisi detail kampanye. Maksimal 10MB.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hidden field for reCAPTCHA v3 token -->
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                    <!-- Notifikasi bahwa formulir dilindungi -->
                    <div class="mt-4 mb-6 flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        Form ini dilindungi oleh Google reCAPTCHA untuk keamanan
                    </div>
                    @error('g-recaptcha-response')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <div class="flex justify-between items-center mt-8 border-t border-gray-200 pt-6">
                        <a href="{{ route('kampanye.index') }}" class="text-gray-600 hover:text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali ke Daftar Kampanye
                        </a>
                        
                        <button type="submit" class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-lg font-medium transition-all hover:shadow-lg hover:from-green-500 hover:to-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Ajukan Kampanye
                        </button>
                    </div>
                </form>
                
                <!-- Tambahkan section tentang kampanye -->
                <div class="my-8 p-6 rounded-xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center opacity-10 z-0" 
                         style="background-image: url('{{ asset('images/tentang.jpg') }}')"></div>
                    <div class="relative z-10">
                        <!-- Konten di atas background image -->
                        <div class="bg-white bg-opacity-80 backdrop-blur-sm p-4 rounded-lg">
                            <p class="text-gray-700">
                                Kampanye lingkungan adalah kesempatan bagi kita semua untuk berkontribusi dalam menjaga lingkungan hidup. 
                                Dengan mengajukan kampanye, Anda menjadi bagian dari perubahan nyata di Tulungagung.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer decoration -->
    <div class="h-24 w-full relative overflow-hidden">
        <div class="absolute bottom-0 left-0 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
                <path fill="rgba(16, 185, 129, 0.1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,165.3C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<!-- Leaflet Geocoder untuk pencarian lokasi -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Koordinat default (Tulungagung)
        const defaultLat = {{ old('latitude', '-8.0658') }};
        const defaultLng = {{ old('longitude', '111.9068') }};
        
        // Inisialisasi peta
        const map = L.map('map-container').setView([defaultLat, defaultLng], 13);
        
        // Tambahkan layer peta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        // Inisialisasi marker
        let marker = L.marker([defaultLat, defaultLng], {
            draggable: true,
            autoPan: true
        }).addTo(map);
        
        // Update koordinat saat marker digeser
        marker.on('dragend', function(e) {
            updateCoordinates(marker.getLatLng());
        });
        
        // Klik pada peta untuk pindahkan marker
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            updateCoordinates(e.latlng);
        });
        
        // Tambahkan kontrol pencarian dalam Bahasa Indonesia
        const geocoder = L.Control.geocoder({
            defaultMarkGeocode: false,
            placeholder: 'Cari lokasi...',
            errorMessage: 'Lokasi tidak ditemukan',
            showResultIcons: true
        }).addTo(map);
        
        geocoder.on('markgeocode', function(e) {
            const latlng = e.geocode.center;
            marker.setLatLng(latlng);
            map.setView(latlng, 16);
            updateCoordinates(latlng);
            
            // Update alamat
            document.getElementById('lokasi').value = e.geocode.name;
        });
        
        // Update nilai input kooordinat
        function updateCoordinates(latlng) {
            document.getElementById('latitude').value = latlng.lat.toFixed(6);
            document.getElementById('longitude').value = latlng.lng.toFixed(6);
            
            // Lakukan reverse geocoding untuk mendapatkan alamat dalam Bahasa Indonesia
            reverseGeocode(latlng);
        }
        
        // Reverse geocoding: dari koordinat ke alamat
        function reverseGeocode(latlng) {
            const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latlng.lat}&lon=${latlng.lng}&accept-language=id`;
            
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        document.getElementById('lokasi').value = data.display_name;
                    }
                })
                .catch(error => {
                    console.error('Error mendapatkan alamat:', error);
                });
        }
        
        // Sinkronisasi input lokasi dengan peta
        const lokasiInput = document.getElementById('lokasi');
        lokasiInput.addEventListener('change', function() {
            if (this.value.trim() !== '') {
                geocoder.geocode(this.value);
            }
        });
    });
</script>

<!-- Google reCAPTCHA v3 dengan error handling yang lebih baik -->
<script src="https://www.google.com/recaptcha/api.js?render=6Ld6FEkrAAAAAFPwnkp7QwlnePkJ8VfdNYqx_LVo&onload=onRecaptchaLoad" async defer></script>
<script>
    let recaptchaLoaded = false;
    let formSubmitAttempted = false;
    let formElement = null;
    
    // Callback setelah reCAPTCHA dimuat
    function onRecaptchaLoad() {
        recaptchaLoaded = true;
        console.log('reCAPTCHA successfully loaded');
        
        // Jika user sudah mencoba submit form sebelum reCAPTCHA dimuat
        if (formSubmitAttempted && formElement) {
            generateAndSubmit(formElement);
        } else {
            executeRecaptcha();
        }
    }
    
    // Menghasilkan token reCAPTCHA
    function executeRecaptcha() {
        if (typeof grecaptcha !== 'undefined' && grecaptcha && recaptchaLoaded) {
            try {
                grecaptcha.execute('6Ld6FEkrAAAAAFPwnkp7QwlnePkJ8VfdNYqx_LVo', {
                    action: '{{ request()->path() === "pengaduan/buat" ? "pengaduan_submit" : "kampanye_submit" }}'
                }).then(function(token) {
                    if (token) {
                        document.getElementById('g-recaptcha-response').value = token;
                        console.log('Token generated: ' + token.substring(0, 10) + '...');
                    } else {
                        console.error('Empty token received');
                    }
                }).catch(function(error) {
                    console.error('Error executing reCAPTCHA:', error);
                });
            } catch (error) {
                console.error('Exception in reCAPTCHA execution:', error);
            }
        } else {
            console.warn('reCAPTCHA not ready yet, will retry');
            setTimeout(executeRecaptcha, 500);
        }
    }

    // Refresh token setiap 90 detik (sebelum masa berlaku 2 menit habis)
    setInterval(executeRecaptcha, 90000);
    
    // Validasi saat form disubmit
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        
        if (form) {
            form.addEventListener('submit', function(event) {
                formElement = this;
                
                // Jika belum ada token, cegah submit dan dapatkan token baru
                if (!document.getElementById('g-recaptcha-response').value) {
                    event.preventDefault();
                    formSubmitAttempted = true;
                    
                    if (recaptchaLoaded) {
                        generateAndSubmit(form);
                    } else {
                        alert('Sedang memuat sistem keamanan. Mohon tunggu sebentar dan coba lagi.');
                    }
                }
            });
        }
    });
    
    // Generate token dan submit form
    function generateAndSubmit(form) {
        if (typeof grecaptcha !== 'undefined' && grecaptcha && recaptchaLoaded) {
            grecaptcha.execute('6Ld6FEkrAAAAAFPwnkp7QwlnePkJ8VfdNYqx_LVo', {
                action: '{{ request()->path() === "pengaduan/buat" ? "pengaduan_submit" : "kampanye_submit" }}'
            }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
                console.log('Token generated and submitting form');
                form.submit();
            }).catch(function() {
                alert('Gagal memverifikasi keamanan. Silakan refresh halaman dan coba lagi.');
            });
        } else {
            alert('Sistem keamanan belum dimuat. Silakan refresh halaman.');
        }
    }
</script>
@endpush