<template>
    <div :class="`text-center ${wrapClass}`">
        <button :id="loginSubmitBtnId" :type="loginSubmitBtnType" :class="`btn btn-primary w-100 ${btnClass}`"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'FormLoginSubmitBtn',
    props: {
        loginSubmitBtnId: String,
        loginSubmitBtnType: String,
        btnClass: {
            type: String,
            default:''
        },
        wrapClass: {
            type: String,
            default:''
        },
    }
}
</script>
