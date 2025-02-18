import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import PasienView from "@/views/PasienView.vue";
import DokterView from "@/views/DokterView.vue";
import ObatView from "@/views/ObatView.vue";
import JadwalView from "@/views/JadwalView.vue";
import NotFoundView from "@/views/NotFoundView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'Home',
            component: HomeView
        },
        {
            path: '/pasien',
            name: 'Pasien',
            component: PasienView
        },
        {
            path: '/dokter',
            name: 'Dokter',
            component: DokterView
        },
        {
            path: '/obat',
            name: 'Obat',
            component: ObatView
        },
        {
            path: '/jadwal',
            name: 'Jadwal',
            component: JadwalView
        },
        {
            path: '/:catchAll(.*)',
            name: 'Not Found',
            component: NotFoundView
        },
    ]
});

export default router;