<template>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center w-25">タスク</th>
                    <th scope="col" class="text-center w-25">予定工数</th>
                    <th scope="col" class="text-center w-25">スケジュール</th>
                    <th scope="col" class="text-center w-auto">実工数入力</th>
                </tr>
            </thead>
            <tbody>
                <!-- {{ sendDbTaskData.length }}
                {{ sendDbTaskData[0] }} -->
                <tr v-for="(dbData, key, index) in sendDbTaskData" :key="index">
                    <th scope="row" id="js-parentTask" class="text-center">
                        <slot name="taskNames">{{ dbData.taskname }}</slot>
                    </th>
                    <td id="js-plan-workeffortTime" class="text-center">
                        <slot name="taskHours">{{ dbData.kosu }}／{{ dbData.kosu }}</slot>
                    </td>
                    <td id="js-schedule" class="text-center">
                        <slot name="taskDates">{{ dbData.startdate }}〜{{ dbData.enddate }}</slot>
                    </td>
                    <td id="js-actual-workeffortTime">
                        <input
                            type="text"
                            inputmode="numeric"
                            class="form-control"
                            @input="$emit('input', $event.target.value)"
                            placeholder="実工数を入力してください">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import DataTableRow from './DataTableRow'

export default {
    name: 'DataTable',
    data () {
        return {
            sendDbTaskData: Array
        }
    },
    model: {
        prop: 'actualHour',
        event: 'input'
    },
    props: {
        actualHour: String,
    },
    mounted() {
        axios.get('/api/getTask', {
            params: {
                userId: this.$route.params.userId,
                // userId: 'test',
            }
        })
        .then(response => {
            this.sendDbTaskData = response.data
            // console.log(this.sendDbTaskData);
            // console.log(this.sendDbTaskData[0].taskname);
        })
        .catch(error => {
            alert('エラーです')
        });
    },
    computed: {

    },
    methods: {

    },
    components: {
        DataTableRow
    }
}
</script>
