<template>
    <h2 class="text-center mb-3"><slot>{{ headingTtl }}</slot><slot name="heading-sub"></slot></h2>
</template>

<script>
// const defaultClass = 'text-center mb-3';

export default {
    name: 'PageHeading',
    props: {
        headingTtl: String,
    },
    // computed: {
    //     PageHeadingClass () {
    //         return defaultClass
    //     }
    // }
}
</script>
