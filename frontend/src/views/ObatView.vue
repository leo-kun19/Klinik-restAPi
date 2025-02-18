<script setup>

    import axios from 'axios';
    import { reactive, onMounted, computed } from 'vue';

    const state = reactive({
        obat: [],
        isLoading: true
    });

    onMounted(async () => {
      try{
        const response = await axios.get('http://localhost:8000/api/obat');
        state.obat = response.data;
      }catch{
        console.log("error fetching data");
      }finally{
        state.isLoading = false;
      }
    });


    const dataSource = computed(() => state.obat);  
    const columns = [
      {
        title: 'Nama',
        dataIndex: 'nama',
        key: 'nama',
      },            
      {
        title: 'Stok',
        dataIndex: 'stok',
        key: 'stok',
      },
      {
        title: 'Harga',
        dataIndex: 'harga',
        key: 'harga',
      }
    ]
</script>
<template>
  <a-table :dataSource="dataSource" :columns="columns" :loading="state.isLoading"/>
</template>