<template>
    <h3 class="text-center mb-3 text-info"><slot></slot></h3>
</template>

<script>
export default {
    name: 'Heading2',
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
