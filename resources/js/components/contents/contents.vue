<template>
    <PageLogin></PageLogin>
</template>

<script>
import PageIndex from '../pages/PageIndex.vue';
import PageLogin from '../pages/PageLogin.vue';

export default {
    name: 'contents',
    // data () {
    //     return {
    //         headingTtl: 'タスク一覧表示画面​',
    //         submitTxt: '実工数保存',
    //     }
    // },
    components: {
        PageIndex,
        PageLogin,
    }
}


</script>
