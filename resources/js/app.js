require('./bootstrap');
window.Vue = require('vue');
import eventBus from "./plugins/event-bus";
import VModal from 'vue-js-modal'
import Select2 from 'v-select2-component';
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(eventBus);
Vue.use(VueAxios, axios);
Vue.use(VModal ,{ dynamic: true, injectModalsContainer: true });
Vue.component('Select2', Select2);

Vue.component('trader-component', require('./components/TraderComponent.vue').default);

const app = new Vue({
    el: '#app'
});
