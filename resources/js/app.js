import './bootstrap';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import DatetimeFormatter from '@/Mixins/DatetimeFormatter';

import '../css/assets/css/style.css';
import '../css/assets/vendors/feather/feather.css';
import '../css/assets/vendors/ti-icons/css/themify-icons.css';
import '../css/assets/vendors/css/vendor.bundle.base.css';
import '../css/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css';
import '../css/assets/js/select.dataTables.min.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Blog';

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .mixin(DatetimeFormatter)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});
