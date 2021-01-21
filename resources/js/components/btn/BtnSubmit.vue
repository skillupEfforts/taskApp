<template>
    <div class="text-center">
<<<<<<< HEAD
        <button :id="SubmitId" :type="ButtonType" class="btn btn-primary w-100" @click.prevent="onClick"><slot></slot></button>
=======
        <button :id="SubmitId" :type="ButtonType" class="btn btn-primary w-100" @submit.prevent="onClick" @click="onClick"><slot></slot></button>
>>>>>>> 7c51ed2db330ad7afead660a733738322286a668
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
