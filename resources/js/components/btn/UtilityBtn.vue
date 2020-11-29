<template>
    <div class="text-center">
        <a :id="UtilityBtnId" :href="UtilityBtnHref" class="btn btn-primary w-100"><slot></slot></a>
    </div>
</template>

<script>
export default {
    name: 'UtilityBtn',
    props: {
        loginSubmitId: String,
        UtilityBtnHref: String,
    }
}
</script>
