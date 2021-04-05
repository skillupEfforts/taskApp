<template>
<button
    :class="`btn btn-primary ${btnClass}`"
    :id="btnId"
    :type="btnType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnAddGrandChildTask',
    props: {
        btnId: String,
        btnType: String,
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
