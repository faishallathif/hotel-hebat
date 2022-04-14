<template>
  <div>
    <template v-if="userLokal">
      <div class="center examplex">
        <vs-navbar center-collapsed v-model="active">
          <vs-navbar-item
            :active="active == 'Beranda'"
            id="Beranda"
            @click="
              $router.push('/');
              active = 'Beranda';
            "
          >
            Beranda
          </vs-navbar-item>
          <vs-navbar-item
            :active="active == 'Lihat Pesanan'"
            id="Pesanan"
            @click="
              $router.push('/pesanan');
              active = 'Lihat Pesanan';
            "
          >
            Lihat Pesanan
          </vs-navbar-item>
        </vs-navbar>
      </div>
    </template>
  </div>
</template>

<script>
export default {
    data(){
        return{
        active: "`Beranda`",
        userLokal:{}
      }
    },
    mounted(){
      this.userLokal = JSON.parse(localStorage.getItem("user")) 
    }
};
</script>

<style scoped>
.btn-navbar {
  border-radius: 20px;
  background-color: brown;
  border: 0;
  width: 100px;
}
.bg-brown {
  background: linear-gradient(134.85deg, #917959, #917959);
}
.judul-navbar {
  color: #ffb03a !important;
  font-size: 28px;
}
</style>
