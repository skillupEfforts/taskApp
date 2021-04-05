<template>
    <div :class="`text-center mt-3 ${wrapClass}`">
        <button
            :id="registrationSubmitId"
            :type="registrationButtonType"
            :class="`btn ${btnClass}`"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationSubmitBtn',
    props: {
        registrationSubmitId: {
            type: String,
            default: '',
        },
        registrationButtonType: {
            type: String,
            default: '',
        },
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
