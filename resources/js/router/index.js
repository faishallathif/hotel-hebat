import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    {
        path: "/", 
        component: require('../views/beranda/Home.vue').default,
    },
    {
        path: "/pesan", 
        component: require('../views/pesan/Pesan.vue').default,
    },
    {
        path: "/pesanan", 
        component: require('../views/pesan/Pesanan.vue').default,
    },
    {
        path: "/login", 
        component: require('../views/tamu/LoginTamu.vue').default,
    },
]
export default new VueRouter({
    mode: "history",
    routes
})