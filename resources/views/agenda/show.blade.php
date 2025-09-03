@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Image Gallery - Hero Section with Carousel -->
    <div x-data="{ activeSlide: 0, slides: {{ $agenda->gallery_images ? count($agenda->gallery_images) + 1 : 1 }} }" 
         class="relative h-72 sm:h-96 md:h-[500px] overflow-hidden">
        
        <!-- Thumbnail as first slide -->
        <div class="absolute inset-0 transition-opacity duration-500"
             :class="{ 'opacity-100': activeSlide === 0, 'opacity-0': activeSlide !== 0 }">
            @if($agenda->thumbnail)
                <img src="{{ asset('storage/' . $agenda->thumbnail) }}" 
                     alt="{{ $agenda->judul }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-green-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
        </div>
        
        <!-- Gallery images as additional slides -->
        @if($agenda->gallery_images)
            @foreach($agenda->gallery_images as $index => $image)
            <div class="absolute inset-0 transition-opacity duration-500"
                 :class="{ 'opacity-100': activeSlide === {{ $index + 1 }}, 'opacity-0': activeSlide !== {{ $index + 1 }} }">
                <img src="{{ asset('storage/' . $image) }}" 
                     alt="{{ $agenda->judul }} - Gambar {{ $index + 1 }}" 
                     class="w-full h-full object-cover">
            </div>
            @endforeach
        @endif
        
        <!-- Dark overlay and title -->
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center px-4">
                <span class="inline-block px-4 py-2 bg-green-500 text-white text-sm font-bold rounded-lg mb-4 transform hover:scale-105 transition-transform">Agenda</span>
                <h1 class="text-white text-3xl md:text-4xl lg:text-5xl font-bold drop-shadow-lg">{{ $agenda->judul }}</h1>
            </div>
        </div>
        
        <!-- Navigation arrows -->
        <button @click="activeSlide = (activeSlide - 1 + slides) % slides" 
                class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 rounded-full p-2 text-white focus:outline-none transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button @click="activeSlide = (activeSlide + 1) % slides" 
                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 rounded-full p-2 text-white focus:outline-none transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        
        <!-- Pagination indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <button @click="activeSlide = 0"
                    class="h-3 w-3 rounded-full transition-all duration-300"
                    :class="{ 'bg-white': activeSlide === 0, 'bg-white/50': activeSlide !== 0 }">
            </button>
            @if($agenda->gallery_images)
                @foreach($agenda->gallery_images as $index => $image)
                <button @click="activeSlide = {{ $index + 1 }}"
                        class="h-3 w-3 rounded-full transition-all duration-300"
                        :class="{ 'bg-white': activeSlide === {{ $index + 1 }}, 'bg-white/50': activeSlide !== {{ $index + 1 }} }">
                </button>
                @endforeach
            @endif
        </div>
        
        <!-- Gallery preview thumbnails -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 flex space-x-2 bg-black/40 p-2 rounded-lg">
            <!-- Thumbnail preview -->
            <button @click="activeSlide = 0" class="h-14 w-20 overflow-hidden rounded-md opacity-70 hover:opacity-100 transition" 
                    :class="{ 'ring-2 ring-white opacity-100': activeSlide === 0 }">
                @if($agenda->thumbnail)
                    <img src="{{ asset('storage/' . $agenda->thumbnail) }}" alt="Preview" class="object-cover h-full w-full">
                @else
                    <div class="h-full w-full bg-green-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
            </button>
            
            <!-- Gallery images previews -->
            @if($agenda->gallery_images)
                @foreach($agenda->gallery_images as $index => $image)
                <button @click="activeSlide = {{ $index + 1 }}" 
                        class="h-14 w-20 overflow-hidden rounded-md opacity-70 hover:opacity-100 transition"
                        :class="{ 'ring-2 ring-white opacity-100': activeSlide === {{ $index + 1 }} }">
                    <img src="{{ asset('storage/' . $image) }}" alt="Preview {{ $index + 1 }}" class="object-cover h-full w-full">
                </button>
                @endforeach
            @endif
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 sm:py-12">
        <!-- Breadcrumb -->
        <div class="mb-6 text-sm">
            <div class="flex items-center text-gray-600">
                <a href="{{ route('agenda.index') }}" class="hover:text-green-600">Agenda</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-800">{{ $agenda->judul }}</span>
            </div>
        </div>

        <!-- Kampanye Origin Badge - Jika agenda merupakan hasil dari kampanye -->
        @if(isset($agenda->kampanye) && $agenda->kampanye)
        <div class="mb-6">
            <div class="inline-flex items-center bg-orange-50 border border-orange-100 text-orange-800 px-4 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                <span class="text-sm mr-2">Hasil dari Kampanye:</span>
                <a href="{{ route('kampanye.show', $agenda->kampanye->id) }}" class="font-medium hover:underline">
                    {{ $agenda->kampanye->judul_kampanye }}
                </a>
            </div>
        </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl shadow-md p-6 sm:p-8">
                    <!-- Event Details Header -->
                    <div class="mb-8">
                        <div class="flex items-center gap-6 mb-4 flex-wrap">
                            <div class="flex items-center">
                                <div class="bg-green-100 p-2 rounded-lg mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500">Tanggal Publikasi</span>
                                    <span class="font-medium">{{ $agenda->created_at->format('d F Y') }}</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="bg-green-100 p-2 rounded-lg mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500">Lokasi</span>
                                    <span class="font-medium">{{ $agenda->alamat }}</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="bg-green-100 p-2 rounded-lg mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500">Dikelola oleh</span>
                                    <span class="font-medium">{{ $agenda->author }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image Grid for Mobile (Small Screens) -->
                    <div class="grid grid-cols-3 gap-2 mb-6 lg:hidden">
                        <!-- Main thumbnail -->
                        <div class="col-span-3">
                            @if($agenda->thumbnail)
                                <img src="{{ asset('storage/' . $agenda->thumbnail) }}" alt="{{ $agenda->judul }}" class="w-full h-40 object-cover rounded-lg">
                            @endif
                        </div>
                        
                        <!-- Gallery images -->
                        @if($agenda->gallery_images)
                            @foreach($agenda->gallery_images as $index => $image)
                                <div>
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $agenda->judul }} - Gambar {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    
                    <!-- Share buttons -->
                    <div class="flex space-x-2 mb-8">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                           target="_blank" 
                           class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($agenda->judul) }}" 
                           target="_blank" 
                           class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-500 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($agenda->judul . ' ' . url()->current()) }}" 
                           target="_blank" 
                           class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Article Content -->
                    <div class="prose max-w-none">
                        <h2 class="text-2xl font-bold mb-4">Detail Agenda</h2>
                        {!! $agenda->konten !!}
                    </div>
                    
                    <!-- Image Gallery Grid for larger screens -->
                    @if($agenda->gallery_images && count($agenda->gallery_images) > 0)
                    <div class="mt-8 hidden lg:block">
                        <h3 class="text-xl font-bold mb-4">Galeri Kegiatan</h3>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($agenda->gallery_images as $index => $image)
                            <div class="overflow-hidden rounded-lg shadow-md h-48 group cursor-pointer"
                                 x-data=""
                                 @click="$dispatch('open-lightbox', { index: {{ $index + 1 }} })">
                                <img src="{{ asset('storage/' . $image) }}" 
                                     alt="{{ $agenda->judul }} - Gambar {{ $index + 1 }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <!-- Call to Action -->
                    <div class="mt-10 pt-6 border-t border-gray-100">
                        <div class="bg-green-50 p-6 rounded-lg">
                            <h3 class="text-lg font-bold mb-2">Tertarik untuk berpartisipasi?</h3>
                            <p class="text-gray-600 mb-4">Mari bergabung dalam agenda ini untuk menjadikan lingkungan lebih baik.</p>
                            <a href="/kampanye" class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Hubungi Penyelenggara
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 mt-8 lg:mt-0">
                <!-- Event Location Map -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
                    <div class="p-6">
                        <h3 class="text-lg font-bold mb-4">Lokasi Kegiatan</h3>
                        <div class="flex items-center mb-4">
                            <span class="text-gray-700">{{ $agenda->alamat }}</span>
                        </div>
                    </div>
                    <div class="h-4">
                    </div>
                </div>

                <!-- Related Agendas -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold mb-4">Agenda Terkait</h3>
                    
                    @if(count($relatedAgendas) > 0)
                        <div class="space-y-4">
                            @foreach($relatedAgendas as $related)
                                <a href="{{ route('agenda.show', $related->id) }}" class="flex group">
                                    <div class="w-24 h-16 flex-shrink-0 mr-4 overflow-hidden rounded">
                                        @if($related->thumbnail)
                                            <img src="{{ asset('storage/' . $related->thumbnail) }}" 
                                                 alt="{{ $related->judul }}" 
                                                 class="w-full h-full object-cover rounded transition-transform duration-300 group-hover:scale-110">
                                        @else
                                            <div class="w-full h-full bg-green-100 flex items-center justify-center rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium group-hover:text-green-600 line-clamp-2">{{ $related->judul }}</h4>
                                        <span class="text-xs text-gray-500">{{ $related->created_at->format('d M Y') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Tidak ada agenda terkait.</p>
                    @endif
                </div>

                <!-- Back to Agendas -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <a href="{{ route('agenda.index') }}" 
                       class="flex items-center justify-center bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg font-medium transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali ke Daftar Agenda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox for Gallery Images -->
<div x-data="{ 
    open: false, 
    activeSlide: 0,
    totalSlides: {{ $agenda->gallery_images ? count($agenda->gallery_images) + 1 : 1 }} 
}" 
    x-show="open" 
    x-cloak
    @open-lightbox.window="open = true; activeSlide = $event.detail.index || 0"
    @keydown.escape.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-90">
    
    <button @click="open = false" class="absolute top-4 right-4 text-white hover:text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    
    <!-- Main thumbnail -->
    <div x-show="activeSlide === 0" class="max-w-4xl max-h-[80vh]">
        @if($agenda->thumbnail)
            <img src="{{ asset('storage/' . $agenda->thumbnail) }}" 
                 alt="{{ $agenda->judul }}" 
                 class="max-h-[80vh] w-auto mx-auto">
        @endif
    </div>
    
    <!-- Gallery images -->
    @if($agenda->gallery_images)
        @foreach($agenda->gallery_images as $index => $image)
            <div x-show="activeSlide === {{ $index + 1 }}" class="max-w-4xl max-h-[80vh]">
                <img src="{{ asset('storage/' . $image) }}" 
                     alt="{{ $agenda->judul }} - Gambar {{ $index + 1 }}" 
                     class="max-h-[80vh] w-auto mx-auto">
            </div>
        @endforeach
    @endif
    
    <!-- Navigation buttons -->
    <button @click="activeSlide = (activeSlide - 1 + totalSlides) % totalSlides" 
            class="absolute left-4 text-white hover:text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button @click="activeSlide = (activeSlide + 1) % totalSlides" 
            class="absolute right-4 text-white hover:text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush

@push('styles')
<style>
    [x-cloak] { display: none !important; }
    
    .prose img {
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    @media (max-width: 640px) {
        .prose {
            font-size: 0.95rem;
        }
    }
    
    /* Smooth transitions for gallery */
    .transition-opacity {
        transition: opacity 0.5s ease;
    }
</style>
@endpush
@endsection