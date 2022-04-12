<template>
  <div class="content-dashboard">
    <el-card>
      <h1 class="title">Kamar</h1>
      <el-table
        :data="tableData"
        style="width: 100%">
        <el-table-column
          label="Tipe Kamar"
          prop="tipe_kamar">
        </el-table-column>
        <el-table-column
          label="Fasilitas"
          prop="fasilitas">
          <template slot-scope="scope">
            <a class="tw-font-bold tw-cursor-pointer" @click.prevent="centerDialogVisible=true;dataDialog=scope.row.fasilitas">Lihat Fasilitas</a>
          </template>
        </el-table-column>
        <el-table-column
          label="Harga"
          prop="harga">
          <template slot-scope="scope">
            {{formatPrice(scope.row.harga)}}/Hari
          </template>
        </el-table-column>
        <el-table-column
          label="Jumlah"
          prop="jumlah">
        </el-table-column>
        <el-table-column
          align="right">
          <template slot="header" >
            <el-input
              v-model="search"
              size="mini"
              placeholder="Type to search"/>
          </template>
          <template slot-scope="scope">
            <el-button
              size="mini"
              @click="handleEdit(scope.$index, scope.row.id)">Edit</el-button>
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.$index, scope.row.id)">Delete</el-button>
          </template>
        </el-table-column>
      </el-table>
    </el-card>
      <el-dialog
        title="Warning"
        :visible.sync="centerDialogVisible"
        width="30%"
        center>
        <ul>
          <li v-for="item in dataDialog" :key="item">
            <span >{{item.nama_fasilitas}}</span>
          </li>
        </ul>       
        <span slot="footer" class="dialog-footer">
          <el-button @click="centerDialogVisible = false">Close</el-button>
        </span>
      </el-dialog>
  </div>
</template>

<script>
import KamarService from '../../../service/KamarService';

  export default {
    data() {
      return {
        tableData:[],
        dataDialog:[],
        centerDialogVisible:false,
        search: '',
      }
    },
    mounted(){
      KamarService.get().then(res=>{
            this.tableData = res.data.data
            console.log(res.data.data);
        })
    },
    methods: {
      handleEdit(index, row) {
        console.log(index, row);
      },
      handleDelete(index, row) {
        console.log(index, row);
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
  }
</script>