<template>
<button
    :class="`btn btn-primary ${btnClass}`"
    :id="addGrandChildTaskId"
    :type="addGrandChildTaskButtonType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnAddGrandChildTask',
    props: {
        addGrandChildTaskId: String,
        addGrandChildTaskButtonType: String,
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
