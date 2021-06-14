require('./bootstrap');
window.Vue = require('vue').default;
import router from './routes';
import VueRouter from 'vue-router';
import Index from './Index.vue';
import vuetify from './plugins/vuetify';
Vue.use(VueRouter);
const app = new Vue({
    el: '#app',
    router,
    components: {
        "index": Index
    },
    vuetify,
});
