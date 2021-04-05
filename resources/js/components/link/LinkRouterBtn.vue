<template>
    <div :class="`text-center ${wrapClass}`">
        <router-link :class="`btn ${btnClass}`" :to="to"><slot></slot></router-link>
    </div>
</template>

<script>
export default {
    name: 'BtnRouterLink',
    props: {
        // eslint-disable-next-line vue/require-default-prop
        to: String | Object,
        btnClass: {
            type: String,
            default: ''
        },
        wrapClass: {
            type: String,
            default: ''
        }
    }
}
</script>
