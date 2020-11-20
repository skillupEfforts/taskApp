import Router from 'vue-router'
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