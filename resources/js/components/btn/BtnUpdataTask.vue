<template>
<button
    :class="`btn btn-primary ${btnClass}`"
    :id="addUpdateTaskId"
    :type="addUpdateTaskButtonType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnUpdataTask.vue',
    props: {
        addUpdateTaskId: String,
        addUpdateTaskButtonType: String,
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
