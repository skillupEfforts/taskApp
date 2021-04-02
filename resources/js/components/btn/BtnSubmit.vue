<template>
    <div class="text-center">
        <button
            class="btn btn-primary w-100"
            :id="SubmitId"
            :type="ButtonType"
            @click.prevent="onClick"
        ><slot></slot>
        </button>
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
