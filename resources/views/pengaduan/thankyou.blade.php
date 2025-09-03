@extends('layouts.app')

@section('content')
<div class="pt-16 sm:pt-20">
    <div class="min-h-screen bg-gray-50 flex flex-col py-12">
        <div class="flex-grow flex items-center justify-center px-4">
            <div class="max-w-md w-full bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>

                        <h1 class="text-2xl font-bold text-gray-900 mb-4">Terima Kasih!</h1>
                        <p class="text-gray-600 mb-6">
                            Pengaduan Anda telah kami terima dan akan segera diproses. 
                            Anda akan menerima email konfirmasi dan notifikasi saat ada update.
                        </p>

                        <div class="bg-yellow-50 border border-yellow-100 rounded-lg p-4 mb-6">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                <div>
                                    <p class="text-sm text-yellow-700">
                                        Mohon periksa email Anda untuk informasi lebih lanjut mengenai pengaduan yang telah disampaikan.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <a href="{{ route('pengaduan.index') }}" class="block w-full py-3 px-4 text-center rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Kembali ke Halaman Pengaduan
                            </a>
                            <a href="{{ route('home') }}" class="block w-full py-3 px-4 text-center rounded-md border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Kembali ke Halaman Utama
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection