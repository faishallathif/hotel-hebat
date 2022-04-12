<template>
  <div class="content-dashboard">
    <el-card>
      <h1 class="title">Kamar</h1>
      <template>
        <div class="center">
          <vs-table>
            <template #thead>
              <vs-tr>
                <vs-th
                  sort
                  @click="tableData = $vs.sortData($event, tableData, 'name')"
                >
                  Tipe Kamar
                </vs-th>
                <vs-th
                  sort
                  @click="tableData = $vs.sortData($event, tableData, 'email')"
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
                <th>
                  <vs-button
                    success
                    @click="
                      dialogForm = true;
                      buttonDialog = 'Tambah';
                    "
                  >
                    <i class="el-icon-plus"></i> Tambah
                  </vs-button>
                </th>
              </vs-tr>
            </template>
            <template #tbody>
              <vs-tr
                :key="i"
                v-for="(tr, i) in $vs.getSearch(tableData, $store.state.search)"
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
                  <vs-button
                    @click="
                      dialogForm = true;
                      buttonDialog = 'Edit';
                      getDataEdit(tr);
                    "
                  >
                    <i class="el-icon-edit"></i> Edit
                  </vs-button>
                  <vs-button danger @click="handleDelete(tr.id)">
                    <i class="el-icon-delete"></i> Delete
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
    <!-- dialog form -->
    <el-dialog title="Warning" :visible.sync="dialogForm" width="30%" center>
      <el-form @submit.prevent="tambah">
        <div class="center content-inputs">
          <vs-input v-model="formData.tipe_kamar" placeholder="Tipe Kamar" />
        </div>
        <h3 class="my-3">Fasilitas</h3>
        <div class="d-flex flex-wrap">
          <vs-checkbox
            :val="item.id"
            v-model="formData.fasilitas"
            v-for="item in fasilitas"
            :key="item"
          >
            {{ item.nama_fasilitas }}
          </vs-checkbox>
        </div>
        <div class="center content-inputs my-3">
          <vs-input v-model="formData.harga" placeholder="Harga" />
        </div>
         <div class="center content-inputs my-3">
          <vs-input v-model="formData.jumlah" placeholder="Jumlah" />
        </div>
          <vs-button class="my-3" :disabled="!formData.tipe_kamar||!formData.harga||!formData.jumlah" success @click.prevent="tambah" v-if="buttonDialog == 'Tambah'"
            >
            <i class="el-icon-plus"></i> Tambah
          </vs-button>
           <vs-button class="my-3" success @click.prevent="edit" v-if="buttonDialog == 'Edit'"
            >
            <i class="el-icon-plus"></i> Edit
          </vs-button>
      </el-form>
    </el-dialog>
  </div>
</template>

<script>
import FasilitasService from "../../../service/FasilitasService";
import KamarService from "../../../service/KamarService";

export default {
  data() {
    return {
      buttonDialog: "",
      dialogForm: false,
      tableData: [],
      dataDialog: [],
      centerDialogVisible: false,
      search: "",
      formData: { fasilitas: [],tipe_kamar:"",harga:0,jumlah:0},
      fasilitas: [],
    };
  },
  mounted() {
    this.getKamar();
    this.getFasilitas();
  },
  methods: {
    getKamar() {
      KamarService.get().then((res) => {
        this.tableData = res.data.data;
        console.log(res.data.data);
      });
    },
    tambah() {
      console.log(this.formData);
      if(!this.formData.tipe_kamar||!this.formData.harga||!this.formData.jumlah){
        return alert("Isi terlebih dahulu")
      }
      if(this.formData.fasilitas.length==1){
        this.formData.fasilitas=[this.formData.fasilitas]
      }
      this.formData.fasilitas= JSON.stringify(this.formData.fasilitas)
      KamarService.post(this.formData).then((res) => {
        console.log(res);
        this.dialogForm = false;
        this.getKamar();
      });
    },
    edit(){
      console.log(this.formData);
      KamarService.put(this.formData).then(res=>{
        console.log(res);
        this.dialogForm = false
        this.getKamar()
      })
    },
    getDataEdit(data){
      data.fasilitas = data.fasilitas.map(item=>item.id)
      this.formData = data
    },
    getFasilitas() {
      FasilitasService.get("kamar").then((res) => {
        this.fasilitas = res.data.data
        console.log(res.data.data);
      });
    },
    handleDelete(id) {
      KamarService.delete(id).then(res=>{
        this.getKamar()
      })
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
  },
};
</script>