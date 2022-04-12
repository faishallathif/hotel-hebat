import axios from './axios.service';
import BaseUrl from './BaseUrl';
import ApiRoute from './ApiRoute';

class UserService {
    cekToken(){
        return axios.get(BaseUrl+ ApiRoute.cekToken);
    }
    login(formData){
        return axios.post(BaseUrl+ ApiRoute.login, formData);
    }
    register(formData){
        return axios.post(BaseUrl+ApiRoute.register, formData);
    }
}

export default new UserService();