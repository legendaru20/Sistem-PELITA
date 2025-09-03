@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Hero Section -->
    <section class="relative py-12 sm:py-20 text-white overflow-hidden">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/kampanye-bg.jpg') }}" alt="Kampanye Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600/70 to-orange-500/70"></div>
        </div>
        
        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 sm:mb-4 text-shadow-sm">Kampanye Peduli Lingkungan</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-6 sm:mb-8 max-w-3xl mx-auto">
                Bergabunglah dalam gerakan peduli lingkungan dan berkontribusi untuk perubahan positif
            </p>
            <a href="{{ url('/kampanye/create') }}" class="inline-flex items-center bg-white text-green-600 hover:bg-green-50 px-6 py-3 rounded-lg text-lg font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Ajukan Kampanye Baru
            </a>
        </div>
    </section>

    <!-- Kampanye List Section -->
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold mb-2">Kampanye Aktif</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Kampanye-kampanye yang sedang berlangsung saat ini dan telah diverifikasi oleh tim kami
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($kampanyes as $kampanye)
                @php
                    $isExpired = \Carbon\Carbon::parse($kampanye->tanggal_selesai)->isPast();
                @endphp
                <div class="relative bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                    {{-- Badge status --}}
                    <div class="absolute top-2 right-2 z-10">
                        <span class="inline-block text-xs font-semibold uppercase px-2 py-1 rounded 
                            {{ $isExpired ? 'bg-orange-600 text-white' : 'bg-green-600 text-white' }}">
                            {{ $isExpired ? 'Selesai' : 'Aktif' }}
                        </span>
                    </div>

                    <a href="{{ route('kampanye.show', $kampanye->id) }}" class="block aspect-w-16 aspect-h-10 overflow-hidden">
                        <img src="{{ asset('storage/' . $kampanye->thumbnail) }}"
                             alt="{{ $kampanye->judul_kampanye }}"
                             class="w-full h-48 object-cover object-center transition-transform duration-300 hover:scale-105">
                    </a>
                    <div class="p-5 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-2 line-clamp-1">{{ $kampanye->judul_kampanye }}</h3>
                        <p class="text-gray-600 mb-4 text-sm sm:text-base line-clamp-2">{{ Str::limit($kampanye->deskripsi, 100) }}</p>
                        
                        <div class="flex justify-between items-center mb-4 text-sm">
                            <span class="text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ Str::limit($kampanye->lokasi, 20) }}
                            </span>
                            <span class="text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($kampanye->tanggal_mulai)->format('d M Y') }}
                            </span>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-4">
                            <a href="{{ route('kampanye.show', $kampanye->id) }}" 
                               class="text-green-600 hover:text-green-700 font-medium flex items-center text-sm">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full p-10 text-center">
                    <div class="text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-xl">Belum ada kampanye yang aktif saat ini.</p>
                    <p class="mt-2 text-gray-500">Jadilah yang pertama mengajukan kampanye peduli lingkungan!</p>
                    <div class="mt-6">
                        <a href="{{ url('/kampanye/create') }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Ajukan Kampanye
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>

<!-- Tambahkan style untuk text shadow -->
@push('styles')
<style>
    .text-shadow-sm {
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush
@endsection