// import axios from './axios.service';
import axios from 'axios';
import ApiRoute from './ApiRoute';
import BaseUrl from './BaseUrl';

class FasilitasService {
    get(status){
        if(status){
            return axios.get(BaseUrl+ "api/fasilitas?status="+status);
        }
        return axios.get(BaseUrl+ ApiRoute.fasilitas);
    }
    post(formData){
        if(formData.gambar_fasilitas){
            return axios.post(BaseUrl+ApiRoute.fasilitas, formData,
                { headers: { 'Content-Type': 'multipart/form-data' } }
                );
        }
        return axios.post(BaseUrl+ApiRoute.fasilitas, formData)
    }
    delete(id){
        return axios.delete(BaseUrl+ApiRoute.fasilitas+id);
    }
    put(formData){
        return axios.put(BaseUrl+ApiRoute.fasilitas+formData.id,formData);
    }
}

export default new FasilitasService();