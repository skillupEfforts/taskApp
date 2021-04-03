<template>
<button
    :class="`btn btn-info text-white ${btnClass}`"
    :id="btnId"
    :type="btnType"
    @click="onClick">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: 'BtnInfoTask.vue',
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
