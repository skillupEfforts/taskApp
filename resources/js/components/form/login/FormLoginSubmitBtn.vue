<template>
    <div class="text-center mt-3">
        <button :id="loginSubmitBtnId" :type="loginSubmitBtnType" class="btn btn-primary w-100"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'FormLoginSubmitBtn',
    props: {
        loginSubmitBtnId: String,
        loginSubmitBtnType: String
    }
}
</script>
