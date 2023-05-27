import './bootstrap';
import 'laravel-datatables-vite';

document.getElementById("sidebarToggler").addEventListener("click", function() {
    document.getElementById("sidebar").classList.toggle("active");
    // this.classList.toggle("active");
});
