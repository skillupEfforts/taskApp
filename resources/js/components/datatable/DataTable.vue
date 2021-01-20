<template>
    <div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center m-table-w20">タスク</th>
                        <th scope="col" class="text-center m-table-w20">予定工数</th>
                        <th scope="col" class="text-center m-table-w20">ステータス</th>
                        <th scope="col" class="text-center m-table-w20">スケジュール</th>
                        <th scope="col" class="text-center w-auto">実工数入力</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(dbData, key) in sendDbTaskData" :key="key">
                        <th scope="row" id="js-parentTask" class="text-center">
                            <slot name="taskNames">{{ dbData.taskname }}</slot>
                        </th>
                        <td id="js-plan-workeffortTime" class="text-center">
                            <slot name="taskHours">{{ dbData.kosu }}／{{ dbData.kosu }}</slot>
                        </td>
                        <td id="js-status" class="text-center">
                            <slot name="taskStatus">{{ dbData.state }}</slot>
                        </td>
                        <td id="js-schedule" class="text-center">
                            <slot name="taskDates">{{ dbData.startdate }}〜{{ dbData.enddate }}</slot>
                        </td>
                        <td id="js-actual-workeffortTime">
                            <input
                                type="text"
                                inputmode="numeric"
                                :name="'actualHour' + dbData.taskname"
                                :id="'actualHour' + dbData.taskname"
                                class="form-control"
                                v-model="tasksHourValue[dbData.taskname]"
                                @input="$emit('input', $event.target.value)"
                                placeholder="実工数を入力してください。">
                            <!-- {{ 'tasksHourValue' + dbData.taskname }} -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="l-w50-center mt-5">
            <BtnSubmit submit-id="SubmitHours" button-type="submit" @onClick="saveHours(), hour()">実工数保存</BtnSubmit>
        </div>
    </div>
</template>

<script>
import BtnSubmit from '../btn/BtnSubmit.vue';
// :value="`tasksHourValue` + dbData.taskname"

export default {
    name: 'DataTable',
    data () {
        return {
            cloneDbData: {//DBデータのコピー
                type: Object,
                required: false
            },
            tasksHourValue: []//実工数の配列（中身はオブジェクト）
        }
    },
    // model: {
    //     prop: 'tasksHourValue',
    //     event: 'input'
    // },
    props: {
        sendDbTaskData: Array,
        // cloneDbData: Object,
        // tasksHourValue: String,
    },
    updated() {//親からのDBデータをコピーする
        // console.log(this.cloneDbData)
    },
    mounted() {
        // console.log(typeof this.tasksHourValue)
    },
    computed: {
        // getHour() {
        //     // var self = this
        //     return console.log(this.tasksHourValue)
        // }
    },
    methods: {
        saveHours () {//DBデータのコピーを使用して、実工数配列にオブジェクトとして入れる
            // console.log(this.cloneDbData)
            this.cloneDbData = [...this.sendDbTaskData]

            this.cloneDbData.forEach((element, index) => {
                this.tasksHourValue.splice(index, 0, {[element.taskname]: this.tasksHourValue[element.taskname]})
                this.cloneDbData[index].jitsukosu = this.tasksHourValue[index][element.taskname] + this.cloneDbData[index].kosu
                // this.tasksHourValue.push({[element.taskname]: this.tasksHourValue[element.taskname]})
                // console.log(this.tasksHourValue[index])
                // this.tasksHourValu[element.taskname] = this.tasksHourValu[element.taskname]
                // this.$set(this.cloneDbData, this.tasksHourValue[element.taskname], this.tasksHourValue[index][element.taskname])
            })
            console.log(this.tasksHourValue)
            console.log(this.cloneDbData)
            // console.log(this.cloneDbData)

        },
        hour() {
            // console.log(this.tasksHourValue)
        }
    },
    components: {
        BtnSubmit
    }
}
</script>
