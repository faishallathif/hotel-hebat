<template>
    <div class="content-dashboard">
        <div class="row">
            <div class="col">
                <div class="tw-card">
                    <div>
                        <i class="el-icon-menu"></i>
                    </div>
                    <div>{{jumlah.tipeKamar}}</div>
                </div>
            </div>
            <div class="col">
                <div class="tw-card">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.3333 7V24.5H3.5V22.1667H5.83333V3.5H16.3333V4.66667H22.1667V22.1667H24.5V24.5H19.8333V7H16.3333ZM11.6667 12.8333V15.1667H14V12.8333H11.6667Z" fill="#7A17EE"/>
                    </svg>
                    <div>{{jumlah.kamar}}</div>
                </div>
            </div>
            <div class="col">
                <div class="tw-card">
                    <div>

                    <i class="el-icon-user-solid"></i>
                    </div>
                    <div>{{jumlah.kamar}}</div>
                </div>
            </div>
            <div class="col">
                <div class="tw-card">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" viewBox="0 0 30 30" xml:space="preserve"><path d="M7,22  V4h18v18c0,2.209-1.791,4-4,4" style="fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"/><path d="M17,22  L17,22H4l0,0c0,2.209,1.791,4,4,4h13C18.791,26,17,24.209,17,22z" style="fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"/><line style="fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;" x1="15" x2="21" y1="13" y2="13"/><line style="fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;" x1="11" x2="13" y1="13" y2="13"/><line style="fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;" x1="15" x2="21" y1="17" y2="17"/><line style="fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;" x1="11" x2="13" y1="17" y2="17"/><line style="fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;" x1="15" x2="21" y1="9" y2="9"/><line style="fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;" x1="11" x2="13" y1="9" y2="9"/><path d="M17,22L17,22H4l0,0c0,2.209,1.791,4,4,4h13C18.791,26,17,24.209,17,22z"/></svg>
                    <div>{{jumlah.pesanan}}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from "../../components/Sidebar"
import Topnav from '../../components/Topnav'
import KamarService from '../../service/KamarService'
import PesananService from '../../service/PesananService'

export default {
    data(){
        return{
            jumlah:{
                kamar:"",
                tipeKamar:"",
                user:"",
                pesanan:""
            }
        }
    },
    components:{
        Sidebar,
        Topnav,
    },
    mounted(){
        PesananService.get().then(res=>this.jumlah.pesanan=res.data.data.length)
        KamarService.getDetail().then(res=>{
            this.jumlah.kamar = res.data.data.length
        })
        KamarService.get().then(res=>{
            this.jumlah.tipeKamar = res.data.data.length
        })
    }
}
</script>

<style scoped>
.content-dashboard{
    top: 20px;
}
.el-card__body{
    text-align: center;
}
i{
    font-size: 28px;
}
svg{
    width: 28px;
}
</style>