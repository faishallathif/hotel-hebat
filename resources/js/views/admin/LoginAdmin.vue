<template>
   <div class="tw-min-h-screen tw-flex tw-justify-around tw-items-center bg-primary tw-text-white">
        <div class="">
            <vector-admin/>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center">
            <vector-logo/>
            <p class="tw-text-6xl tw-font-bold tw-my-5">Admin</p>
            <form @submit.stop.prevent="login"  class="flex-col-center">
                <div class="input-wrap">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 0H2C0.9 0 0.00999999 0.9 0.00999999 2L0 14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM18 4L10 9L2 4V2L10 7L18 2V4Z" fill="#7A17EE"/>
                        </svg>                        
                    <input type="text" placeholder="Email" name="email" v-model="formData.email" required>
                </div>
                <div class="input-wrap">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12.6397C11.6429 12.6411 11.296 12.7597 11.0129 12.9774C10.7297 13.1951 10.5259 13.4997 10.4328 13.8445C10.3396 14.1893 10.3623 14.5551 10.4973 14.8858C10.6323 15.2165 10.8721 15.4936 11.18 15.6747V17.9997H12.84V15.6747C13.0836 15.5306 13.2857 15.326 13.4268 15.0806C13.5678 14.8353 13.643 14.5577 13.645 14.2747V14.2747C13.645 14.0591 13.6024 13.8457 13.5196 13.6467C13.4368 13.4477 13.3155 13.267 13.1626 13.115C13.0097 12.9631 12.8283 12.8428 12.6288 12.7613C12.4292 12.6797 12.2156 12.6384 12 12.6397V12.6397Z" stroke="#7A17EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.1449 8.88477H5.84994C4.65701 8.88477 3.68994 9.85183 3.68994 11.0448V19.5898C3.68994 20.7827 4.65701 21.7498 5.84994 21.7498H18.1449C19.3379 21.7498 20.3049 20.7827 20.3049 19.5898V11.0448C20.3049 9.85183 19.3379 8.88477 18.1449 8.88477Z" stroke="#7A17EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.67505 8.885V7.58C6.67505 6.1664 7.2366 4.81069 8.23617 3.81112C9.23574 2.81155 10.5914 2.25 12.005 2.25C13.4187 2.25 14.7744 2.81155 15.7739 3.81112C16.7735 4.81069 17.335 6.1664 17.335 7.58V8.885" stroke="#7A17EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                        
                    <input type="password" placeholder="Password" name="password" v-model="formData.password" required>
                </div>
                <button type="submit" class="btn-ungu2 tw-rounded-2xl tw-w-52">Login</button>
            </form>
        </div>
        <div class="position-fixed top-0 end-0 p-3 " style="z-index: 11">
            <div class="toast align-items-center show bg-white" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="justify-between">
                    <div class="toast-body text-dark">
                        {{$route.query.message}}
                    </div>
                    <div class="toast-body">
                        <i data-bs-dismiss="toast" class="text-dark el-icon-close tw-text-2xl"></i>
                    </div>
                    <!-- <button type="button" class="btn-close me-2 m-auto text-dark" data-bs-dismiss="toast" aria-label="Close"></button> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserService from "../../service/UserService"
export default {
    data(){
        return{
            formData:{}
        }
    },
methods:{
    login(){
       UserService.login(this.formData).then(res=>{
           localStorage.setItem("user",JSON.stringify(res.data.user))
           this.$router.push("/")
       })
    }
},
mounted(){
}
}
</script>

<style>

</style>