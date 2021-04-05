<template>
<button
    :id="btnId"
    :class="`btn btn-primary ${btnClass}`"
    :type="btnType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnAddGrandChildTask',
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
