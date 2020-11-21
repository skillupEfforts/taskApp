<template>
    <div id="wrapper">
        <Theheader></Theheader>
        <router-view/>
        <Thefooter></Thefooter>
    </div>
</template>

<script>
import Theheader from './header/Theheader.vue'
import Thefooter from './footer/Thefooter.vue'

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            Theheader,
            Thefooter,
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
