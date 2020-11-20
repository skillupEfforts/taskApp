<template>
    <div id="wrapper">
        <header>header</header>
        <router-view/>
        <footer>footer</footer>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
    header {
        width: 100%;
        padding: 10px;
        text-align: center;
        background: #ccc;
    }
    footer {
        width: 100%;
        padding: 10px;
        text-align: center;
        background: #ccc;
    }
</style>