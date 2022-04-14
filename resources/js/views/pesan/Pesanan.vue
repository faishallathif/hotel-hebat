<template>
<div>
  <Navbar/>
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
</div>
</template>

<script>
import Navbar from '../../components/Navbar.vue'
import PesananService from '../../service/PesananService'
export default {
  components: { Navbar },
  data(){
    return{
      userLokal: null,
      tableData:[],
    }
  },
  mounted(){
    this.userLokal = JSON.parse(localStorage.getItem("user"));
    if(!this.userLokal){
      this.$router.push("/login?message=Login terlebih dahulu ")
    }
    PesananService.get(this.userLokal.id).then(res=>{
      this.tableData = res.data.data
      console.log(res);
    })
  }

}
</script>

<style>

</style>