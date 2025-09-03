import './bootstrap';
import 'flowbite'; // Flowbite untuk tailwind component interaktif
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Simple carousel manual (versi basic)
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.carousel-item');
    let current = 0;

    function showSlide(index) {
        items.forEach(item => item.classList.add('hidden'));
        items[index].classList.remove('hidden');
    }

    function nextSlide() {
        current = (current + 1) % items.length;
        showSlide(current);
    }

    setInterval(nextSlide, 3000); // Ganti gambar setiap 3 detik
    showSlide(current);
});