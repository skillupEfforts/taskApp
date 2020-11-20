<template>
    <nav class="nav nav-pills nav-fill border border-primary mb-5">
        <a class="nav-item nav-link active" href="#">{{ navTxt01 }}</a>
        <a class="nav-item nav-link" href="#">{{ navTxt02 }}</a>
    </nav>
</template>

<script>

export default {
    name: 'navigation',
    data () {
        return {
            navTxt01: '当日タスク',
            navTxt02: 'タスク登録',
        }
    },
}
</script>
