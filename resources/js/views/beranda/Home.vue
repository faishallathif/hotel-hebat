<template>
  <div class="">
    <div class="bg-primary">
      <Hero />
      <Platform />
    </div>
    <div class="container tw-my-16">
      <div class="tw-shadow-lg tw-bg-white tw-px-5 tw-py-3">
        <div class="row tw-items-center">
          <el-input
            class="col"
            placeholder="Type something"
            prefix-icon="el-icon-search"
            v-model="$store.state.search"
          >
          </el-input>
          <div class="col">
            <div class="dropdown tw-z-20">
              <a
                class="tw-btn tw-text-black"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <!-- {{ userLokal.nama }} -->asdas
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a class="dropdown-item" href="#" @click.prevent="logout"
                    >Logout</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
       <el-card class="my-5">
          <h1 class="title">Kamar</h1>
          <template>
            <div class="center">
              <vs-table>
                <template #thead>
                  <vs-tr>
                    <vs-th
                      sort
                      @click="
                        tableData = $vs.sortData($event, tableData, 'name')
                      "
                    >
                      Tipe Kamar
                    </vs-th>
                    <vs-th
                      sort
                      @click="
                        tableData = $vs.sortData($event, tableData, 'email')
                      "
                    >
                      Fasilitas
                    </vs-th>
                    <vs-th
                      sort
                      @click="tableData = $vs.sortData($event, tableData, 'id')"
                    >
                      Harga
                    </vs-th>
                    <vs-th
                      sort
                      @click="tableData = $vs.sortData($event, tableData, 'id')"
                    >
                      Jumlah
                    </vs-th>
                  </vs-tr>
                </template>
                <template #tbody>
                  <vs-tr
                    :key="i"
                    v-for="(tr, i) in $vs.getSearch(
                      tableData,
                      $store.state.search
                    )"
                    :data="tr"
                  >
                    <vs-td>
                      {{ tr.tipe_kamar }}
                    </vs-td>
                    <vs-td>
                      <a
                        href=""
                        @click.prevent="
                          centerDialogVisible = true;
                          dataDialog = tr.fasilitas;
                        "
                        >Lihat Fasilitas</a
                      >
                    </vs-td>
                    <vs-td> {{ formatPrice(tr.harga) }}/Hari </vs-td>
                    <vs-td>
                      {{ tr.jumlah }}
                    </vs-td>
                    <vs-td>
                        <vs-button warn @click="userLokal==null?$router.push('/login?message=Login terlebih dahulu!'):$router.push('/pesan?id='+tr.id)">
                    <i class="el-icon-view mr-3"></i> Pesan
                  </vs-button>
                    </vs-td>
                  </vs-tr>
                </template>
              </vs-table>
            </div>
          </template>
        </el-card>
        <!-- dialog fasilitas -->
        <el-dialog
          title="Warning"
          :visible.sync="centerDialogVisible"
          width="30%"
          center
        >
          <ul>
            <li v-for="item in dataDialog" :key="item">
              <span>{{ item.nama_fasilitas }}</span>
            </li>
          </ul>
          <span slot="footer" class="dialog-footer">
            <el-button @click="centerDialogVisible = false">Close</el-button>
          </span>
        </el-dialog>
      <!-- <CardCarousel bgColor="tw-bg-pink2" title="Fasilitas Umum">
        <template v-slot:button>
          <button class="tw-btn tw-bg-pink1 tw-rounded-full tw-w-52">
            Lihat Semua
          </button>
        </template>
      </CardCarousel> -->
    </div>
  </div>
</template>

<script>
import CardCarousel from "../../components/CardCarousel.vue";
import Hero from "./Hero";
import Platform from "./Platform";
import KamarService from "../../service/KamarService";

export default {
    data(){
        return{
            tableData: [],
            dataDialog: [],
            centerDialogVisible:false,
             userLokal:null
        }
    },
  components: {
    Platform,
    Hero,
    CardCarousel,
  },
  mounted(){
    this.userLokal=JSON.parse(localStorage.getItem("user"))||null
        this.getKamar()
  },
  methods:{
       getKamar() {
      KamarService.get().then((res) => {
        this.tableData = res.data.data;
        console.log(res.data.data);
      });
    },
     formatPrice(value) {
      let theString = value.toString();

      let cekMinus = theString.indexOf("-");
      if (cekMinus != -1) {
        let newVal = theString.replace("-", "");
        let val = (newVal / 1).toFixed(2).replace(".", ",");
        return "-Rp" + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      } else {
        let val = (value / 1).toFixed(2).replace(".", ",");
        return "Rp" + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
    },
  }
};
</script>
<style scoped>
</style>
