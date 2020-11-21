import Router from 'vue-router'
import Index from './pages/Index.vue'
import Page2 from './pages/Page2.vue'
import PageLogin from './pages/PageLogin.vue'

export default new Router({
  mode: 'history',
  routes: [
    // {
    //     path: '/',
    //     name: 'top',
    //     component: Index
    // },
    {
        path: '/',
        name: 'PageLogin',
        component: PageLogin
    },
    {
        path: '/page2',
        name: 'page2',
        component: Page2
    },
  ]
});
