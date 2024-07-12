import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

require("./bootstrap");

window.Vue = require("vue");

Vue.component("conluna-sort", require("./components/Card.vue").default);

const app = new Vue({
    el: "#app"
});
