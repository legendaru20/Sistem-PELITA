@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Hero Section with Background Image -->
    <section class="relative overflow-hidden text-white py-12 sm:py-20">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/agenda.jpg') }}" alt="Agenda Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-700/85 to-green-500/85"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 sm:mb-4 text-shadow">Agenda Kegiatan</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-6 sm:mb-8 max-w-3xl mx-auto">
                Jadwal kegiatan dan acara peduli lingkungan
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-xl mx-auto mt-6">
                <form action="{{ route('agenda.index') }}" method="GET">
                    <div class="flex rounded-lg overflow-hidden shadow-lg">
                        <input type="text" name="search" placeholder="Cari agenda..." class="w-full px-4 py-3 text-gray-700 focus:outline-none" value="{{ request('search') }}">
                        <!-- Search Bar Button - UPDATED -->
                        <button type="submit" class="bg-white text-green-600 px-4 hover:bg-gray-100 transition flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Agenda List Section -->
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            @if(count($agendas) > 0)
                <!-- Featured Agenda (First/Latest) -->
                @php $featuredAgenda = $agendas->first(); @endphp
                <div class="mb-12">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                        <div class="md:flex">
                            <!-- Added overflow-hidden to contain the zoomed image -->
                            <div class="md:w-1/2 h-64 md:h-auto overflow-hidden">
                                @if($featuredAgenda->thumbnail)
                                    <img src="{{ asset('storage/' . $featuredAgenda->thumbnail) }}" 
                                         alt="{{ $featuredAgenda->judul }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                @else
                                    <!-- Placeholder Image with hover effect -->
                                    <div class="w-full h-full bg-green-100 flex items-center justify-center transition-all duration-500 hover:bg-green-50 group">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-300 transition-transform duration-500 group-hover:scale-125" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 md:p-8 md:w-1/2">
                                <!-- Featured Article Tag - UPDATED -->
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full mb-4">
                                    Agenda Terkini
                                </span>
                                <!-- Article Title Hover - UPDATED -->
                                <h2 class="text-2xl font-bold mb-4 hover:text-green-600 transition">
                                    <a href="{{ route('agenda.show', $featuredAgenda->id) }}">{{ $featuredAgenda->judul }}</a>
                                </h2>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ Str::limit(strip_tags($featuredAgenda->konten), 200) }}
                                </p>
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="flex items-center text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $featuredAgenda->alamat }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">{{ $featuredAgenda->created_at->format('d M Y') }}</span>
                                    <!-- Read More Link - UPDATED -->
                                    <a href="{{ route('agenda.show', $featuredAgenda->id) }}" class="text-green-600 hover:text-orange-500 font-medium flex items-center">
                                        Lihat detail
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grid of Agendas with Hover Zoom Effect -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($agendas as $index => $agenda)
                        @if($index == 0)
                            @continue
                        @endif
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow h-full flex flex-col">
                            <!-- Added overflow-hidden to contain the zoomed image -->
                            <div class="h-48 overflow-hidden">
                                @if($agenda->thumbnail)
                                    <img src="{{ asset('storage/' . $agenda->thumbnail) }}" 
                                         alt="{{ $agenda->judul }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                @else
                                    <!-- Placeholder with hover effect -->
                                    <div class="w-full h-full bg-green-100 flex items-center justify-center transition-all duration-500 hover:bg-green-50 group">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-300 transition-transform duration-500 group-hover:scale-125" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h3 class="text-lg font-bold mb-3 hover:text-green-600 transition">
                                    <a href="{{ route('agenda.show', $agenda->id) }}">{{ $agenda->judul }}</a>
                                </h3>
                                <div class="flex items-center text-gray-600 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm">{{ $agenda->alamat }}</span>
                                </div>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($agenda->konten), 120) }}
                                </p>
                                <div class="mt-auto pt-4 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">{{ $agenda->created_at->format('d M Y') }}</span>
                                    <a href="{{ route('agenda.show', $agenda->id) }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
                                        Lihat detail
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
                    {{ $agendas->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-gray-400 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Belum ada agenda tersedia</h3>
                    <p class="text-gray-500">Kunjungi kembali halaman ini untuk informasi agenda terbaru.</p>
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
    
    /* Optimize hover transitions */
    .transition-transform {
        transition-property: transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
    }
    
    /* Add subtle filter effect on hover */
    .hover\:scale-110:hover {
        transform: scale(1.1);
        filter: brightness(1.05);
    }
    
    /* Improve accessibility */
    @media (prefers-reduced-motion: reduce) {
        .transition-transform {
            transition: none;
        }
        
        .hover\:scale-110:hover {
            transform: none;
            filter: brightness(1.1);
        }
    }
</style>
@endpush
@endsection