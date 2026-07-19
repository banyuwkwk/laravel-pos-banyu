import './bootstrap';
import './dashboard';
import './sales-category';
import './cashier';

import { attachLoading } from "./components/loading";
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

import '../css/app.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll("form").forEach(form => {
    attachLoading(form);
});