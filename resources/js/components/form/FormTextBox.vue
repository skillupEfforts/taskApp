<template>
    <div>
        <label v-bind:for="id">{{ labelTxt }}</label>
        <input v-bind:type="inputType" class="form-control" v-bind:id="id"  v-bind:placeholder="placeHolder">
    </div>
</template>

<script>
export default {
    name: 'FormTextBox',
    props: [
        'id',
        'labelTxt',
        'inputType',
        'placeHolder',
        ],
    // data () {
    //     return {
    //         headingTtl: "タスク一覧表示画面​"
    //     }
    // },
}
</script>
