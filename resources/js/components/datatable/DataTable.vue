<template>
    <div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center w-25">タスク</th>
                        <th scope="col" class="text-center w-25">予定工数</th>
                        <th scope="col" class="text-center w-25">ステータス</th>
                        <th scope="col" class="text-center w-25">スケジュール</th>
                        <th scope="col" class="text-center w-auto">実工数入力</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- {{ sendDbTaskData.length }}
                    {{ sendDbTaskData[0] }} -->
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
            <BtnSubmit submit-id="SubmitHours" button-type="submit" @onClick="saveHours">実工数保存</BtnSubmit>
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
        // console.log(sendDbTaskData);
        // axios.get('/api/getTask', {
        //     params: {
        //         userId: this.$route.params.userId,
        //         // userId: 'test',
        //     }
        // })
        // .then(response => {
        //     this.sendDbTaskData = response.data
        //     console.log(this.sendDbTaskData);
        //     // console.log(this.sendDbTaskData[0].taskname);
        // })
        // .catch(error => {
        //     alert('エラーです')
        // });
    },
    computed: {

    },
    methods: {
        saveHours () {
            // alert('工数保存しました。')
            // console.log(this.sendDbTaskData.task3);
        }
    },
    components: {
        BtnSubmit
    }
}
</script>
