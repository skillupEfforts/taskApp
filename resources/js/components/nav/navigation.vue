<template>
    <nav class="nav nav-pills nav-fill border border-primary mb-5">
        <router-link class="nav-item nav-link active" :to="toIndex">当日タスク</router-link>
        <router-link class="btn nav-item nav-link" :to="toTaskall">タスク登録</router-link>
    </nav>
</template>

<script>

export default {
    name: 'Navigation',
    props: {
        loginId: {
            type: String,
            default: ''
        },
        toIndex: {
            type: [Object, Function],
            default: () => {}
        },
        toTaskall: {
            type: [Object, Function],
            default: () => {}
        }
    }
}
</script>
