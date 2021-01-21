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
                    <tr v-for="(dbData, key) in receiveDbTaskData" :key="key">
                        <th scope="row" id="js-parentTask" class="text-center">
                            <slot name="taskNames">{{ dbData.taskname }}</slot>
                        </th>
                        <td id="js-plan-workeffortTime" class="text-center">
                            <slot name="taskHours">{{ dbData.kosu }}h／{{ dbData.kosu }}h</slot>
                        </td>
                        <td id="js-status" class="text-center">
                            <select :name="`taskStatusUpdateId` + dbData.taskname" :id="`taskStatusUpdateId` + dbData.taskname" v-model="dbData.state">
                            <option v-for="(value, key) in statuses"
                                    :value="value.statusValue"
                                    :key="key"
                                    >{{ value.statusTxt }}</option>
                            </select>
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
                                v-model.trim="sendUpdateData[dbData.taskname]"
                                @input="$emit('input', $event.target.value)"
                                placeholder="実工数を入力してください。">
                            <!-- {{ 'tasksHourValue' + dbData.taskname }} -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="l-w50-center mt-5">
            <BtnSubmit submit-id="SubmitHours" button-type="button" @onClick="update">タスク更新</BtnSubmit>
        </div>
    </div>
</template>

<script>
import BtnSubmit from '../btn/BtnSubmit.vue';
import FormTaskUpdateStatus from '../form/task/FormTaskUpdateStatus';

export default {
    name: 'DataTable',
    data () {
        return {
            cloneDbData: {//DBデータのコピー
                type: Object,
                required: false
            },
            sendUpdateData: [],//更新データの配列

        }
    },
    // model: {
    //     prop: 'sendUpdateData',
    //     event: 'input'
    // },
    props: {
        receiveDbTaskData: Array,
        // cloneDbData: Object,
        // sendUpdateData: String,
    },
    computed: {
        statuses () {
            const status = [
                {
                    statusTxt: 'ステータスを選択してください。',
                    statusValue: 'none',
                },
                {
                    statusTxt: '着手前',
                    statusValue: '着手前',
                },
                {
                    statusTxt: '対応中',
                    statusValue: '対応中',
                },
                {
                    statusTxt: 'Dir確認中',
                    statusValue: 'Dir確認中',
                },
                {
                    statusTxt: 'FB修正中',
                    statusValue: 'FB修正中',
                },
                {
                    statusTxt: '完了',
                    statusValue: '完了',
                },
            ]
            return status
        },
        getUpdateData() {//DBデータのコピーを使用して、実工数配列にオブジェクトとして入れる
            this.cloneDbData = [...this.receiveDbTaskData]
            this.sendUpdateData.splice(0, this.sendUpdateData.length)//実工数配列を初期化

            this.cloneDbData.forEach((element, index) => {
                //更新データの配列に{taskname: タスク名, jitsukosu: 実工数, state: ステータス}の形式で入れる
                this.sendUpdateData.splice(index, 0, {'taskname': element.taskname, 'jitsukosu': this.sendUpdateData[element.taskname], 'state': this.cloneDbData[index].state})
                if(typeof this.sendUpdateData[index].jitsukosu === 'undefined') {//実工数の入力がなければ
                    this.sendUpdateData[index].jitsukosu = 0
                }
                //入力した実工数とDBデータの工数を合算し、DBデータの実工数に挿入
                // this.cloneDbData[index].jitsukosu = parseInt(this.sendUpdateData[index].jitsukosu) + parseInt(this.cloneDbData[index].kosu)
            })
            return [
                this.sendUpdateData,
                // this.cloneDbData
            ]
        }
    },
    methods: {
        update () {
            this.getUpdateData
            console.log(this.sendUpdateData)

            axios.post('/api/updateTask', this.sendUpdateData)
            .then(response => {
                console.log(response.data)
                 alert('タスクを更新しました。')

            })
            .catch(error => {
                alert('エラーです')
            });
        },
    },
    components: {
        BtnSubmit,
        FormTaskUpdateStatus
    }
}
</script>
