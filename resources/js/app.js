
require('./bootstrap');

window.Vue = require('vue').default;
// import vue-router dulu
import VueRouter from 'vue-router';
import {store} from './store/store';
import router from './router';
import router2 from './router/index2';
Vue.use(VueRouter)
let route
if(location.hostname.split('.')[0]=="admin"){
    route = router2
}else{
    route = router
}


import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI)

// cara membuat component di vue
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('hello-ukom', require('./components/hello.vue').default);
Vue.component('nav-bar', require('./components/Navbar.vue').default);
Vue.component('component-footer', require('./components/Footer.vue').default);
Vue.component('login-admin',require('./views/admin/LoginAdmin.vue').default);
Vue.component('side-bar',require('./components/Sidebar.vue').default);
Vue.component('top-nav',require('./components/Topnav.vue').default)
Vue.component('admin-view',require('./views/admin/index.vue').default)
Vue.component("vector-admin",require("./components/vector/vector-admin.vue").default)
Vue.component("vector-logo",require("./components/vector/vector-logo.vue").default)
import Vuesax from 'vuesax'

import 'vuesax/dist/vuesax.css' //Vuesax styles
Vue.use(Vuesax, {
  // options here
})

// inisialisasi vue
const app = new Vue({
    el: '#app',
    data: {
        title: "hello UKOM"
    },
    router:route,
    store,
});
