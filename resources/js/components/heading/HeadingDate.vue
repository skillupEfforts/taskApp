<template>
    <p id="today" class="badge badge-primary p-3">{{ today }}</p>
</template>

<script>
//日付取得
var getTimes = new Date();
var year = getTimes.getFullYear();
var month = getTimes.getMonth() + 1;
var day = getTimes.getDate();
var week = getTimes.getDay();
var weekElem = ['日','月','火','水','木','金','土'];
const today = year + '年' + month + '月' + day + '日' + weekElem[week] + '曜日';


export default {
    name: 'HeadingDate',
    data () {
        return {
            // date: today
        }
    },
    computed: {
    today () {
        return today
    }
  }
}
</script>
