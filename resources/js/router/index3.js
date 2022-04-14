import Vue from 'vue';
import VueRouter from 'vue-router';
// import AuthRequired from './AuthRequired';
Vue.use(VueRouter);

const routes = [
    {
        path: "/", 
        name: "dashboard", 
        component: require('../views/resepsionis/index').default,
    },
    {
        path:"/login",
        name:"login",
        component: require('../views/resepsionis/LoginResepsionis').default,
    }
    
]
export default new VueRouter({
    mode: "history",
    routes
})