@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Hero Section with Background Image -->
    <section class="relative overflow-hidden text-white py-12 sm:py-20">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/berita.jpg') }}" alt="Berita Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/90 to-orange-500/90"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 sm:mb-4 text-shadow">Berita Terkini</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-6 sm:mb-8 max-w-3xl mx-auto">
                Informasi terbaru seputar lingkungan dan kegiatan Pelita
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-xl mx-auto mt-6">
                <form action="{{ route('berita.index') }}" method="GET">
                    <div class="flex rounded-lg overflow-hidden shadow-lg">
                        <input type="text" name="search" placeholder="Cari berita..." class="w-full px-4 py-3 text-gray-700 focus:outline-none" value="{{ request('search') }}">
                        <button type="submit" class="bg-white text-blue-600 px-4 hover:bg-gray-100 transition flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Berita List Section -->
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            @if(count($berita) > 0)
                <!-- Featured Article (First/Latest) -->
                @php $featuredBerita = $berita->first(); @endphp
                <!-- Featured Article with Hover Zoom Effect -->
                <div class="mb-12">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                        <div class="md:flex">
                            <!-- Featured image container with overflow hidden -->
                            <div class="md:w-1/2 h-64 md:h-auto overflow-hidden">
                                @if($featuredBerita->thumbnail)
                                    <img src="{{ asset('storage/' . $featuredBerita->thumbnail) }}" 
                                         alt="{{ $featuredBerita->judul }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-green-100 flex items-center justify-center transition-all duration-500 hover:bg-green-50 group">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-300 transition-transform duration-500 group-hover:scale-125" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 md:p-8 md:w-1/2">
                                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full mb-4">
                                    Berita Terbaru
                                </span>
                                <h2 class="text-2xl font-bold mb-4 hover:text-blue-600 transition">
                                    <a href="{{ route('berita.show', $featuredBerita->id) }}">{{ $featuredBerita->judul }}</a>
                                </h2>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ Str::limit(strip_tags($featuredBerita->konten), 200) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-sm text-gray-500">{{ $featuredBerita->created_at->format('d M Y') }}</span>
                                        <span class="text-sm text-gray-500 ml-2">· {{ $featuredBerita->author }}</span>
                                    </div>
                                    <a href="{{ route('berita.show', $featuredBerita->id) }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                        Baca selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grid of Articles with Image Hover Effect -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($berita as $index => $artikel)
                        @if($index == 0)
                            @continue
                        @endif
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow h-full flex flex-col">
                            <!-- Image container with overflow hidden -->
                            <div class="h-48 overflow-hidden">
                                @if($artikel->thumbnail)
                                    <!-- Image with hover zoom effect -->
                                    <img src="{{ asset('storage/' . $artikel->thumbnail) }}" 
                                         alt="{{ $artikel->judul }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                @else
                                    <!-- Placeholder with hover effect -->
                                    <div class="w-full h-full bg-green-100 flex items-center justify-center transition-all duration-500 hover:bg-green-50 group">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-300 transition-transform duration-500 group-hover:scale-125" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <!-- Content remains the same -->
                            <div class="p-6 flex-1 flex flex-col">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-xs text-gray-500">{{ $artikel->created_at->format('d M Y') }}</span>
                                    <span class="text-xs text-gray-500">{{ $artikel->author }}</span>
                                </div>
                                <h3 class="text-lg font-bold mb-3 hover:text-green-600 transition">
                                    <a href="{{ route('berita.show', $artikel->id) }}">{{ $artikel->judul }}</a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($artikel->konten), 150) }}
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('berita.show', $artikel->id) }}" class="text-green-600 hover:text-orange-500 font-medium flex items-center">
                                        Baca selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $berita->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-gray-400 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Belum ada berita tersedia</h3>
                    <p class="text-gray-500">Kunjungi kembali halaman ini untuk informasi terbaru.</p>
                </div>
            @endif
        </div>
    </section>
</div>

@push('styles')
<style>
    .text-shadow {
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush
@endsection