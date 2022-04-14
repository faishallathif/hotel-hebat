class ApiRoute{
    constructor(){
        this.login = "api/login/";
        this.register = "api/register/";
        this.user = "api/user/";
        this.fasilitas = "api/fasilitas/";
        this.kamar = "api/kamar/";
        this.detailKamar = "api/detail-kamar"
        this.pesanan = "api/pesanan";
        this.cekToken = "api/cek_login"
    }
}

export default new ApiRoute();