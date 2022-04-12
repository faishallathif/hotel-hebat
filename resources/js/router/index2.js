import Vue from 'vue';
import VueRouter from 'vue-router';
// import AuthRequired from './AuthRequired';
Vue.use(VueRouter);

const routes = [
    {
        path: "/", 
        name: "dashboard", 
        // beforeEnter:AuthRequired,
        meta:{hiddenTopnav:true},
        component: require('../views/admin/index').default,
    },
    {
        path: "/kamar", 
        // beforeEnter:AuthRequired,
        name: "kamar", 
        component: require('../views/admin/kamar/index').default,
    },
    {
        path: "/fasilitas", 
        // beforeEnter:AuthRequired,
        name: "fasilitas", 
        component: require('../views/admin/fasilitas/index').default,
    },
    {
        path:"/login",
        name:"login",
        // beforeEnter:AuthRequired,
        meta:{hiddenTopnav:true},
        component: require('../views/admin/LoginAdmin').default,
    }
    
]
export default new VueRouter({
    mode: "history",
    routes
})