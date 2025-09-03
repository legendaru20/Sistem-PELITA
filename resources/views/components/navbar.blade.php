<header class="fixed w-full top-0 z-50 transition-all duration-300" id="main-header">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4 transition-all duration-300" id="navbar-content">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <div class="logo-container overflow-hidden transition-all duration-300">
                        <img src="{{ asset('images/logo.png') }}" alt="PELITA Logo" class="h-10 w-auto transition-all duration-300" id="nav-logo">
                    </div>
                    <span class="text-2xl font-bold transition-colors duration-300" id="brand-text">
                        <span class="bg-gradient-to-r from-green-600 to-orange-500 bg-clip-text text-transparent">PELITA</span>
                    </span>
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="p-2 rounded-md text-gray-600 hover:text-green-600 hover:bg-gray-100 focus:outline-none transition-colors duration-300">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    Beranda
                </a>
                
                <!-- Artikel Dropdown -->
                <div class="relative group" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false" class="nav-link flex items-center gap-1.5">
                        Artikel
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 transform scale-95" 
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50" 
                         style="display: none;">
                        <a href="/agenda" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-md mx-1">Agenda</a>
                        <a href="/berita" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-md mx-1">Berita</a>
                    </div>
                </div>
                
                <a href="/kampanye" class="nav-link {{ request()->is('kampanye*') ? 'active' : '' }}">
                    Kampanye
                </a>
                
                <a href="/pengaduan" class="nav-link {{ request()->is('pengaduan*') ? 'active' : '' }}">
                    Pengaduan
                </a>
                
                <a href="/tentang" class="nav-link {{ request()->is('tentang*') ? 'active' : '' }}">
                    Tentang Kami
                </a>
            </nav>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden shadow-inner border-t hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="mobile-nav-link {{ request()->is('/') ? 'bg-green-50 text-green-600' : '' }}">
                Beranda
            </a>
            
            <div x-data="{ mobileArtikelOpen: false }">
                <button @click="mobileArtikelOpen = !mobileArtikelOpen" class="mobile-nav-link w-full text-left flex justify-between items-center">
                    <span>Artikel</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': mobileArtikelOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <div x-show="mobileArtikelOpen" class="mt-1 ml-4 border-l-2 border-green-100 pl-2">
                    <a href="/agenda" class="mobile-sub-link">Agenda</a>
                    <a href="/berita" class="mobile-sub-link">Berita</a>
                </div>
            </div>
            
            <a href="/kampanye" class="mobile-nav-link {{ request()->is('kampanye*') ? 'bg-green-50 text-green-600' : '' }}">
                Kampanye
            </a>
            
            <a href="/pengaduan" class="mobile-nav-link {{ request()->is('pengaduan*') ? 'bg-green-50 text-green-600' : '' }}">
                Pengaduan
            </a>
            
            <a href="/tentang" class="mobile-nav-link {{ request()->is('tentang*') ? 'bg-green-50 text-green-600' : '' }}">
                Tentang Kami
            </a>
        </div>
    </div>
</header>

<style>
.nav-link {
    @apply relative font-medium transition-colors px-1 py-2;
    color: var(--nav-text-color, #374151);
    text-shadow: var(--nav-text-shadow, none);
}

.nav-link::after {
    content: '';
    @apply absolute bottom-0 left-0 w-0 h-0.5 transition-all duration-300 ease-out;
    background: var(--nav-indicator-color, linear-gradient(to right, #10B981, #F59E0B));
    box-shadow: var(--nav-indicator-shadow, none);
}

.nav-link:hover {
    color: var(--nav-hover-color, #10B981);
}

.nav-link:hover::after, .nav-link.active::after {
    @apply w-full;
}

.nav-link.active {
    color: var(--nav-active-color, #10B981);
    font-weight: var(--nav-active-weight, 500);
}

.mobile-nav-link {
    @apply block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50;
}

.mobile-sub-link {
    @apply block px-3 py-2 text-sm font-medium text-gray-600 hover:text-green-600;
}

/* Animation for scroll effect */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* High-contrast mode for better accessibility */
@media (prefers-contrast: more) {
    .nav-link {
        text-shadow: 0 0 1px rgba(0,0,0,0.5);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Advanced scroll effects
    const header = document.getElementById('main-header');
    const navbarContent = document.getElementById('navbar-content');
    const navLogo = document.getElementById('nav-logo');
    const brandText = document.getElementById('brand-text');
    const pelitaText = brandText ? brandText.querySelector('span') : null;
    
    // Set initial state
    header.classList.add('bg-white');
    header.classList.add('shadow-md');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            // Scrolled state - Beautiful gradient that matches website design
            header.classList.remove('bg-white');
            
            // Remove solid background class if exists
            header.classList.remove('bg-green-800');
            
            // Add beautiful gradient background with slight transparency
            header.style.background = 'linear-gradient(90deg, rgba(16, 122, 87, 0.97), rgba(5, 102, 70, 0.97))';
            
            // Add subtle pattern overlay for texture
            header.style.backgroundImage = "url('data:image/svg+xml,%3Csvg width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h20v20H0z\" fill=\"none\"%3E%3C/path%3E%3Cpath d=\"M10 10a1 1 0 11-2 0 1 1 0 012 0z\" fill=\"rgba(255,255,255,0.05)\"%3E%3C/path%3E%3C/svg%3E'), " + header.style.background;
            
            // Enhanced shadow with subtle color highlight
            header.classList.add('shadow-xl');
            header.style.boxShadow = '0 10px 25px -5px rgba(16, 122, 87, 0.2), 0 8px 10px -6px rgba(16, 122, 87, 0.1)';
            
            // Add subtle border highlight
            header.style.borderBottom = '1px solid rgba(255, 255, 255, 0.1)';
            
            // Change navbar padding
            navbarContent.classList.add('py-2');
            navbarContent.classList.remove('py-4');
            
            // Shrink logo slightly
            navLogo.classList.add('scale-90');
            
            // Change PELITA text to white with elegant text shadow
            if (pelitaText) {
                pelitaText.classList.remove('bg-gradient-to-r', 'from-green-600', 'to-orange-500', 'bg-clip-text', 'text-transparent');
                pelitaText.classList.add('text-white', 'font-bold');
                pelitaText.style.textShadow = '0 1px 2px rgba(0,0,0,0.2), 0 0 15px rgba(255,255,255,0.15)';
            }
            
            // Change text colors for elegant contrast on gradient background
            document.documentElement.style.setProperty('--nav-text-color', '#ffffff');
            document.documentElement.style.setProperty('--nav-text-shadow', '0 1px 1px rgba(0,0,0,0.15)');
            document.documentElement.style.setProperty('--nav-hover-color', '#FDE68A'); // Soft yellow for hover
            document.documentElement.style.setProperty('--nav-active-color', '#FDE68A'); // Soft yellow for active
            document.documentElement.style.setProperty('--nav-active-weight', '600');
            document.documentElement.style.setProperty('--nav-indicator-color', 'linear-gradient(to right, #FDE68A, #FBBF24)');
            document.documentElement.style.setProperty('--nav-indicator-shadow', '0 0 10px rgba(253, 230, 138, 0.4)');
            
            // Change mobile menu button color
            if (mobileMenuButton) {
                mobileMenuButton.classList.add('text-white', 'hover:text-yellow-200');
                mobileMenuButton.classList.remove('text-gray-600', 'hover:text-green-600');
            }
            
            // Add subtle animation to navbar items
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach((link, index) => {
                link.style.animation = `fadeUp 0.3s ease forwards ${index * 0.05}s`;
            });
            
            // Mobile menu background update - matching the navbar gradient
            if (mobileMenu) {
                mobileMenu.classList.remove('bg-white', 'bg-green-800');
                mobileMenu.style.background = 'linear-gradient(180deg, rgba(5, 102, 70, 0.97), rgba(16, 85, 66, 0.97))';
                mobileMenu.classList.add('border-t-0', 'shadow-lg');
                
                // Add subtle pattern to mobile menu too
                mobileMenu.style.backgroundImage = "url('data:image/svg+xml,%3Csvg width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h20v20H0z\" fill=\"none\"%3E%3C/path%3E%3Cpath d=\"M10 10a1 1 0 11-2 0 1 1 0 012 0z\" fill=\"rgba(255,255,255,0.05)\"%3E%3C/path%3E%3C/svg%3E'), " + mobileMenu.style.background;
                
                // Update mobile links with better contrast
                const mobileLinks = mobileMenu.querySelectorAll('.mobile-nav-link');
                mobileLinks.forEach(link => {
                    link.classList.add('text-white', 'hover:text-yellow-200', 'hover:bg-green-700');
                    link.classList.remove('text-gray-700', 'hover:text-green-600', 'hover:bg-green-50');
                });
                
                const mobileSubLinks = mobileMenu.querySelectorAll('.mobile-sub-link');
                mobileSubLinks.forEach(link => {
                    link.classList.add('text-gray-200', 'hover:text-yellow-200');
                    link.classList.remove('text-gray-600', 'hover:text-green-600');
                });
            }
        } else {
            // Default state - Clean white
            header.classList.add('bg-white');
            
            // Remove custom styles
            header.style.background = '';
            header.style.backgroundImage = '';
            header.style.boxShadow = '';
            header.style.borderBottom = '';
            
            header.classList.remove('shadow-xl');
            header.classList.add('shadow-md');
            
            // Restore navbar padding
            navbarContent.classList.remove('py-2');
            navbarContent.classList.add('py-4');
            
            // Restore logo size
            navLogo.classList.remove('scale-90');
            
            // Restore PELITA text to original gradient
            if (pelitaText) {
                pelitaText.classList.add('bg-gradient-to-r', 'from-green-600', 'to-orange-500', 'bg-clip-text', 'text-transparent');
                pelitaText.classList.remove('text-white', 'font-bold');
                pelitaText.style.textShadow = 'none';
            }
            
            // Restore text colors
            document.documentElement.style.setProperty('--nav-text-color', '#374151');
            document.documentElement.style.setProperty('--nav-text-shadow', 'none');
            document.documentElement.style.setProperty('--nav-hover-color', '#10B981');
            document.documentElement.style.setProperty('--nav-active-color', '#10B981');
            document.documentElement.style.setProperty('--nav-active-weight', '500');
            document.documentElement.style.setProperty('--nav-indicator-color', 'linear-gradient(to right, #10B981, #F59E0B)');
            document.documentElement.style.setProperty('--nav-indicator-shadow', 'none');
            
            // Restore mobile menu button color
            if (mobileMenuButton) {
                mobileMenuButton.classList.remove('text-white', 'hover:text-yellow-200');
                mobileMenuButton.classList.add('text-gray-600', 'hover:text-green-600');
            }
            
            // Remove animations
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.style.animation = 'none';
            });
            
            // Mobile menu background update
            if (mobileMenu) {
                mobileMenu.style.background = '';
                mobileMenu.style.backgroundImage = '';
                mobileMenu.classList.remove('border-t-0', 'shadow-lg');
                mobileMenu.classList.add('bg-white');
                
                // Update mobile links
                const mobileLinks = mobileMenu.querySelectorAll('.mobile-nav-link');
                mobileLinks.forEach(link => {
                    link.classList.remove('text-white', 'hover:text-yellow-200', 'hover:bg-green-700');
                    link.classList.add('text-gray-700', 'hover:text-green-600', 'hover:bg-green-50');
                });
                
                const mobileSubLinks = mobileMenu.querySelectorAll('.mobile-sub-link');
                mobileSubLinks.forEach(link => {
                    link.classList.remove('text-gray-200', 'hover:text-yellow-200');
                    link.classList.add('text-gray-600', 'hover:text-green-600');
                });
            }
        }
    });
    
    // Trigger scroll event once to set initial state based on scroll position
    window.dispatchEvent(new Event('scroll'));
});
</script>