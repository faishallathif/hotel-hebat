<template>
  <div class="top-nav" v-if="!$route.meta.hiddenTopnav">
    <div class="tw-card2">
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
              {{ userLokal.nama }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#" @click.prevent="logout">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      userLokal: JSON.parse(localStorage.getItem("user")),
    };
  },
  methods: {
    logout() {
      alert("asdasdas");
      localStorage.removeItem("user");
      this.$router.push("/login");
    },
  },
};
</script>

<style scoped>
a{
    color:black;
    cursor: pointer;
}
</style>