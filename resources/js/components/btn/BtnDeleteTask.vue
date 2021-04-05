<template>
<button
    :class="`btn btn-danger ${btnClass}`"
    :id="btnId"
    :type="btnType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnDeleteTask.vue',
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
