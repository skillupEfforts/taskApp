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
                <!-- {{ sendDbTaskData }}
                {{ sendDbTaskData.length }} -->
                <DataTableRow>
                    <template #taskNames>{{ sendDbTaskData[0].taskname }}</template>
                    <template #taskHours>{{ sendDbTaskData[0].kosu }}／{{ sendDbTaskData[0].kosu }}</template>
                    <template #taskDates>{{ sendDbTaskData[0].startdate }}〜{{ sendDbTaskData[0].enddate }}</template>
                </DataTableRow>


                <!-- <tr>
                    <th scope="row" id="js-parentTask" class="text-center">
                        <slot name="taskNames">ダミー</slot>
                    </th>
                    <td id="js-plan-workeffortTime" class="text-center">
                        <slot name="taskHours">Hour/Hour</slot>
                    </td>
                    <td id="js-schedule" class="text-center">
                        <slot name="taskDates">Start〜End</slot>
                    </td>
                    <td id="js-actual-workeffortTime">
                        <input
                            type="text"
                            inputmode="numeric"
                            class="form-control"
                            :value="actualHour"
                            @input="$emit('input', $event.target.value)"
                            placeholder="実工数を入力してください">
                    </td>
                </tr> -->


                <!-- <tr v-for="taskDetails in taskDetail" :key="taskDetails.message">
                    <th scope="row" id="js-parentTask" class="text-center">
                        <span class="mr-1">JCOM</span>
                    </th>
                    <td id="js-plan-workeffortTime" class="text-center">2h/5h</td>
                    <td id="js-schedule" class="text-center">10/10〜12/10</td>
                    <td id="js-actual-workeffortTime">
                        <input
                            type="text"
                            inputmode="numeric"
                            class="form-control"
                            :value="actualHour"
                            @input="$emit('input', $event.target.value)"
                            placeholder="実工数を入力してください">
                    </td>
                </tr> -->
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
        }
    },
    model: {
        prop: 'actualHour',
        event: 'input'
    },
    props: {
        actualHour: String,
        sendDbTaskData: Array
    },
    mounted() {

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
