<template>
<button
    :class="`btn btn-info text-white ${btnClass}`"
    :id="addInfoTaskId"
    :type="addInfoTaskButtonType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnInfoTask.vue',
    props: {
        addInfoTaskId: String,
        addInfoTaskButtonType: String,
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
