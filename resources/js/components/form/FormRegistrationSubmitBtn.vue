<template>
    <div class="text-center">
        <button :id="registrationSubmitId" :type="registrationButtonType" class="btn btn-primary w-100"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationSubmitBtn',
    props: {
        registrationSubmitId: String,
        registrationButtonType: String
    }
}
</script>
