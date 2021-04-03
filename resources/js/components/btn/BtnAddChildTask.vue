<template>
<button
    :class="`btn btn-primary ${btnClass}`"
    :id="addChildTaskId"
    :type="addChildTaskButtonType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnAddChildTask',
    props: {
        addChildTaskId: String,
        addChildTaskButtonType: String,
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
