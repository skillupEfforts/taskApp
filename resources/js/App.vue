<template>
    <div id="wrapper">
        <Theheader />
        <div class="container-fluid">
            <router-view/>
        </div>
        <Thefooter />
    </div>
</template>

<script>
    import Theheader from './components/header/Theheader.vue';
    import Thefooter from './components/footer/Thefooter.vue';
    export default {
        components: {
            Theheader,
            Thefooter
        }
    }
</script>
