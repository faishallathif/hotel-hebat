
require('./bootstrap');

window.Vue = require('vue').default;
// import vue-router dulu
import VueRouter from 'vue-router';
Vue.use(VueRouter)
// cara membuat component di vue
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('hello-ukom', require('./components/hello.vue').default);
Vue.component('nav-bar', require('./components/Navbar.vue').default);
Vue.component('component-footer', require('./components/Footer.vue').default);


// cara membuat router di vue

// import halaman yang akan di tampilkan
const Home = require('./Pages/Home.vue').default
// const About = require('./Pages/About.vue').default

const routes = [
    {
        path: "/home",
        component: Home,
    },
    //atau langsung require 
    {
        path: "/about",
        component: require('./Pages/About.vue').default,
    },
]

const router = new VueRouter({
    mode: "history",
    routes
})
// inisialisasi vue
const app = new Vue({
    el: '#app',
    data: {
        title: "hello UKOM"
    },
    router
});
