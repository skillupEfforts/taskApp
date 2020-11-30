<template>
    <header>
        <h1 class="bg-primary text-white p-3 mb-3">
            <router-link class="m-heading-1"
            to="/"
            >{{ heading1Txt }}
            </router-link>
        </h1>
    </header>
</template>

<script>
export default {
    name: 'Theheader',
    data () {
        return {
            heading1Txt: 'タスク管理アプリ'
        }
    }
}
</script>
