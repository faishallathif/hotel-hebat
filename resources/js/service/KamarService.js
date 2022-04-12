// import axios from './axios.service';
import axios from 'axios';
import ApiRoute from './ApiRoute';
import BaseUrl from './BaseUrl';

class KamarService {
    get(){
        return axios.get(BaseUrl+ ApiRoute.kamar);
    }
    post(formData){
        return axios.post(BaseUrl+ApiRoute.kamar, formData);
    }
    getDetail(id){
        if(id){
            return axios.get(BaseUrl+ ApiRoute.detailKamar+id);
        }
        return axios.get(BaseUrl+ ApiRoute.detailKamar);
    }
}

export default new KamarService();