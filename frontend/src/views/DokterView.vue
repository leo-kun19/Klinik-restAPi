<script setup>

    import axios from 'axios';
    import { reactive, onMounted, computed } from 'vue';

    const state = reactive({
        dokter: [],
        isLoading: true
    });

    onMounted(async () => {
      try{
        const response = await axios.get('http://localhost:8000/api/dokter');
        state.dokter = response.data;
      }catch{
        console.log("error fetching data");
      }finally{
        state.isLoading = false;
      }
    });


    const dataSource = computed(() => state.dokter);  
    const columns = [
      {
        title: 'Nama',
        dataIndex: 'nama',
        key: 'nama',
      },            
      {
        title: 'Spesialis',
        dataIndex: 'spesialis',
        key: 'spesialis',
      },
      {
        title: 'Telepon',
        dataIndex: 'telepon',
        key: 'telepon',
      }
    ]
</script>
<template>
  <a-table :dataSource="dataSource" :columns="columns" :loading="state.isLoading"/>
</template>