import './bootstrap';

import Alpine from 'alpinejs';
import Echo from "laravel-echo"
window.Alpine = Alpine;

Alpine.start();


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'ace124451e5aa17167b0',
    cluster: 'eu',
    encrypted: true
});


