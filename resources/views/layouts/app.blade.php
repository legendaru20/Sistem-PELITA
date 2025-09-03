<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>{{ $title ?? 'Pelita' }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">  <!-- Add this line -->
    @stack('styles')
</head>

<body class="flex flex-col min-h-screen">
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="spinner"></div>
        <div class="loading-text">
            Memuat<span class="dots"></span>
        </div>
    </div>

    <!-- Header/Navbar -->
    <header class="fixed top-0 w-full bg-white shadow z-50">
        @include('components.navbar')
    </header>

    <!-- Content -->
    <main class="flex-1 pt-2">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    @vite('resources/js/app.js')
    
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITEKEY') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ env('RECAPTCHA_SITEKEY') }}', {action: 'pengaduan'}).then(function(token) {
            if(document.getElementById('recaptchaToken')) {
                document.getElementById('recaptchaToken').value = token;
            }
        });
    });
</script>


    <!-- Animation script -->
    <script src="{{ asset('js/animations.js') }}"></script>  <!-- Add this line -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Page loader script -->
    <script>
        // Sembunyikan loader saat halaman selesai dimuat
        window.addEventListener('load', function() {
            document.getElementById('pageLoader').style.opacity = '0';
            setTimeout(function() {
                document.getElementById('pageLoader').style.display = 'none';
            }, 300);
        });

        // Tampilkan loader saat klik link (navigasi halaman)
        document.addEventListener('click', function(e) {
            // Cari apakah yang diklik adalah link
            const link = e.target.closest('a');
            
            // Periksa apakah link valid untuk navigasi internal
            if (link && 
                link.href && 
                !link.href.includes('#') && 
                !link.href.includes('javascript:') && 
                !e.ctrlKey && 
                !e.metaKey && 
                !e.shiftKey && 
                !link.target &&
                !link.hasAttribute('download')) {
                
                // Periksa apakah link mengarah ke domain yang sama
                if (link.hostname === window.location.hostname) {
                    document.getElementById('pageLoader').style.display = 'flex';
                    document.getElementById('pageLoader').style.opacity = '1';
                }
            }
        });

        // Untuk form submit - tampilkan loader
        document.addEventListener('submit', function(e) {
            const form = e.target;
            
            // Pastikan form tidak memiliki atribut yang mengindikasikan AJAX
            if (!form.hasAttribute('data-no-loader') && !form.hasAttribute('data-remote')) {
                document.getElementById('pageLoader').style.display = 'flex';
                document.getElementById('pageLoader').style.opacity = '1';
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>