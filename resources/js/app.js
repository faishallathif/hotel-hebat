
require('./bootstrap');

window.Vue = require('vue').default;
// import vue-router dulu
import VueRouter from 'vue-router';
import router from './router';
Vue.use(VueRouter)
// cara membuat component di vue
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('hello-ukom', require('./components/hello.vue').default);
Vue.component('nav-bar', require('./components/Navbar.vue').default);
Vue.component('component-footer', require('./components/Footer.vue').default);
Vue.component('login-admin',require('./views/admin/LoginAdmin.vue').default);

// inisialisasi vue
const app = new Vue({
    el: '#app',
    data: {
        title: "hello UKOM"
    },
    router
});
