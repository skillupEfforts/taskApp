<template>
    <nav class="nav nav-pills nav-fill border border-primary mb-5">
        <router-link class="nav-item nav-link active" to="/home">当日タスク</router-link>
        <router-link class="btn nav-item nav-link" to="/taskall">タスク登録</router-link>
        <!-- <button class="btn nav-item nav-link" href="#" @click="$emit('open')">タスク登録</button> -->
    </nav>
</template>

<script>

export default {
    name: 'Navigation',
}
</script>
