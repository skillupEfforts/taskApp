<template>
    <div class="l-task-input-box">
        <div class="l-task-input-box-col2">
            <div>
                <label :for="taskStartDateId"><slot name="start"></slot></label>
                <input
                    :type="taskStartDateInputType"
                    class="form-control"
                    :id="taskStartDateId"
                    :name="taskStartDateName"
                    :min="taskStartDateMin"
                    :max="taskStartDateMax"
                    :value=today
                    @input="$emit('input', $event.target.value)"
                    :required="taskStartDateRequired">
                    <slot name="task-startdate-error"></slot>
            </div>
            <div>
                <label :for="taskEndDateId"><slot name="end"></slot></label>
                <input
                    :type="taskEndDateInputType"
                    class="form-control"
                    :id="taskEndDateId"
                    :name="taskEndDateName"
                    :min="taskEndDateMin"
                    :max="taskEndDateMax"
                    :value=tommorow
                    @input="$emit('input', $event.target.value)"
                    :required="taskEndDateRequired">
                    <slot name="task-enddate-error"></slot>
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
const tommorow = year + '-' + month + '-' + parseInt((day + 1));

export default {
    name: 'FormTaskDateBox',
    model: {
        prop: 'taskDateValue',
        event: 'input'
    },
    computed: {
        today () {
            return today
        },
        tommorow () {
            return tommorow
        },
    },
    props: {
        taskStartDateId: String,
        taskStartDateInputType: String,
        taskStartDateMin: String,
        taskStartDateMax: String,
        taskStartDateIdvalue: String,
        taskStartDateName: String,
        taskStartDateRequired: {
            type: Boolean,
            default: false,
        },
        taskEndDateId: String,
        taskEndDateInputType: String,
        taskEndDateMin: String,
        taskEndDateMax: String,
        taskEndDateIdvalue: String,
        taskEndDateName: String,
        taskEndDateRequired: {
            type: Boolean,
            default: false,
        },
    }
}

</script>
