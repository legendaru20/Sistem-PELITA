@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <div class="container mx-auto px-4 py-16 sm:py-20">
        <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-6 sm:p-8">
            <div class="text-center">
                <div class="mb-6 text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                
                <h1 class="text-2xl sm:text-3xl font-bold mb-3">Terima Kasih!</h1>
                <p class="text-gray-600 mb-6">
                    Pengajuan kampanye Anda telah kami terima. Tim kami akan segera meninjau dan memverifikasi kampanye Anda.
                    Kami telah mengirimkan email konfirmasi ke alamat email yang Anda daftarkan.
                </p>
                
                <div class="bg-blue-50 text-blue-800 p-4 rounded-lg mb-6 text-sm text-left">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Informasi Penting</p>
                            <ul class="mt-1 list-disc list-inside">
                                <li>Proses verifikasi dapat memakan waktu 1-3 hari kerja</li>
                                <li>Anda akan menerima notifikasi email ketika status kampanye diperbarui</li>
                                <li>Jika ada pertanyaan, silakan hubungi kami melalui form kontak</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <a href="{{ route('kampanye.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-lg font-medium transition">
                        Kembali ke Halaman Kampanye
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection