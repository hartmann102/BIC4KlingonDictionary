/**
 * Load all needed JavaScript modules for working with ajax-requests and some
 * base compulsory functions for using data objects.
 *
 */

// Need for data-operations and ajax
import lodash from 'lodash';
import axios from 'axios';

// Some custom modules to make developing faster
import Form from './utilities/Form';
import QueryMessage from './components/base/QueryMessage';

window._ = lodash;
window.axios = axios;
window.QueryMessage = QueryMessage;
window.Form = Form;

// Set token in header for axios to keep requests secure
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// Add open and close functionality on burger-nav
document.addEventListener('DOMContentLoaded', () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    if ($navbarBurgers.length > 0) {
        $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    }
});
