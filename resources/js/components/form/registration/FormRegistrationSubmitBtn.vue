<template>
    <div :class="`text-center mt-3 ${wrapClass}`">
        <button
            :id="registrationSubmitId"
            :type="registrationButtonType"
            :class="`btn ${btnClass}`"
        ><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationSubmitBtn',
    props: {
        registrationSubmitId: String,
        registrationButtonType: String,
        wrapClass: {
            type: String,
            default: ''
        },
        btnClass: {
            type: String,
            default: ''
        }
    }
}
</script>
