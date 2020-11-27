<template>
    <div>
        <label v-bind:for="id">{{ labelTxt }}</label>
        <input v-bind:type="inputType" class="form-control" v-bind:id="id"  v-bind:placeholder="placeHolder" :value="value" @input="$emit('input', $event.target.value)">
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
        'value'
        ],
    // data () {
    //     return {
    //         headingTtl: "タスク一覧表示画面​"
    //     }
    // },
}
</script>
