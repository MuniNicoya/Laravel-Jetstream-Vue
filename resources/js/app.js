import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { createI18n } from 'vue-i18n'; // Importa createI18n



import 'flowbite';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
import esMessages from './locales/es.json'; // Importa el archivo JSON
import authentication from './locales/es'; // Importa tus mensajes de localización
const i18n = createI18n({
  legacy: false,
  locale: 'es', // establece el idioma predeterminado
  messages: {
    // Aquí deberías cargar tus mensajes de localización
    es: esMessages,
    // Agrega más idiomas según sea necesario
  },
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18n); // Usa Vue I18n
        app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
