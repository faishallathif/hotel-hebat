<template>
  <div>
    <Topnav/>
    <el-card class="content-dashboard">
      <h1 class="title">Pesanan</h1>
      <template>
        <div class="center">
          <vs-table>
            <template #thead>
              <vs-tr>
                <vs-th
                  sort
                  @click="tableData = $vs.sortData($event, tableData, 'tipe_kamar')"
                >
                  Tipe Kamar
                </vs-th>
                <vs-th
                >
                  No Kamar
                </vs-th>
                <vs-th
                  sort
                  @click="tableData = $vs.sortData($event, tableData, 'jumlah_hari')"
                >
                  Jumlah Hari
                </vs-th>
                <vs-th
                  sort
                  @click="tableData = $vs.sortData($event, tableData, 'jumlah_harga')"
                >
                  Jumlah Harga
                </vs-th>
                  <vs-th
                  sort
                  @click="tableData = $vs.sortData($event, tableData, 'tanggal_masuk')"
                >
                  Check In
                </vs-th>
                  <vs-th
                  sort
                  @click="tableData = $vs.sortData($event, tableData, 'tanggal_keluar')"
                >
                  Check Out
                </vs-th>
              </vs-tr>
            </template>
            <template #tbody>
              <vs-tr
                :key="i"
                v-for="(tr, i) in $vs.getSearch(tableData, $store.state.search)"
                :data="tr"
              >
                <vs-td>
                  {{ tr.kamar.tipe_kamar }}
                </vs-td>
                <vs-td>
                  <a
                    href=""
                    @click.prevent="
                      centerDialogVisible = true;
                      getNoKamar(tr.no_kamar);
                    "
                    >Lihat No Kamar</a
                  >
                </vs-td>
                <vs-td>
                  {{tr.jumlah_hari}}
                </vs-td>
                <vs-td> {{ formatPrice(tr.jumlah_harga) }} </vs-td>
                <vs-td>
                  {{ tr.tanggal_masuk }}
                </vs-td>
                 <vs-td>
                  {{tr.tanggal_keluar}}
                </vs-td>
              </vs-tr>
            </template>
          </vs-table>
        </div>
      </template>
    </el-card>
    <el-dialog
      title="Warning"
      :visible.sync="centerDialogVisible"
      width="30%"
      center
    >
      <ul>
        <li v-for="item,i in dataDialog" :key="i">
          <span>{{ item }}</span>
        </li>
      </ul>
      <span slot="footer" class="dialog-footer">
        <el-button @click="centerDialogVisible = false">Close</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import Topnav from '../../components/Topnav.vue';
import PesananService from "../../service/PesananService"
export default {
  components: { Topnav },
  data(){
    return{
      tableData:[],
      centerDialogVisible:false,
      dataDialog:[]
      
    }
  },
  mounted(){
    PesananService.get().then(res=>{
      this.tableData=res.data.data
      console.log(res.data.data);
    });
  },
  methods:{
    getNoKamar(data){
      this.dataDialog= JSON.parse(data)
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
.top-nav,.content-dashboard{
  left: 20px;
}
</style>