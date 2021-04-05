<template>
    <button
        :id="taskSubmitBtnId"
        :type="taskSubmitBtnType"
        :class="`btn btn-success w-100 w-50 mx-auto ${btnClass}`"
        @click.prevent="onClick">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: 'FormTaskSubmitBtn',
    props: {
        taskSubmitBtnId: String,
        taskSubmitBtnType: String,
        btnClass: {
            type: String,
            default:''
        },
    },
    methods:{
        onClick () {
            this.$emit('onClick')
        }
    }
}
</script>
