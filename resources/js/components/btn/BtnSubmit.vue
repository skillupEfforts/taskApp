<template>
    <div class="text-center">
        <button v-bind:id="submitId" type="submit" class="btn btn-primary w-50"><slot></slot></button>
    </div>
</template>

<script>
export default {
    name: 'BtnSubmit',
    props: [
        'submitId',
    ],
    // data () {
    //     return {
    //         headingTtl: "タスク一覧表示画面​"
    //     }
    // },
}
</script>
