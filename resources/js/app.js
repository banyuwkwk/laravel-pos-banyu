import './bootstrap';
import './dashboard';
import './sales-category';
// import "./components/confirm";
// import './product'
import './cashier';
// import './pages/transaction-create';    
import { attachLoading } from "./components/loading";
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import '../css/app.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll("form").forEach(form => {
    attachLoading(form);
});
