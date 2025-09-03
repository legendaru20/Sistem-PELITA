@extends('layouts.app')

@section('content')
<!-- Animated Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-green-600 via-green-500 to-orange-400 text-white min-h-screen">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden z-0">
        <div class="leaf leaf-1"></div>
        <div class="leaf leaf-2"></div>
        <div class="leaf leaf-3"></div>
        <div class="leaf leaf-4"></div>
        <div class="leaf leaf-5"></div>
        <div class="bubble bubble-1"></div>
        <div class="bubble bubble-2"></div>
        <div class="bubble bubble-3"></div>
    </div>
    
    <!-- Main Hero Content -->
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between min-h-screen px-6 py-20 relative z-10">
        <div class="text-white md:w-1/2 animate-fade-in-up">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 leading-tight">
                <span class="block">SAVE NATURE</span>
                <span class="block text-yellow-300 mt-2 animate-pulse-slow">FOR FUTURE</span>
            </h1>
            <p class="text-lg sm:text-xl mb-8 opacity-90 max-w-lg animate-fade-in">
                Selamatkan bumi untuk anak dan cucu kita. Mari bersama menjaga lingkungan sekitar kita untuk masa depan yang lebih baik.
            </p>
            <div class="space-x-4 animate-fade-in-up" style="animation-delay: 0.3s">
                <a href="#fitur" class="inline-block bg-white text-green-600 px-6 py-3 rounded-full font-bold hover:shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    Mulai Sekarang
                </a>
                <a href="/tentang" class="inline-block bg-transparent border-2 border-white text-white px-6 py-3 rounded-full font-bold hover:bg-white hover:bg-opacity-20 transition duration-300">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
        
        <div class="md:w-1/2 mt-10 md:mt-0 animate-fade-in" style="animation-delay: 0.5s">
            <div class="relative h-64 md:h-96">
                <div id="simple-carousel" class="w-full h-full rounded-xl overflow-hidden shadow-lg">
                    <div class="carousel-track w-full h-full relative">
                        <div class="carousel-slide active absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out">
                            <img src="{{ asset('images/hero (1).png') }}" alt="Lingkungan Bersih" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                            <img src="{{ asset('images/hero (2).png') }}" alt="Hutan Lestari" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                            <img src="{{ asset('images/hero (3).png') }}" alt="Sungai Bersih" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                            <img src="{{ asset('images/hero (4).png') }}" alt="Tanaman Hijau" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                            <img src="{{ asset('images/hero (5).png') }}" alt="Ekosistem Sehat" class="w-full h-full object-cover">
                        </div>
                    </div>
                    
                    <!-- Carousel Dots -->
                    <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                        <button class="carousel-dot w-3 h-3 bg-white bg-opacity-50 rounded-full transition-all duration-300 active" data-index="0"></button>
                        <button class="carousel-dot w-3 h-3 bg-white bg-opacity-50 rounded-full transition-all duration-300" data-index="1"></button>
                        <button class="carousel-dot w-3 h-3 bg-white bg-opacity-50 rounded-full transition-all duration-300" data-index="2"></button>
                        <button class="carousel-dot w-3 h-3 bg-white bg-opacity-50 rounded-full transition-all duration-300" data-index="3"></button>
                        <button class="carousel-dot w-3 h-3 bg-white bg-opacity-50 rounded-full transition-all duration-300" data-index="4"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-0 right-0 flex justify-center animate-bounce">
        <a href="#fitur" class="text-white opacity-80 hover:opacity-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </a>
    </div>
</section>

<!-- Support/Partner Logos Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <h3 class="text-center text-gray-700 font-medium mb-8">DIDUKUNG OLEH</h3>
        
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
            <!-- Logo 1 -->
            <div class="w-32 md:w-40 transform transition duration-300 hover:scale-110">
                <img src="{{ asset('images/partner (1).png') }}" alt="Partner 1" class="w-full h-auto hover:grayscale-0 transition-all">
            </div>
            
            <!-- Logo 2 -->
            <div class="w-32 md:w-40 transform transition duration-300 hover:scale-110">
                <img src="{{ asset('images/partner (2).png') }}" alt="Partner 2" class="w-full h-auto hover:grayscale-0 transition-all">
            </div>
            
            <!-- Logo 3 -->
            <div class="w-32 md:w-40 transform transition duration-300 hover:scale-110">
                <img src="{{ asset('images/partner (3).png') }}" alt="Partner 3" class="w-full h-auto  hover:grayscale-0 transition-all">
            </div>
        </div>
    </div>
</section>

<!-- Fitur Section -->
<section id="fitur" class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 animate-on-scroll">
            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full mb-3">FITUR UNGGULAN</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Solusi Peduli Lingkungan</h2>
            <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                Berbagai layanan yang kami sediakan untuk mendukung gerakan peduli lingkungan
            </p>
        </div>
        
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Berita Feature -->
            <div class="bg-white p-6 rounded-xl shadow-feature hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-on-scroll">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Berita</h3>
                <p class="text-gray-600 text-center mb-4">Dapatkan informasi terkini seputar isu lingkungan dan penanganannya.</p>
                <div class="text-center">
                    <a href="/berita" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-full text-sm hover:bg-blue-700 transition">Lihat Berita</a>
                </div>
            </div>
            
            <!-- Agenda Feature -->
            <div class="bg-white p-6 rounded-xl shadow-feature hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.2s">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Agenda</h3>
                <p class="text-gray-600 text-center mb-4">Ikuti berbagai kegiatan dan event peduli lingkungan hidup.</p>
                <div class="text-center">
                    <a href="/agenda" class="inline-block px-4 py-2 bg-green-600 text-white rounded-full text-sm hover:bg-green-700 transition">Lihat Agenda</a>
                </div>
            </div>
            
            <!-- Kampanye Feature -->
            <div class="bg-white p-6 rounded-xl shadow-feature hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.4s">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Kampanye</h3>
                <p class="text-gray-600 text-center mb-4">Bergabung dengan kampanye peduli lingkungan dan ajak orang lain.</p>
                <div class="text-center">
                    <a href="/kampanye" class="inline-block px-4 py-2 bg-orange-500 text-white rounded-full text-sm hover:bg-orange-600 transition">Lihat Kampanye</a>
                </div>
            </div>
            
            <!-- Pengaduan Feature -->
            <div class="bg-white p-6 rounded-xl shadow-feature hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.6s">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Pengaduan</h3>
                <p class="text-gray-600 text-center mb-4">Laporkan masalah lingkungan di sekitar Anda untuk ditindaklanjuti.</p>
                <div class="text-center">
                    <a href="/pengaduan" class="inline-block px-4 py-2 bg-red-600 text-white rounded-full text-sm hover:bg-red-700 transition">Buat Pengaduan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Campaign Highlights -->
<section class="py-16 sm:py-20 bg-gradient-to-r from-green-600 to-orange-500 relative overflow-hidden">
    <!-- Background Patterns -->
    <div class="absolute inset-0 z-0 opacity-10">
        <div class="pattern-dots"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-12 text-white">
            <span class="inline-block px-3 py-1 bg-white bg-opacity-20 text-white text-sm font-medium rounded-full mb-3">KAMPANYE TERBARU</span>
            <h2 class="text-3xl font-bold mb-4">Mari Berkontribusi Pada Lingkungan</h2>
            <p class="max-w-2xl mx-auto text-white text-opacity-80">Bergabunglah dengan berbagai kampanye lingkungan dan ikut ambil bagian dalam melestarikan alam sekitar kita</p>
        </div>
        
        <div class="campaign-slider">
            <div class="flex space-x-6 pb-4 overflow-x-auto campaign-items">
                @forelse($kampanyes as $kampanye)
                    @php
                        $isExpired = \Carbon\Carbon::parse($kampanye->tanggal_selesai)->isPast();
                    @endphp
                    <div class="campaign-card relative w-full sm:w-96 flex-shrink-0 bg-white rounded-xl shadow-xl overflow-hidden">
                        {{-- Badge status --}}
                        <div class="absolute top-2 right-2 z-10">
                            <span class="inline-block text-xs font-semibold uppercase px-2 py-1 rounded-full {{ $isExpired ? 'bg-orange-600 text-white' : 'bg-green-600 text-white' }}">
                                {{ $isExpired ? 'Selesai' : 'Aktif' }}
                            </span>
                        </div>

                        <div class="h-52 overflow-hidden">
                            @if($kampanye->thumbnail)
                                <img src="{{ asset('storage/' . $kampanye->thumbnail) }}"
                                     alt="{{ $kampanye->judul_kampanye }}"
                                     class="w-full h-full object-cover transform hover:scale-110 transition duration-500">
                            @else
                                <div class="w-full h-full bg-green-100 flex items-center justify-center">
                                    <!-- placeholder icon -->
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">{{ $kampanye->kategori ?? 'Kampanye' }}</span>
                                <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($kampanye->tanggal_mulai)->format('d M Y') }}</span>
                            </div>
                            <h3 class="font-bold text-xl mb-2">{{ $kampanye->judul_kampanye }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit(strip_tags($kampanye->deskripsi), 100) }}</p>
                            
                            <!-- Progress bar untuk kampanye -->
                            @php
                                $now = now();
                                $start = \Carbon\Carbon::parse($kampanye->tanggal_mulai);
                                $end = \Carbon\Carbon::parse($kampanye->tanggal_selesai);
                                $totalDuration = $start->diffInDays($end) ?: 1;
                                $elapsed = $start->diffInDays($now);
                                $progress = min(100, max(0, ($elapsed / $totalDuration) * 100));
                            @endphp
                            
                            <div class="flex items-center mb-4">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $progress }}%"></div>
                                </div>
                                <span class="ml-3 text-sm font-medium">{{ round($progress) }}%</span>
                            </div>
                            
                            <a href="{{ route('kampanye.show', $kampanye->id) }}" class="inline-block w-full py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium text-center rounded-lg hover:from-green-600 hover:to-green-700 transition">Dukung Kampanye</a>
                        </div>
                    </div>
                @empty
                <div class="w-full text-center py-12">
                    <div class="bg-white rounded-xl p-8 shadow-lg max-w-md mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Belum Ada Kampanye</h3>
                        <p class="text-gray-600 mb-6">Belum ada kampanye yang disetujui saat ini.</p>
                        <a href="{{ route('kampanye.create') }}" class="inline-block px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">Ajukan Kampanye Baru</a>
                    </div>
                </div>
                @endforelse
            </div>
            
            @if(count($kampanyes) > 1)
            <!-- Slider Controls -->
            <div class="flex justify-center mt-6 space-x-2">
                <button class="carousel-nav-prev w-12 h-12 rounded-full bg-white bg-opacity-20 flex items-center justify-center text-white hover:bg-opacity-30 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="carousel-nav-next w-12 h-12 rounded-full bg-white bg-opacity-20 flex items-center justify-center text-white hover:bg-opacity-30 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            @endif
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('kampanye.index') }}" class="inline-block px-8 py-3 border-2 border-white text-white rounded-full hover:bg-white hover:text-green-600 transition font-bold">
                Lihat Semua Kampanye
            </a>
        </div>
    </div>
</section>

<!-- Recent News & Agenda -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Berita & Agenda Terbaru</h2>
            <p class="max-w-2xl mx-auto text-gray-600">Update terkini seputar lingkungan dan kegiatan yang dapat diikuti</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Latest News -->
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold">Berita Terbaru</h3>
                    <a href="{{ route('berita.index') }}" class="text-green-600 hover:underline flex items-center">
                        Lihat Semua
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                
                <div class="space-y-6">
                    @forelse($beritas as $berita)
                    <!-- News Item -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition animate-on-scroll">
                        <div class="md:flex">
                            <div class="md:w-1/3 h-40 md:h-auto">
                                @if($berita->thumbnail)
                                    <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-blue-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 md:w-2/3">
                                <span class="inline-block px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full mb-2">{{ $berita->kategori ?? 'Lingkungan' }}</span>
                                <h4 class="text-lg font-bold mb-2 hover:text-green-600 transition">{{ $berita->judul }}</h4>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit(strip_tags($berita->konten), 100) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500">{{ $berita->created_at->format('d M Y') }}</span>
                                    <a href="{{ route('berita.show', $berita->id) }}" class="text-green-600 text-sm hover:underline">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <p class="text-gray-600">Belum ada berita terbaru</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Latest Agenda dengan gambar seperti Berita -->
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold">Agenda Lingkungan</h3>
                    <a href="{{ route('agenda.index') }}" class="text-green-600 hover:underline flex items-center">
                        Lihat Semua
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                
                <div class="space-y-6">
                    @forelse($agendas as $agenda)
                    <!-- Agenda Item dengan gambar -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition animate-on-scroll">
                        <div class="md:flex">
                            <div class="md:w-1/3 h-40 md:h-auto relative">
                                @if($agenda->thumbnail)
                                    <img src="{{ asset('storage/' . $agenda->thumbnail) }}" alt="{{ $agenda->judul }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-green-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-3 left-3 bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg w-14 h-14 py-1 px-1 text-center flex flex-col justify-center">
                                    <span class="block text-lg font-bold leading-tight">{{ $agenda->tanggal_agenda ? \Carbon\Carbon::parse($agenda->tanggal_agenda)->format('d') : \Carbon\Carbon::parse($agenda->created_at)->format('d') }}</span>
                                    <span class="block text-xs uppercase">{{ $agenda->tanggal_agenda ? \Carbon\Carbon::parse($agenda->tanggal_agenda)->format('M') : \Carbon\Carbon::parse($agenda->created_at)->format('M') }}</span>
                                </div>
                            </div>
                            <div class="p-5 md:w-2/3">
                                <span class="inline-block px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full mb-2">{{ $agenda->kategori ?? 'Agenda' }}</span>
                                <h4 class="text-lg font-bold mb-2 hover:text-green-600 transition">{{ $agenda->judul }}</h4>
                                <div class="flex items-center text-gray-500 text-sm mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $agenda->alamat }}</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ Str::limit(strip_tags($agenda->konten), 100) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500">Oleh: {{ $agenda->author ?? 'Admin' }}</span>
                                    <a href="{{ route('agenda.show', $agenda->id) }}" class="text-green-600 text-sm hover:underline">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-600">Belum ada agenda terbaru</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Complaint Service -->
<section class="py-16 bg-gradient-to-r from-green-50 to-orange-50 relative overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 bg-gradient-to-br from-green-600 to-orange-500 p-10 text-white flex flex-col justify-center relative">
                        <!-- Floating Elements -->
                        <div class="absolute top-5 left-5 w-12 h-12 rounded-full bg-white opacity-10"></div>
                        <div class="absolute bottom-10 right-10 w-20 h-20 rounded-full bg-white opacity-10"></div>
                        <div class="absolute top-1/2 left-1/3 w-16 h-16 rounded-full bg-white opacity-10"></div>
                        
                        <div class="relative z-10">
                            <span class="inline-block px-3 py-1 bg-white bg-opacity-20 text-white text-sm font-medium rounded-full mb-4">LAPORKAN MASALAH</span>
                            <h3 class="text-3xl font-bold mb-4">Layanan Pengaduan Masalah Lingkungan</h3>
                            <p class="mb-6 opacity-90">
                                Temukan masalah lingkungan di sekitar Anda? Segera laporkan untuk penanganan yang cepat dan tepat.
                            </p>
                            <ul class="space-y-3 mb-8">
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Penanganan Cepat</span>
                                </li>
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Tracking Status Pengaduan</span>
                                </li>
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Notifikasi via Email</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-10 flex flex-col justify-center">
                        <h3 class="text-2xl font-bold mb-6">Buat Pengaduan</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Masalah Lingkungan</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                                    <option selected disabled>Pilih jenis masalah</option>
                                    <option>Pembuangan Sampah Liar</option>
                                    <option>Pencemaran Air</option>
                                    <option>Pencemaran Udara</option>
                                    <option>Penebangan Liar</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                                <input type="text" placeholder="Masukkan lokasi kejadian" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                                <textarea rows="2" placeholder="Jelaskan masalah secara singkat" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"></textarea>
                            </div>
                            <div class="pt-4">
                                <a href="/pengaduan/buat" class="inline-block w-full py-3 px-6 bg-gradient-to-r from-green-500 to-orange-500 text-white font-semibold rounded-lg hover:from-green-600 hover:to-orange-600 transition text-center">
                                    Lanjutkan Pengaduan
                                </a>
                                <p class="text-xs text-gray-500 mt-2 text-center">
                                    Anda akan dialihkan ke form pengaduan lengkap
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full mb-3">DAMPAK POSITIF</span>
            <h2 class="text-3xl font-bold mb-4">Kontribusi Kita Untuk Bumi</h2>
            <p class="max-w-2xl mx-auto text-gray-600">Hasil nyata dari berbagai upaya dan kegiatan peduli lingkungan yang telah dilakukan</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Impact Card 1 -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-green-500 transform transition hover:-translate-y-2 animate-on-scroll">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">5 Ton</h3>
                <p class="text-gray-600 mb-4">Sampah plastik telah didaur ulang dalam program daur ulang komunitas</p>
                
            </div>
            
            <!-- Impact Card 2 -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-orange-500 transform transition hover:-translate-y-2 animate-on-scroll">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">25 Sekolah</h3>
                <p class="text-gray-600 mb-4">Telah menerima edukasi lingkungan hidup melalui program Sekolah Hijau</p>
                
            </div>
            
            <!-- Impact Card 3 -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-blue-500 transform transition hover:-translate-y-2 animate-on-scroll">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">12 Km</h3>
                <p class="text-gray-600 mb-4">Sungai telah dibersihkan dan direhabilitasi melalui program Sungai Bersih</p>
                
            </div>
            
            <!-- Impact Card 4 -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-red-500 transform transition hover:-translate-y-2 animate-on-scroll">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">32 Panel</h3>
                <p class="text-gray-600 mb-4">Panel surya terpasang untuk energi bersih di fasilitas publik Tulungagung</p>
                
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-green-600 to-orange-500 relative overflow-hidden">
    <!-- Background Patterns -->
    <div class="absolute inset-0 z-0 opacity-10">
        <div class="pattern-grid"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6">Bergabunglah dengan Gerakan Peduli Lingkungan</h2>
            <p class="text-lg opacity-90 mb-8">
                Mari bersama menciptakan lingkungan yang lebih bersih, hijau, dan berkelanjutan untuk generasi mendatang.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/kampanye" class="px-8 py-4 bg-white text-green-600 hover:bg-green-50 rounded-lg font-bold shadow-lg transition transform hover:scale-105">
                    Ikuti Kampanye
                </a>
                <a href="/pengaduan/buat" class="px-8 py-4 bg-transparent border-2 border-white text-white hover:bg-white hover:bg-opacity-20 rounded-lg font-bold transition">
                    Buat Pengaduan
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    /* Leaf animations */
    .leaf {
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 100% 0% 100% 0% / 0% 100% 0% 100%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 15s infinite ease-in-out;
    }
    .leaf-1 {
        top: 10%;
        left: 10%;
        animation-delay: 0s;
        animation-duration: 17s;
        transform: rotate(45deg);
    }
    .leaf-2 {
        top: 20%;
        right: 15%;
        width: 150px;
        height: 150px;
        animation-delay: -2s;
        animation-duration: 20s;
        transform: rotate(30deg);
    }
    .leaf-3 {
        bottom: 20%;
        left: 20%;
        width: 120px;
        height: 120px;
        animation-delay: -4s;
        animation-duration: 22s;
        transform: rotate(60deg);
    }
    .leaf-4 {
        bottom: 15%;
        right: 10%;
        width: 80px;
        height: 80px;
        animation-delay: -6s;
        animation-duration: 18s;
        transform: rotate(15deg);
    }
    .leaf-5 {
        bottom: 50%;
        left: 5%;
        width: 50px;
        height: 50px;
        animation-delay: -8s;
        animation-duration: 15s;
        transform: rotate(75deg);
    }
    
    /* Bubble animations */
    .bubble {
        position: absolute;
        background: radial-gradient(circle at 70% 70%, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
        border-radius: 50%;
        animation: rise 20s infinite ease-in-out;
    }
    .bubble-1 {
        bottom: -100px;
        left: 30%;
        width: 100px;
        height: 100px;
        animation-delay: 0s;
    }
    .bubble-2 {
        bottom: -150px;
        right: 25%;
        width: 120px;
        height: 120px;
        animation-delay: -5s;
        animation-duration: 25s;
    }
    .bubble-3 {
        bottom: -80px;
        left: 60%;
        width: 60px;
        height: 60px;
        animation-delay: -10s;
        animation-duration: 18s;
    }
    
    /* Animation Keyframes */
    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-40px) rotate(10deg);
        }
    }
    
    @keyframes rise {
        0% {
            transform: translateY(0) scale(1);
            opacity: 0;
        }
        20% {
            opacity: 0.2;
        }
        50% {
            opacity: 0.1;
        }
        100% {
            transform: translateY(-800px) scale(1.5);
            opacity: 0;
        }
    }
    
    /* Fading animations */
    .animate-fade-in {
        opacity: 0;
        animation: fadeIn 1s forwards;
    }
    
    .animate-fade-in-up {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 1s forwards;
    }
    
    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Pulse animation */
    .animate-pulse-slow {
        animation: pulseSlow 3s infinite;
    }
    
    @keyframes pulseSlow {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
        }
    }
    
    /* Simple Carousel - Clean Version */
    #simple-carousel {
        position: relative;
    }

    .carousel-track {
        position: relative;
    }

    .carousel-slide {
        transition-property: opacity;
        transition-duration: 1000ms;
        transition-timing-function: ease-in-out;
        z-index: 1;
    }

    .carousel-slide.active {
        opacity: 1;
        z-index: 2;
    }

    .carousel-slide:not(.active) {
        opacity: 0;
        z-index: 1;
    }

    .carousel-slide img {
        object-position: center;
    }

    .carousel-dot {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .carousel-dot.active {
        background-color: white;
        transform: scale(1.5);
        background-opacity: 1;
    }
    
    /* Shadow for feature cards */
    .shadow-feature {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    /* Pattern backgrounds */
    .pattern-dots {
        background-image: radial-gradient(rgba(255, 255, 255, 0.4) 2px, transparent 2px);
        background-size: 30px 30px;
        height: 100%;
        width: 100%;
    }
    
    .pattern-grid {
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.3) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.3) 1px, transparent 1px);
        background-size: 50px 50px;
        height: 100%;
        width: 100%;
    }
    
    /* Scroll animations */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    
    .animate-on-scroll.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Counter styling */
    .counter {
        font-variant-numeric: tabular-nums;
    }

    /* Loader CSS */
    .pulse {
        position: relative;
        height: 176px;
        width: 176px;
    }

    .pulse:before,
    .pulse:after {
        border-radius: 50%;
        content: '';
        position: absolute;
    }

    .pulse:before {
        background: #2ce8a9;
        height: 35.2px;
        width: 35.2px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .pulse:after {
        animation: pulse-t3pv1p 1.7999999999999998s infinite;
        border: 17.6px solid #2ce8a9;
        height: 100%;
        width: 100%;
    }

    @keyframes pulse-t3pv1p {
        from {
            opacity: 1;
            transform: scale(0);
        }

        to {
            opacity: 0;
            transform: scale(1);
        }
    }
    
    /* Overlay loader untuk seluruh halaman */
    .overlay-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
</style>
@endpush

@push('scripts')
<script>
    // Menunggu dokumen selesai dimuat sebelum menjalankan semua script
    document.addEventListener('DOMContentLoaded', function() {
        // ------ 1. FUNGSI ANIMASI SCROLL ------
        function initScrollAnimations() {
            const animateElements = document.querySelectorAll('.animate-on-scroll');
            
            // Animate elements that are already visible on page load
            animateElementsInView();
            
            // Animate elements as they scroll into view
            window.addEventListener('scroll', function() {
                animateElementsInView();
            });
            
            function animateElementsInView() {
                animateElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementTop < windowHeight - 100) {
                        element.classList.add('animate');
                    }
                });
            }
        }

        // ------ 2. FUNGSI COUNTER ANIMATION ------
        function initCounterAnimations() {
            const counterItems = document.querySelectorAll('.counter-item');
            
            counterItems.forEach(item => {
                const counter = item.querySelector('.counter');
                const target = parseInt(item.dataset.count);
                
                const observer = new IntersectionObserver(entries => {
                    if (entries[0].isIntersecting) {
                        let current = 0;
                        const step = target / 50; // Divide animation into 50 steps
                        
                        const updateCounter = () => {
                            current += step;
                            if (current < target) {
                                counter.innerText = Math.floor(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.innerText = target;
                            }
                        };
                        
                        requestAnimationFrame(updateCounter);
                        observer.unobserve(item);
                    }
                }, { threshold: 0.5 });
                
                observer.observe(item);
            });
        }

        // ------ 3. FUNGSI CAMPAIGN SLIDER ------
        function initCampaignSlider() {
            const campaignSlider = document.querySelector('.campaign-slider');
            if (campaignSlider) {
                const campaignItems = campaignSlider.querySelector('.campaign-items');
                const prevBtn = campaignSlider.querySelector('.carousel-nav-prev');
                const nextBtn = campaignSlider.querySelector('.carousel-nav-next');
                
                if (prevBtn && nextBtn) {
                    const cardWidth = 384; // Width of each card with margin
                    
                    nextBtn.addEventListener('click', () => {
                        campaignItems.scrollBy({ left: cardWidth, behavior: 'smooth' });
                    });
                    
                    prevBtn.addEventListener('click', () => {
                        campaignItems.scrollBy({ left: -cardWidth, behavior: 'smooth' });
                    });
                }
            }
        }

        // ------ 4. FUNGSI HERO CAROUSEL ------
        function initHeroCarousel() {
            const carousel = document.getElementById('simple-carousel');
            if (!carousel) return;
            
            const slides = carousel.querySelectorAll('.carousel-slide');
            const dots = carousel.querySelectorAll('.carousel-dot');
            
            // Jika tidak ada slides, tidak perlu melanjutkan
            if (!slides.length) return;
            
            let currentIndex = 0;
            let slideInterval;
            
            // Fungsi untuk berpindah ke slide tertentu
            function goToSlide(index) {
                // Nonaktifkan semua slides
                slides.forEach(slide => {
                    slide.classList.remove('active');
                    slide.style.opacity = '0';
                });
                
                // Nonaktifkan semua dots
                dots.forEach(dot => {
                    dot.classList.remove('active');
                });
                
                // Aktifkan slide dan dot yang sesuai
                slides[index].classList.add('active');
                slides[index].style.opacity = '1';
                
                if (dots[index]) {
                    dots[index].classList.add('active');
                }
                
                currentIndex = index;
            }
            
            // Fungsi untuk pindah ke slide berikutnya
            function nextSlide() {
                const newIndex = (currentIndex + 1) % slides.length;
                goToSlide(newIndex);
            }
            
            // Fungsi untuk pindah ke slide sebelumnya
            function prevSlide() {
                const newIndex = (currentIndex - 1 + slides.length) % slides.length;
                goToSlide(newIndex);
            }
            
            // Fungsi untuk memulai autoplay
            function startAutoplay() {
                // Clear existing interval if any
                if (slideInterval) {
                    clearInterval(slideInterval);
                }
                
                // Set new interval
                slideInterval = setInterval(() => {
                    nextSlide();
                }, 2000); // Change slide every 5 seconds
            }
            
            // Fungsi untuk menghentikan autoplay
            function stopAutoplay() {
                clearInterval(slideInterval);
            }
            
            // Set up event listeners for dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    goToSlide(index);
                    resetInterval();
                });
            });
            
            // Reset interval
            function resetInterval() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Handle hover
            carousel.addEventListener('mouseenter', stopAutoplay);
            carousel.addEventListener('mouseleave', startAutoplay);
            
            // Handle touch events for mobile
            let touchStartX = 0;
            let touchEndX = 0;
            
            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, {passive: true});
            
            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, {passive: true});
            
            function handleSwipe() {
                const swipeThreshold = 50;
                if (touchEndX < touchStartX - swipeThreshold) {
                    // Swipe left, go to next slide
                    stopAutoplay();
                    nextSlide();
                    startAutoplay();
                }
                
                if (touchEndX > touchStartX + swipeThreshold) {
                    // Swipe right, go to previous slide
                    stopAutoplay();
                    prevSlide();
                    startAutoplay();
                }
            }
            
            // Initialize: show first slide and start autoplay
            goToSlide(0);
            startAutoplay();
        }

        // ------ INISIALISASI SEMUA FUNGSI ------
        // Pastikan setiap fungsi dijalankan secara terpisah
        // dan tidak saling bergantung
        
        // Init scroll animations
        initScrollAnimations();
        
        // Init counter animations
        initCounterAnimations();
        
        // Init campaign slider
        initCampaignSlider();
        
        // Init hero carousel
        initHeroCarousel();
    });
</script>
@endpush