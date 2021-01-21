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
            <BtnSubmit submit-id="SubmitHours" button-type="button" @onClick="saveHours">実工数保存</BtnSubmit>
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
    computed: {
        getHour() {//DBデータのコピーを使用して、実工数配列にオブジェクトとして入れる
            this.cloneDbData = [...this.sendDbTaskData]
            this.tasksHourValue.splice(0, this.tasksHourValue.length)//実工数配列を初期化

            this.cloneDbData.forEach((element, index) => {
                this.tasksHourValue.splice(index, 0, {[element.taskname]: this.tasksHourValue[element.taskname]})//実工数配列に{タスク名: 工数}で入れる
                if(typeof this.tasksHourValue[index][element.taskname] !== 'undefined') {//実工数が入っていれば、DBデータのコピーのjitsukosuと足し算する
                    this.cloneDbData[index].jitsukosu = parseInt(this.tasksHourValue[index][element.taskname]) + parseInt(this.cloneDbData[index].kosu)
                }
            })
            return [
                this.tasksHourValue,
                this.cloneDbData
            ]
        }
    },
    methods: {
        saveHours () {
            let params = new FormData();
            // const tasks = [['タスク',5], ['タスクタスクタスク',3,'着手前'], ['タスク１',2,'対応中']]
            const tasks = [
                {
                    taskname: 'タスク',
                    jitsukosu: 5,
                    state: ''
                },
                {
                    taskname: 'タスクタスクタスク',
                    jitsukosu: 3,
                    state: '着手前'
                },
                {
                    taskname: 'タスク１',
                    jitsukosu: 2,
                    state: '対応中'
                }
            ];

            axios.post('/api/updateTask', tasks)
            .then(response => {
                // this.dbTaskData = response.data
                console.log(response.data)

            })
            .catch(error => {
                // console.log(error)
                alert('エラーです')
            });
        }
    },
    components: {
        BtnSubmit
    }
}
</script>
