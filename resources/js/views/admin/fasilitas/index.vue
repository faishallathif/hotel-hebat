<template>
  <div class="content-dashboard">
    <template>
      <div class="center">
        <vs-table>
          <template #thead>
            <vs-tr>
              <vs-th
                sort
                @click="tableData = $vs.sortData($event, tableData, 'name')"
              >
                Nama Fasilitas
              </vs-th>
              <vs-th
                sort
                @click="tableData = $vs.sortData($event, tableData, 'email')"
              >
                Gambar
              </vs-th>
              <vs-th
                sort
                @click="tableData = $vs.sortData($event, tableData, 'id')"
              >
                Status
              </vs-th>
              <th>
                <vs-button
                  success
                  @click="
                    centerDialogVisible = true;
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
                {{ tr.nama_fasilitas }}
              </vs-td>
              <vs-td>
                <img :src="tr.gambar" alt="" />
              </vs-td>
              <vs-td>
                {{ tr.status }}
              </vs-td>
              <vs-td>
                <vs-button
                  @click="
                    centerDialogVisible = true;
                    buttonDialog = 'Edit';
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

    <el-dialog
      title="Warning"
      :visible.sync="centerDialogVisible"
      width="30%"
      center
    >
      <el-form @submit.prevent="tambah">
        <el-form-item label="nama_fasilitas" prop="pass">
          <el-input
            type="text"
            v-model="formData.nama_fasilitas"
            autocomplete="off"
            required
          ></el-input>
        </el-form-item>
        <div class="mb-3">
          <label for="formFile" class="form-label"
            >Default file input example</label
          >
          <input
            class="form-control"
            type="file"
            id="formFile"
            ref="file"
            @change="fileChange"
          />
        </div>
        <el-radio-group v-model="formData.status" required class="my-3">
          <el-radio label="umum">Umum</el-radio>
          <el-radio label="kamar">Kamar</el-radio>
        </el-radio-group>
        <el-form-item v-if="buttonDialog == 'Tambah'">
          <el-button type="success" @click="tambah">{{
            buttonDialog
          }}</el-button>
        </el-form-item>
        <el-form-item v-if="buttonDialog == 'Edit'">
          <el-button type="success" @click="edit">{{ buttonDialog }}</el-button>
        </el-form-item>
      </el-form>
    </el-dialog>
    <div
      class="flex-center tw-absolute tw-inset-0 tw-bg-black tw-opacity-20"
      v-if="loader"
    >
      <vue-loaders-ball-scale-ripple-multiple />
    </div>
  </div>
</template>

<script>
import FasilitasService from "../../../service/FasilitasService";
export default {
  data() {
    return {
      loader: false,
      tableData: [],
      centerDialogVisible: false,
      // nama_fasilitas:"",
      //   status:"",
      formData: {
        nama_fasilitas: "",
        status: "",
      },
      buttonDialog: "",
    };
  },
  computed: {
    search() {
      return this.$store.getters.getSearch;
    },
  },
  watch: {
    search() {
      console.log(this.search);
    },
  },
  mounted() {
    this.get();
  },
  methods: {
    get() {
      this.loader = true;
      FasilitasService.get().then((res) => {
        this.loader = false;
        this.tableData = res.data.data;
      });
    },
    tambah() {
        FasilitasService.post(this.formData).then((res) => {
          this.tableData = res.data.data;
          this.centerDialogVisible = false;
          this.get();
        });
    },
    handleDelete(id) {
      FasilitasService.delete(id).then((res) => {
        this.get();
      });
    },
    handlePreview(file) {
      console.log(file);
    },
    fileChange() {
      console.log(this.$refs.file.files);
      this.formData.gambar_fasilitas = this.$refs.file.files[0];
    },
    edit() {
      FasilitasService.put(this.formData).then((res) => {
        this.centerDialogVisible = false;
        this.get();
      });
    },
    getData() {},
  },
};
</script>

<style>
</style>