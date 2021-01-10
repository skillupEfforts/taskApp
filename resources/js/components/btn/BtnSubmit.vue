<template>
    <div class="text-center">
        <button :id="SubmitId" :type="ButtonType" class="btn btn-primary w-100" @click="onClick"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'BtnSubmit',
    props: {
        SubmitId: String,
        ButtonType: String
    },
    methods: {
        onClick () {
            this.$emit('onClick')
        }
    }
}
</script>
