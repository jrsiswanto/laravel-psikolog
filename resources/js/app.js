// resources/js/app.js
import './bootstrap';

// Impor feather-icons dari node_modules
import feather from 'feather-icons';

// Ganti semua ikon <i data-feather="...">
feather.replace();

// Logika untuk Sidebar Toggle
document.addEventListener('DOMContentLoaded', function() {
    
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-closed');
        });
    }
    
    // Logika untuk Admin Dropdown Menu
    const adminMenuToggle = document.getElementById('adminMenuToggle');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownContainer = document.getElementById('adminMenuDropdown');

    if (adminMenuToggle && dropdownMenu && dropdownContainer) {
        
        // Tampilkan/sembunyikan saat tombol di-klik
        adminMenuToggle.addEventListener('click', function() {
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        // Sembunyikan saat klik di luar area dropdown
        document.addEventListener('click', function(event) {
            const isToggle = adminMenuToggle.contains(event.target);
            
            if (!dropdownContainer.contains(event.target) && !isToggle) {
                dropdownMenu.style.display = 'none';
            }
        });
    }
});