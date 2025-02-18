<script setup>
    import logo from '@/assets/img/logo.png';
    import { ref } from 'vue';
    const selectedKeys1 = ref(['2']);
    const selectedKeys2 = ref(['1']);
    const openKeys = ref(['sub1']);
</script>

<template>
    <a-layout-header>
      <a-flex class="header">
        <img class="logo" v-bind:src="logo" alt="Logo Klinik" />
        <a-input-search v-model:value="value" placeholder="input search loading deault" :loading="true" class="search-bar"/>
      </a-flex>   
    </a-layout-header>
</template>

<style scoped>
    .logo {
        float: left;
        width: 120px;
        height: 31px;
    }
    
    .search-bar{
      width: 30%;
    }

    .header{
      justify-content: space-between;
      align-items: center;
      height: 100%;
    }
</style>
