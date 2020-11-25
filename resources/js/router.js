import Router from 'vue-router'
import PageLogin from "./components/pages/PageLogin.vue";
import PageIndex from "./components/pages/PageIndex.vue";
import PageError from "./components/pages/PageError.vue";


export default new Router({
    mode: "history",
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
        {
            path: "/error",
            name: "PageError",
            component: PageError
        }
    ]
});
