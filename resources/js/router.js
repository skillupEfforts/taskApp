import Router from 'vue-router'
<<<<<<< HEAD
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
=======
import Index from './pages/Index.vue'
import Page2 from './pages/Page2.vue'

export default new Router({
  mode: 'history',
  routes: [
    {
        path: '/',
        name: 'top',
        component: Index
    },
    {
        path: '/page2',
        name: 'page2',
        component: Page2
    },
  ]
});
>>>>>>> c10a66e2da53a4be5dc28b71b1a32167f0c71698
