import Router from 'vue-router'
import PageLogin from "./components/pages/PageLogin.vue";
import PageIndex from "./components/pages/PageIndex.vue";
import PageError from "./components/pages/PageError.vue";
import PageAccount from "./components/pages/PageAccount.vue";


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
            path: "/account",
            name: "PageAccount",
            component: PageAccount
        },
        {
            path: "/error",
            name: "PageError",
            component: PageError
        }
    ]
});
