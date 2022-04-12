import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export const store = new Vuex.Store({
    state: {
       search:""
    },
    mutations: {
 
    },
    getters: {
        getSearch: state => {
            return state.search
        },
    },
    actions: {
      
    }

})