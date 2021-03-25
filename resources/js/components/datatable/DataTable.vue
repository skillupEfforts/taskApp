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
                            <slot name="taskHours">{{ dbData.jitsukosu }}／{{ dbData.kosu }}</slot>
                        </td>
                        <td id="js-status" class="text-center">
                            <select ref="statusSelect" :name="`taskStatusUpdateId` + dbData.taskname" :id="dbData.taskname">
                            <option v-for="(value, key) in statuses"
                                    :selected="value.statusValue === dbData.state"
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
                                v-model.trim="updateHours[dbData.taskname]"
                                placeholder="実工数を入力してください。">
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
// let updateHours = {}
let updateStatuses = {}

export default {
    name: 'DataTable',
    data () {
        return {
            cloneDbData: {//DBデータのコピー
                type: Object,
                required: false
            },
            sendUpdateData: [],//更新データの配列
            updateHours: {},//実工数を入れるオブジェクト

        }
    },
    props: {
        receiveDbTaskData: Object
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
    },
    methods: {
        saveHours () {
            let params = new FormData();
            // const tasks = [['タスク',5], ['タスクタスクタスク',3,'着手前'], ['タスク１',2,'対応中']]
            const tasks = [
                {
                    taskname: 'タスク',
                    jitsukosu: 5,
                    state: 'Dir確認中'
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
        },
        getUpdateData () {
            this.cloneDbData = [...this.receiveDbTaskData]
            this.sendUpdateData.splice(0, this.sendUpdateData.length)//実工数配列を初期化

            //ステータスを{タスク名: スタータス}の形式でオブジェクトに格納
            updateStatuses = {}
            let statusLen = this.$refs.statusSelect.length
            for(let i = 0; i < statusLen; i++){
                let statusTaskName = this.$refs.statusSelect[i].getAttribute('id')
                updateStatuses[statusTaskName] = this.$refs.statusSelect[i].value
            }

            this.cloneDbData.forEach((element, index) => {
                //更新データの配列に
                    // タスク名:{
                    //     taskname: タスク名, jitsukosu: 実工数, state: ステータス
                    // }の形式で入れる
                console.log(this.updateHours[element.taskname])
                let tempHour = 0
                if(typeof this.updateHours[element.taskname] !== 'undefined' && this.updateHours[element.taskname] !== '') {//実工数の入力がなければ実工数に0を入れる
                    tempHour = this.updateHours[element.taskname];
                }
                //入力した実工数とDBデータの工数を合算し、DBデータの実工数に挿入
                const calcHour = parseInt(tempHour) + parseInt(this.cloneDbData[index].jitsukosu);
                this.sendUpdateData.splice(index, 0, {'taskname': element.taskname, 'jitsukosu': calcHour, 'state': updateStatuses[element.taskname]})
                this.updateHours[element.taskname] = '';
            })
        },
        update () {
            this.getUpdateData();
            const updateData = {
                'sendUpdateData': this.sendUpdateData,
                'refreshDbData': this.cloneDbData
            }
            console.log(updateData)
            this.$emit('update', updateData);
        },
    },
    components: {
        BtnSubmit,
    }
}
</script>
