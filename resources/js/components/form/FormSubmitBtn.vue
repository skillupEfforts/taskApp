<template>
    <div class="text-center">
        <button :id="loginSubmitId" :type="loginButtonType" class="btn btn-primary w-100"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'FormSubmitBtn',
    props: {
        loginSubmitId: String,
        loginButtonType: String
    }
    // data () {
    //     return {
    //         headingTtl: "タスク一覧表示画面​"
    //     }
    // },
}
</script>
