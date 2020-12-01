<template>
    <h2 class="text-center mb-3"><slot></slot></h2>
</template>

<script>
// const defaultClass = 'text-center mb-3';

export default {
    name: 'PageHeading',
    props: {
        PageHeadingClass: String,
    },
    // computed: {
    //     PageHeadingClass () {
    //         return defaultClass
    //     }
    // }
}
</script>
