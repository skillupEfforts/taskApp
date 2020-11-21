<template>
    <div class="text-center">
        <button :id="loginSubmitId" type="submit" class="btn btn-primary w-50"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'FormSubmitBtn',
    props: {
        loginSubmitId: String
    }
    // data () {
    //     return {
    //         headingTtl: "タスク一覧表示画面​"
    //     }
    // },
}
</script>
