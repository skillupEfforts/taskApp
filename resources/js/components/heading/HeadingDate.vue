<template>
    <p id="today" class="m-heading-date badge badge-success h6 p-3">{{ today }}</p>
</template>

<script>
//日付取得
const getTimes = new Date();
const year = getTimes.getFullYear();
const month = getTimes.getMonth() + 1;
const day = getTimes.getDate();
const week = getTimes.getDay();
const weekElem = ['日','月','火','水','木','金','土'];
const today = year + '年' + month + '月' + day + '日' + weekElem[week] + '曜日';

export default {
    name: 'HeadingDate',
    computed: {
        today () {
            return today
        }
    }
}
</script>
