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
        let form = new FormData();
        form.append('gambar_fasilitas',formData.gambar_fasilitas)
        form.append('nama_fasilitas',formData.nama_fasilitas)
        form.append('status',formData.status)
        if(formData.gambar_fasilitas){
            console.log(form);
            return axios.post("http://localhost:8000/api/fasilitas", form,
                { headers: { "Content-Type": "multipart/form-data" } }
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