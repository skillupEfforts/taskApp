<template>
<button
    :class="`btn btn-primary ${btnClass}`"
    :id="addTaskId"
    :type="addTaskButtonType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnAddTask',
    props: {
        addTaskId: String,
        addTaskButtonType: String,
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
