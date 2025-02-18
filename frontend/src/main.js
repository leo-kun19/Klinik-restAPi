import './assets/main.css'
import router from './router/main'
import Antd from 'ant-design-vue'

import { createApp } from 'vue'
import App from './App.vue'

createApp(App).use(router).use(Antd).mount('#app')
