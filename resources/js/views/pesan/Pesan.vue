<template>
  <div>
    <Navbar />
    <div class="container mt-5 pt-5">
      <div class="tw-card2">
        <h3 class="title text-center">Pesan Kamar</h3>
          <div class="row">
            <div class="col">
              <template>
                <div class="center content-inputs">
                  <vs-input
                    class="mb-4"
                    label="Tipe Kamar"
                    v-model="formData.tipe_kamar"
                    disabled
                  ></vs-input>
                  <vs-input
                    class="mb-4"
                    label="Check In"
                    type="date"
                    v-model="formData.tanggal_masuk"
                  ></vs-input>

                  <vs-input
                    class="mb-4"
                    label="Check Out"
                    type="date"
                    v-model="formData.tanggal_keluar"
                  ></vs-input>
                  <vs-input
                    class="mb-4"
                    label="Jumlah Pesanan"
                    disabled
                    v-model="formData.jumlah_pesanan"
                  ></vs-input>
                </div>
              </template>
            </div>
            <div class="col">
              <el-card>
                <div class="d-flex flex-wrap tw-gap-3.5 ">
                  <div class="col-2 tw-border-2 px-2 text-center"
                    v-for="item in no_kamar"
                    :key="item.id"
                    @click="getNoKamar(item.id)"
                  >
                    {{ item.no_kamar }}
                  </div>
                </div>
              </el-card>
            </div>
          </div>
          <vs-button success @click="pesan">Pesan</vs-button>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "../../components/Navbar.vue";
import KamarService from "../../service/KamarService";
import PesananService from "../../service/PesananService";
export default {
  components: { Navbar },
  data() {
    return {
      formData: {jumlah_pesanan: null },
      noKamarSelect:[],
      no_kamar: [],
      userLokal: null,
    };
  },
  mounted() {
    this.userLokal = JSON.parse(localStorage.getItem("user"));
    if(!this.userLokal){
      this.$router.push("/login?message=Login terlebih dahulu ")

    }
    KamarService.get(this.$route.query.id).then((res) => {
      this.formData.kamar_id = res.data.id;
      this.formData.tipe_kamar = res.data.tipe_kamar;
    });
    KamarService.getDetail(this.$route.query.id).then((res) => {
      this.no_kamar = res.data.data;
    });
  },
  methods: {
    pesan() {
      this.formData.kamar_id = this.$route.query.id;
      this.formData.user_id = this.userLokal.id;
      this.formData.no_kamar = this.noKamarSelect
      this.formData.no_kamar = JSON.stringify(this.formData.no_kamar);
      console.log(this.formData);
        PesananService.post(this.formData).then((res) => {
          if(res.data){
            console.log(res.data);
          }else{
            localStorage.removeItem("user")
            this.$router.push("/login")
          }
        });
    },
    getNoKamar(id) {
      let array = this.noKamarSelect
      if(array.includes(id)){
        array= array.filter(item=>item!=id)
      }else{
        array.push(id)
      }
      // console.log(array.includes(id));
      this.noKamarSelect = array
      console.log(this.noKamarSelect);
      this.formData.jumlah_pesanan= this.noKamarSelect.length
    },
  },
};
</script>

<style>
</style>