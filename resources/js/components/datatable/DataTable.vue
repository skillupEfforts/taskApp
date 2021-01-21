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
                                v-model="sendDbTaskData[dbData.taskname]"
                                @input="$emit('input', $event.target.value)"
                                placeholder="実工数を入力してください。">
                            {{ sendDbTaskData[dbData.taskname] }}
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

export default {
    name: 'DataTable',
    data () {
        return {
            // sendDbTaskData: Array,
        }
    },
    model: {
        prop: 'actualHour',
        event: 'input'
    },
    props: {
        sendDbTaskData: Array,
        actualHourValue: String,
    },
    mounted() {
    },
    computed: {

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
