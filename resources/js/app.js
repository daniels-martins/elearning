import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// how to import global static assets in vite
// import.meta.glob([
//     '../vendor/swal_dist'
// ])