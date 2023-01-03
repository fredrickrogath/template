require("./bootstrap");

import Vue from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue";
import PortalVue from "portal-vue";
//add these two line
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";

import PerfectScrollbar from 'vue2-perfect-scrollbar'
import 'vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css'

import store from '@/Store/index';


// import colors from 'vuetify/lib/util/colors'

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
//also add this line
Vue.use(Vuetify);
Vue.use(PerfectScrollbar);

const app = document.getElementById("app");

new Vue({
    //finally add this line
    store,
    vuetify: new Vuetify({
    }),
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);

// Import modules...
// import Vue from 'vue';
// import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
// import PortalVue from 'portal-vue';

// Vue.mixin({ methods: { route } });
// Vue.use(InertiaPlugin);
// Vue.use(PortalVue);

// const app = document.getElementById('app');

// new Vue({
//     render: (h) =>
//         h(InertiaApp, {
//             props: {
//                 initialPage: JSON.parse(app.dataset.page),
//                 resolveComponent: (name) => require(`./Pages/${name}`).default,
//             },
//         }),
// }).$mount(app);
