import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import PageLogin from "./components/pages/PageLogin.vue";
import PageIndex from "./components/pages/PageIndex.vue";


const router = new VueRouter({
    mode: "pages",
    routes: [
        {
            path: "/",
            name: "PageLogin",
            component: PageLogin
        },
        {
            path: "/home",
            name: "PageIndex",
            component: PageIndex
        },
    ]
});

export default router;
