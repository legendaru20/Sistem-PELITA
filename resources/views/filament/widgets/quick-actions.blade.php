<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold tracking-tight">Aksi Cepat</h2>
            <p class="text-sm text-gray-500">Kelola konten PELITA</p>
        </div>

        <div class="mt-2 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <a href="{{ route('filament.admin.resources.kampanyes.create') }}" class="flex flex-col items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white p-6 text-center shadow-sm transition hover:border-primary-500 hover:bg-primary-50">
                <div class="rounded-full bg-primary-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-primary-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Buat Kampanye</span>
            </a>
            
            <a href="{{ route('filament.admin.resources.agendas.create') }}" class="flex flex-col items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white p-6 text-center shadow-sm transition hover:border-primary-500 hover:bg-primary-50">
                <div class="rounded-full bg-primary-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-primary-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Tambah Agenda</span>
            </a>
            
            <a href="{{ route('filament.admin.resources.pengaduans.index') }}" class="flex flex-col items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white p-6 text-center shadow-sm transition hover:border-primary-500 hover:bg-primary-50">
                <div class="rounded-full bg-primary-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-primary-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Lihat Pengaduan</span>
            </a>
            
            <a href="{{ route('filament.admin.resources.beritas.create') }}" class="flex flex-col items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white p-6 text-center shadow-sm transition hover:border-primary-500 hover:bg-primary-50">
                <div class="rounded-full bg-primary-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-primary-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Tulis Berita</span>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
