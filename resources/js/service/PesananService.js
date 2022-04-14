// import axios from './axios.service';
import axios from 'axios';
import ApiRoute from './ApiRoute';
import BaseUrl from './BaseUrl';
class PesananService {
    constructor(){
        this.userLokal = JSON.parse(localStorage.getItem("user"))
    }
    get(id){
        // console.log(this.userLokal.token);
        if(id){
            return axios.get(BaseUrl+ ApiRoute.pesanan+"?id="+id,{headers:{"Authorization":"Bearer "+ this.userLokal.token}});
        }
        return axios.get(BaseUrl+ ApiRoute.pesanan,{headers:{"Authorization":"Bearer "+ this.userLokal.token}});
    }
    post(formData){
        return axios.post(BaseUrl+ApiRoute.pesanan, formData,{headers:{"Authorization":"Bearer "+ this.userLokal.token}});
    }
    put(formData){
        return axios.put(BaseUrl+ ApiRoute.pesanan+formData.id,formData,{headers:{"Authorization":"Bearer "+ this.userLokal.token}});
    }
    delete(id){
        return axios.delete(BaseUrl+ ApiRoute.pesanan+id,{headers:{"Authorization":"Bearer "+ this.userLokal.token}});
    }
}

export default new PesananService();