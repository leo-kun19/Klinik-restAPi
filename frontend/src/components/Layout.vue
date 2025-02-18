<script setup>
    import { computed } from 'vue';
    import Sidebar from '@/components/Sidebar.vue'
    import { useRoute } from 'vue-router';
    const route = useRoute();
    const currentRoute = computed(() => route.name);
</script>
<template>
  <a-layout has-sider>
    <a-row :style="{width: '100%'}">
        <a-col>
            <Sidebar/>
        </a-col>
        <a-col flex="auto">
            <a-layout>
              <a-layout-header :style="{ background: '#fff', padding: '10px', display: 'flex', alignItems: 'center', justifyContent: 'space-between'}">
                 <h1>{{currentRoute}}</h1>
                 <!-- <a-input-search v-model:value="value" placeholder="input search loading deault" loading :style="{width: '50%', marginRight: '8px'}"/> -->
              </a-layout-header>
              <a-layout-content :style="{ margin: '24px 16px 0', overflow: 'initial' }">
                <a-layout style="padding: 0 24px 24px">
                    <!-- <a-breadcrumb style="margin: 16px 0">
                    <a-breadcrumb-item>Home</a-breadcrumb-item>
                    <a-breadcrumb-item>List</a-breadcrumb-item>
                    <a-breadcrumb-item>App</a-breadcrumb-item>
                    </a-breadcrumb> -->
                    <a-layout-content :style="{ background: '#fff', padding: '24px', margin: 0, minHeight: '280px' }">
                        <slot></slot>
                    </a-layout-content>   
                </a-layout>
              </a-layout-content>
              
            </a-layout>
        </a-col>
    </a-row>
  </a-layout>
</template>
<style scoped>

.site-layout .site-layout-background {
  background: #fff;
}

[data-theme='dark'] .site-layout .site-layout-background {
  background: #141414;
}
</style>
