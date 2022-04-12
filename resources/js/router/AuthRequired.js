import BaseUrl from '../service/BaseUrl';
import UserService from '../service/UserService';
import ApiRoute from '../service/ApiRoute';
export default (to, from, next) => {

  if (localStorage.getItem('user') != null) {
    UserService.cekToken(BaseUrl + ApiRoute.cekToken)
    .then((res) => {
      if(res.data.user){
        next()
      }else{
        next('/login?message='+res.data.message)
      }
    })
  }else{
    next('/login?message=User tidak ditemukan')
  }
}
