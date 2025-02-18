<script setup>
import axios from 'axios';
import { reactive, onMounted, computed } from 'vue';

const state = reactive({
    pasien: [],
    isLoading: true
});

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/jadwal');
    state.pasien = response.data;
  } catch {
    console.log("Error fetching data");
  } finally {
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
    title: 'Spesialis',
    dataIndex: 'spesialis',
    key: 'spesialis',
  },
  {
    title: 'Jadwal',
    dataIndex: 'jadwal',
    key: 'jadwal',
  }
];
</script>

<template>
  <a-table :dataSource="dataSource" :columns="columns" :loading="state.isLoading" rowKey="id">
    <template #bodyCell="{ column, record }">
      <template v-if="column.key === 'nama'">
        {{ record.dokter?.nama || 'Tidak Ada' }}
      </template>

      <template v-else-if="column.key === 'spesialis'">
        {{ record.dokter?.spesialis || 'Tidak Ada' }}
      </template>

      <template v-else-if="column.key === 'jadwal'">
        {{ record.hari }} ({{ record.jam_mulai }} - {{ record.jam_selesai }})
      </template>
    </template>
  </a-table>
</template>

