require('./bootstrap');
window.Vue = require('vue');

Vue.component('Theheader', require('./components/header/Theheader.vue').default);
Vue.component('Thefooter', require('./components/footer/Thefooter.vue').default);
Vue.component('contents', require('./components/contents/contents.vue').default);

// const app = new Vue({
//     el: '#app'
// });

const container = new Vue({
    el: '#container'
});
