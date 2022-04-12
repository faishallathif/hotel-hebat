<template>
  <div class="content-dashboard">
      <el-table
        :data="tableData"
        style="width: 100%">
        <el-table-column
          label="Nama Fasilitas"
          prop="nama_fasilitas">
        </el-table-column>
        <el-table-column
          label="Gambar"
          prop="gambar">
          <template slot-scope="scope">
            <img :src="scope.row.gambar" alt="">
          </template>
        </el-table-column>
        <el-table-column
          label="Status"
          prop="status">
        </el-table-column>
        <el-table-column
          align="right">
          <template slot="header">
          <el-button type="success" @click="centerDialogVisible=true;buttonDialog='Tambah'"><i class="el-icon-plus"></i> Tambah</el-button>
        </template>
          <template slot-scope="scope">
            <el-button
              size="mini"
              @click="centerDialogVisible=true;formData=scope.row;buttonDialog='Edit'">Edit</el-button>
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.row.id)">Delete</el-button>
          </template>
        </el-table-column>
      </el-table>
        <el-dialog
        title="Warning"
        :visible.sync="centerDialogVisible"
        width="30%"
        center>
        <el-form @submit.prevent="tambah">
          <el-form-item label="nama_fasilitas" prop="pass">
            <el-input type="text" v-model="formData.nama_fasilitas" autocomplete="off" required></el-input>
          </el-form-item>
          <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" ref="file" @change="fileChange">
          </div>
          <el-radio-group v-model="formData.status" required class="my-3">
            <el-radio label="umum">Umum</el-radio>
            <el-radio label="kamar">Kamar</el-radio>
          </el-radio-group>
          <el-form-item v-if="buttonDialog=='Tambah'">
              <el-button type="success" @click="tambah">{{buttonDialog}}</el-button>
          </el-form-item>
          <el-form-item v-if="buttonDialog=='Edit'">
              <el-button type="success" @click="edit">{{buttonDialog}}</el-button>
          </el-form-item>
        </el-form>     
      </el-dialog>
  </div>
</template>

<script>
import FasilitasService from "../../../service/FasilitasService"
export default {
  data(){
    return{
      tableData:[],
      centerDialogVisible:false,
      // nama_fasilitas:"",
      //   status:"",
      formData:{
        nama_fasilitas:"",
        status:"",
        gambar_fasilitas:{}
      },
      buttonDialog:""
    }
  },
  mounted(){
    this.get()
  },
  methods:{
    get(){
      FasilitasService.get().then(res=>{
        this.tableData = res.data.data
      })
    },
    tambah(){
      FasilitasService.post(this.formData).then(res=>{
        this.tableData = res.data.data
        this.centerDialogVisible=false
        this.get()
      })
    },
    handleDelete(id){
       FasilitasService.delete(id).then(res=>{
        this.get()
      })
    },
     handlePreview(file) {
        console.log(file);
    },
    fileChange(){
      console.log(this.$refs.file.files);
      this.formData.gambar_fasilitas = this.$refs.file.files[0]
  },
    edit(){
      FasilitasService.put(this.formData).then(res=>{
        this.centerDialogVisible=false
        this.get()
      })
    }
  }
}
</script>

<style>

</style>