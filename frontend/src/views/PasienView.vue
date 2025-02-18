<script setup>

    import axios from 'axios';
    import { reactive, onMounted, computed } from 'vue';

    const state = reactive({
        pasien: [],
        isLoading: true
    });

    onMounted(async () => {
      try{
        const response = await axios.get('http://localhost:8000/api/pasien');
        state.pasien = response.data;
      }catch{
        console.log("error bro");
      }finally{
        state.isLoading = false;
      }
    });


    const dataSource = computed(() => state.pasien);  
    const columns = [
      {
        title: 'Nama',
        dataIndex: 'nama',
        key: 'nama',
      },
      {
        title: 'Alamat',
        dataIndex: 'alamat',
        key: 'alamat',
      },
      {
        title: 'No. Telp',
        dataIndex: 'telepon',
        key: 'telepon',
      }
    ]
</script>
<template>
  <a-table :dataSource="dataSource" :columns="columns" :loading="state.isLoading"/>
</template>