<template>
    <div id="wrapper">
<<<<<<< HEAD
        <Theheader></Theheader>
        <div class="container-fluid">
            <router-view/>
        </div>
        <Thefooter></Thefooter>
=======
        <header>header</header>
        <router-view/>
        <footer>footer</footer>
>>>>>>> c10a66e2da53a4be5dc28b71b1a32167f0c71698
    </div>
</template>

<script>
<<<<<<< HEAD
    import Theheader from './components/header/Theheader.vue';
    import Thefooter from './components/footer/Thefooter.vue';
    export default {
        components: {
            Theheader,
            Thefooter
        }
    }
</script>
=======
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
>>>>>>> c10a66e2da53a4be5dc28b71b1a32167f0c71698
