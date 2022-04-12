<template>
    <div class="top-nav" v-if="!$route.meta.hiddenTopnav">
        <el-card class="">
            <div class="row tw-items-center">
                <el-input
                    class="col"
                    placeholder="Type something"
                    prefix-icon="el-icon-search"
                    v-model="search">
                </el-input>
                <div class="col">
                    <el-dropdown>
                        <span class="el-dropdown-link">
                            Dropdown List <i class="el-icon-arrow-down el-icon--right"></i>
                        </span>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item>Action 1</el-dropdown-item>
                            <el-dropdown-item>Action 2</el-dropdown-item>
                            <el-dropdown-item>Action 3</el-dropdown-item>
                            <el-dropdown-item disabled>Action 4</el-dropdown-item>
                            <el-dropdown-item divided>Action 5</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                </div>
            </div>
        </el-card>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>