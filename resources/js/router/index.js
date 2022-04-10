import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    {
        path: "/", 
        component: require('../views/beranda/Home.vue').default,
    },
    {
        path: "/kamar", 
        component: require('../views/admin/kamar/index.vue').default,
    },
    {
        path: "/fasilitas", 
        component: require('../views/admin/fasilitas/index.vue').default,
    },
    {
        path: "/pesanan", 
        component: require('../views/admin/pesanan/index.vue').default,
    },
]
export default new VueRouter({
    mode: "history",
    routes
})