<script setup>
    import { computed } from 'vue';
    import { useRoute } from 'vue-router';
    import {
        UserOutlined,
        ScheduleOutlined,
        MedicineBoxOutlined,
        IdcardOutlined,
        HomeOutlined
    } from '@ant-design/icons-vue';
    import logo from '@/assets/img/logo.png';

    const route = useRoute();
    const selectedKeys = computed(() => [route.name]); 
</script>

<template>
    <div :style="{width: '100%', height: '100%'}">
        <a-layout-sider :style="{ height:'100%', minHeight: '100vh'}">
            <div :style="{display: 'flex', justifyContent: 'center', alignItems: 'center'}">
                <img class="logo" v-bind:src="logo"/>
            </div>
            <a-menu v-model:selectedKeys="selectedKeys" theme="dark" mode="inline">
                <a-menu-item key="Home">
                    <RouterLink to="/">
                        <home-outlined />
                        <span class="nav-text">Home</span>
                    </RouterLink>
                </a-menu-item>
                <a-menu-item key="Pasien">
                    <RouterLink to="/pasien">
                        <user-outlined />
                        <span class="nav-text">Pasien</span>
                    </RouterLink>
                </a-menu-item>
                <a-menu-item key="Dokter">
                    <RouterLink to="/dokter">
                        <idcard-outlined />
                        <span class="nav-text">Dokter</span>
                    </RouterLink>
                </a-menu-item>
                <a-menu-item key="Obat">
                    <RouterLink to="/obat">
                        <medicine-box-outlined />
                        <span class="nav-text">Obat</span>
                    </RouterLink>
                </a-menu-item>
                <a-menu-item key="Jadwal">
                    <RouterLink to="/jadwal">
                        <schedule-outlined />
                        <span class="nav-text">Jadwal</span>
                    </RouterLink>
                </a-menu-item>
            </a-menu>
        </a-layout-sider>
    </div>
</template>

<style scoped>
    .logo {
    height: 40px;
    margin: 16px;
    }
    .site-layout .site-layout-background {
    background: #fff;
    }

    [data-theme='dark'] .site-layout .site-layout-background {
    background: #141414;
    }
</style>
