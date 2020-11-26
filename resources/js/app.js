import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router';
import App from './App.vue';


require('./bootstrap');

window.Vue = Vue
Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
