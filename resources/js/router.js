import Router from 'vue-router'
import PageRegistration from "./components/pages/PageRegistration.vue";
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
            path: "/registration",
            name: "PageRegistration",
            component: PageRegistration
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
