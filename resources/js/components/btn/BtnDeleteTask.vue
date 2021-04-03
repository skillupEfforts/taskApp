<template>
<button
    :class="`btn btn-danger ${btnClass}`"
    :id="addDeleteTaskId"
    :type="addDeleteTaskButtonType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnDeleteTask.vue',
    props: {
        addDeleteTaskId: String,
        addDeleteTaskButtonType: String,
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
