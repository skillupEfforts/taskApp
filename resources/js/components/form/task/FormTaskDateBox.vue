<template>
    <div class="l-task-input-box">
        <div class="l-task-input-box-col2">
            <div>
                <label :for="taskStartDateId"><slot name="start"></slot></label>
                <input
                    :type="taskStartDateInputType"
                    class="form-control"
                    :id="taskStartDateId"
                    :name="taskStartDateIdName"
                    :min="taskStartDateMin"
                    :max="taskStartDateMax"
                    :value=today
                    @input="$emit('input', $event.target.value)"
                    :required="taskStartDateRequired">
            </div>
            <div>
                <label :for="taskEndDateId"><slot name="end"></slot></label>
                <input
                    :type="taskEndDateInputType"
                    class="form-control"
                    :id="taskEndDateId"
                    :name="taskEndDateIdName"
                    :min="taskEndDateMin"
                    :max="taskEndDateMax"
                    :value=tommorow
                    @input="$emit('input', $event.target.value)"
                    :required="taskEndDateRequired">
            </div>
        </div>
    </div>
</template>

<script>
//日付取得
var getTimes = new Date();
var year = getTimes.getFullYear();
var month = getTimes.getMonth() + 1;
var day = getTimes.getDate();
const today = year + '-' + month + '-' + day;
const tommorow = year + '-' + month + '-' + (day + 1);

export default {
    name: 'FormTaskDateBox',
    model: {
        prop: 'taskDateValue',
        event: 'input'
    },
    computed: {
        today () {
            return today
        }
    },
    props: {
        taskStartDateId: String,
        taskStartDateInputType: String,
        taskStartDateMin: String,
        taskStartDateMax: String,
        taskStartDateIdvalue: String,
        taskStartDateIdName: String,
        taskStartDateIdRequired: {
            type: Boolean,
            default: false,
        },
        taskEndDateId: String,
        taskEndDateInputType: String,
        taskEndDateMin: String,
        taskEndDateMax: String,
        taskEndDateIdvalue: String,
        taskEndDateIdName: String,
        taskEndDateIdRequired: {
            type: Boolean,
            default: false,
        },
    }
}
</script>
