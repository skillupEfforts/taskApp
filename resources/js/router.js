import Router from 'vue-router'
import PageLogin from './pages/index.vue'
import PageError from './pages/error/index.vue'
import PageRegistration from './pages/registration/index.vue'
import PageIndex from './pages/task/index.vue'
import PageTaskAll from './pages/task/taskall.vue'

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'PageLogin',
            component: PageLogin,
        },
        {
            path: '/error',
            name: 'PageError',
            component: PageError,
        },
        {
            path: '/registration',
            name: 'PageRegistration',
            component: PageRegistration,
        },
        {
            path: '/task',
            name: 'PageIndex',
            component: PageIndex,
        },
        {
            path: '/taskall',
            name: 'PageTaskAll',
            component: PageTaskAll,
        },
    ],
})
