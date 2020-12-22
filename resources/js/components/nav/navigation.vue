<template>
    <nav class="nav nav-pills nav-fill border border-primary mb-5">
        <a class="nav-item nav-link active" href="#">当日タスク</a>
        <button class="btn nav-item nav-link" href="#" @click="$emit('open')">タスク登録</button>
    </nav>
</template>

<script>

export default {
    name: 'navigation',
    // data () {
    //     return {
    //         navTxt01: '当日タスク',
    //         navTxt02: 'タスク登録',
    //     }
    // },
    // props: {
    //     SubmitId: String,
    //     ButtonType: String
    // }
}
</script>
