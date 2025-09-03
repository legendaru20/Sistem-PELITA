@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Hero Banner -->
    <div class="relative h-64 sm:h-80 md:h-96 bg-gray-200">
        @if($berita->thumbnail)
            <img src="{{ asset('storage/' . $berita->thumbnail) }}" 
                 alt="{{ $berita->judul }}" 
                 class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-blue-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
        @endif
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>

    <div class="container mx-auto px-4 py-8 sm:py-12">
        <!-- Breadcrumb -->
        <div class="mb-6 text-sm">
            <div class="flex items-center text-gray-600">
                <a href="{{ route('berita.index') }}" class="hover:text-blue-600">Berita</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-800">{{ $berita->judul }}</span>
            </div>
        </div>

        <!-- Setelah bagian breadcrumb dan sebelum main content -->
        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl shadow-md p-6 sm:p-8">
                    <!-- Tambahkan banner pengaduan jika berita terkait dengan pengaduan -->
                    @if($berita->pengaduan)
                    <div class="mb-4 bg-amber-50 border-l-4 border-amber-500 p-4 rounded">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium text-amber-800">Hasil dari Pengaduan:</span>
                        </div>
                        <div class="mt-2 text-amber-700">{{ $berita->pengaduan->deskripsi_pengaduan }}</div>
                    </div>
                    @endif

                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-sm text-gray-500">{{ $berita->created_at->format('d F Y') }}</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Berita</span>
                        </div>
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">{{ $berita->judul }}</h1>
                        <div class="flex items-center gap-4">
                            <span class="text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $berita->author }}
                            </span>
                            <span class="text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $berita->alamat }}
                            </span>
                        </div>
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
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul) }}" 
                           target="_blank" 
                           class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-500 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}" 
                           target="_blank" 
                           class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Article Content -->
                    <div class="prose max-w-none mb-6">
                        {!! $berita->konten !!}
                    </div>

                    <!-- Tags if available -->
                    @if($berita->tags)
                    <div class="mt-8 pt-6 border-t">
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $berita->tags) as $tag)
                                <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">
                                    {{ trim($tag) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 mt-8 lg:mt-0">
                <!-- Lokasi Berita -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold mb-4">Lokasi</h3>
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="text-gray-700">{{ $berita->alamat }}</p>
                    </div>
                </div>

                <!-- Related Articles -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold mb-4">Berita Terkait</h3>
                    
                    @if(count($relatedBerita) > 0)
                        <div class="space-y-4">
                            @foreach($relatedBerita as $related)
                                <a href="{{ route('berita.show', $related->id) }}" class="flex group">
                                    <div class="w-24 h-16 flex-shrink-0 mr-4">
                                        @if($related->thumbnail)
                                            <img src="{{ asset('storage/' . $related->thumbnail) }}" 
                                                 alt="{{ $related->judul }}" 
                                                 class="w-full h-full object-cover rounded">
                                        @else
                                            <div class="w-full h-full bg-blue-100 flex items-center justify-center rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium group-hover:text-blue-600 line-clamp-2">{{ $related->judul }}</h4>
                                        <span class="text-xs text-gray-500">{{ $related->created_at->format('d M Y') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Tidak ada berita terkait.</p>
                    @endif
                </div>

                <!-- Back to News -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <a href="{{ route('berita.index') }}" 
                       class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali ke Daftar Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection