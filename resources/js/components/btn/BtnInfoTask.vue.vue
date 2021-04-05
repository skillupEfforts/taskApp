<template>
<button
    :id="btnId"
    :class="`btn btn-info text-white ${btnClass}`"
    :type="btnType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnInfoTask',
    props: {
        btnId: {
            type: String,
            default: ''
        },
        btnType: {
            type: String,
            default: ''
        },
        btnClass: {
            type: String,
            default: ''
        },
    },
    methods: {
        onClick () {
            this.$emit('onClick')
        }
    }
}
</script>
