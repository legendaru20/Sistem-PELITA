@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-orange-500 py-8 sm:py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center mb-4">
                    <a href="{{ route('pengaduan.index') }}" class="text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>
                <h1 class="text-2xl sm:text-3xl text-white font-bold">Form Pengaduan Masyarakat</h1>
                <p class="text-white text-opacity-90 mt-2">
                    Sampaikan pengaduan Anda dengan mengisi form di bawah ini. Pastikan semua data yang dimasukkan valid.
                </p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-gray-50 py-10 sm:py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Form Container -->
                <div class="md:flex">
                    <!-- Form Instruction Sidebar -->
                    <div class="md:w-1/3 bg-red-50 p-6 sm:p-8">
                        <h3 class="text-lg font-bold text-red-700 mb-4">Petunjuk Pengisian</h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>Semua field yang bertanda * harus diisi</span>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>NIK harus 16 digit sesuai KTP</span>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>Sertakan minimal 2 foto sebagai bukti</span>
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>Notifikasi akan dikirim ke email Anda</span>
                            </li>
                        </ul>

                        <div class="mt-8">
                            <h4 class="text-red-700 font-bold mb-2">Contoh Foto yang Baik:</h4>
                            <div class="grid grid-cols-2 gap-2 mt-2">
                                <div class="bg-red-100 aspect-video rounded-md overflow-hidden">
                                    <img src="{{ asset('images/pengaduan1.jpg') }}" alt="Contoh Foto 1" class="w-full h-full object-cover">
                                </div>
                                <div class="bg-red-100 aspect-video rounded-md overflow-hidden">
                                    <img src="{{ asset('images/pengaduan2.jpg') }}" alt="Contoh Foto 2" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-600">
                                Foto harus jelas menampilkan permasalahan dan lokasi yang dimaksud
                            </p>
                        </div>
                    </div>
                    
                    <!-- Form Fields -->
                    <div class="md:w-2/3 p-6 sm:p-8">
                        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-600">*</span></label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500" value="{{ old('nama_lengkap') }}">
                                    @error('nama_lengkap')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK (Nomor Induk Kependudukan) <span class="text-red-600">*</span></label>
                                    <input type="text" name="nik" id="nik" required minlength="16" maxlength="16" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500" value="{{ old('nik') }}">
                                    <p class="mt-1 text-xs text-gray-500">Masukkan 16 digit NIK sesuai KTP</p>
                                    @error('nik')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="nomor_wa" class="block text-sm font-medium text-gray-700">Nomor WhatsApp <span class="text-red-600">*</span></label>
                                        <input type="tel" name="nomor_wa" id="nomor_wa" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500" value="{{ old('nomor_wa') }}">
                                        @error('nomor_wa')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-600">*</span></label>
                                        <input type="email" name="email" id="email" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="lokasi_pengaduan" class="block text-sm font-medium text-gray-700">Lokasi Pengaduan <span class="text-red-600">*</span></label>
                                    <input type="text" name="lokasi_pengaduan" id="lokasi_pengaduan" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500" value="{{ old('lokasi_pengaduan') }}">
                                    <p class="mt-1 text-xs text-gray-500">Contoh: Jalan Merdeka No. 123, RT 01/RW 02, Kelurahan Sukajadi, Kecamatan Cibeunying, Kota Bandung</p>
                                    @error('lokasi_pengaduan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="deskripsi_pengaduan" class="block text-sm font-medium text-gray-700">Deskripsi Pengaduan <span class="text-red-600">*</span></label>
                                    <textarea name="deskripsi_pengaduan" id="deskripsi_pengaduan" rows="4" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">{{ old('deskripsi_pengaduan') }}</textarea>
                                    <p class="mt-1 text-xs text-gray-500">Jelaskan dengan detail permasalahan yang ingin Anda laporkan</p>
                                    @error('deskripsi_pengaduan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Ganti input file dan preview container dengan ini -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Lampiran Foto <span class="text-red-600">*</span> (min. 2 foto)</label>
                                    
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center" 
                                         x-on:dragover.prevent="dragOver = true"
                                         x-on:dragleave.prevent="dragOver = false"
                                         x-on:drop.prevent="handleDrop($event)"
                                         :class="{'border-red-400 bg-red-50': dragOver}">
                                        
                                        <input type="file" id="lampiran_foto" name="lampiran_foto[]" multiple accept="image/*" 
                                               x-on:change="handleFileSelect($event)">
                                        
                                        <div class="space-y-2 mt-4">
                                            <p class="text-sm text-gray-500">Format: JPG, PNG, JPEG. Maks: 5MB per file</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Simple Preview -->
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-4" x-show="previewImages.length > 0">
                                        <template x-for="(image, index) in previewImages" :key="index">
                                            <div class="relative">
                                                <img :src="image.preview" class="h-24 w-full object-cover rounded-md">
                                                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-1 truncate">
                                                    <span x-text="image.name"></span> (<span x-text="image.size"></span>)
                                                </div>
                                                <button type="button" @click="removeImage(index)" class="absolute top-1 right-1 bg-red-100 text-red-600 rounded-full p-1 w-6 h-6 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                    
                                    <!-- File Counter & Errors -->
                                    <div class="mt-2">
                                        <span x-show="previewImages.length > 0" x-text="`${previewImages.length} foto dipilih`" class="text-green-600 text-sm font-medium"></span>
                                        <div x-show="fileError" class="text-red-600 text-sm mt-1" x-text="fileError"></div>
                                        
                                        @error('lampiran_foto')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        @error('lampiran_foto.*')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <!-- Fallback instructions -->
                                    <div class="bg-yellow-50 border border-yellow-200 rounded p-3 text-sm text-yellow-800 mt-2">
                                        <p>
                                            <strong>Catatan:</strong> Jika preview tidak muncul, foto tetap bisa diupload. Pastikan Anda memilih minimal 2 foto.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <!-- Hidden field for reCAPTCHA v3 token -->
                                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                
                                <!-- Notifikasi bahwa formulir dilindungi -->
                                <div class="mb-4 text-xs text-gray-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                    Form ini dilindungi oleh Google reCAPTCHA untuk keamanan
                                </div>

                                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Kirim Pengaduan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v3.12.0/dist/alpine.min.js" defer></script>
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

    function photoUploader() {
        return {
            dragOver: false,
            previewImages: [],
            fileError: '',
            
            handleDrop(e) {
                this.dragOver = false;
                this.handleFiles(e.dataTransfer.files);
            },
            
            handleFileSelect(e) {
                // Simpel solution: just clear previous error
                this.fileError = '';
                
                // Check if files were selected
                if (e.target.files && e.target.files.length > 0) {
                    // Show at least basic info about selected files
                    this.previewImages = [];
                    
                    // Create previews
                    Array.from(e.target.files).forEach(file => {
                        try {
                            const reader = new FileReader();
                            
                            reader.onload = (e) => {
                                this.previewImages.push({
                                    name: file.name,
                                    size: this.formatSize(file.size),
                                    preview: e.target.result
                                });
                            };
                            
                            reader.readAsDataURL(file);
                        } catch (error) {
                            console.error("Error creating preview:", error);
                        }
                    });
                }
            },
            
            formatSize(bytes) {
                if (bytes < 1024) return bytes + ' B';
                else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
                else return (bytes / 1048576).toFixed(1) + ' MB';
            },
            
            // Simplified method that avoids DataTransfer API completely
            removeImage(index) {
                // Just remove from preview
                this.previewImages.splice(index, 1);
                
                // Show warning that user needs to reselect files
                if (this.previewImages.length === 0) {
                    this.fileError = 'Anda perlu memilih foto kembali setelah menghapus.';
                } else {
                    this.fileError = 'Perubahan hanya pada preview. Jika ada perubahan, pilih kembali semua foto.';
                }
            },
            
            handleFiles(files) {
                // Simplified method that just sets the input value
                // This avoids using DataTransfer API
                document.getElementById('lampiran_foto').files = files;
                this.handleFileSelect({target: {files: files}});
            }
        }
    }
</script>
@endpush
@endsection