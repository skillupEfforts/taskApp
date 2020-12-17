<template>
    <div class="l-task-input-box">
        <label :for="taskHourId"><slot></slot></label>
        <input
            :type="taskHourInputType"
            class="form-control"
            :id="taskHourId"
            :name="taskHourIdName"
            :placeholder="taskHourPlaceHolder"
            :value="taskHourValue"
            @input="$emit('input', $event.target.value)"
            :required="taskHourRequired">
    </div>
</template>

<script>
export default {
    name: 'FormTaskHourBox',
    model: {
        prop: 'taskHourValue',
        event: 'input'
    },
    props: {
        taskHourId: String,
        taskHourInputType: String,
        taskHourPlaceHolder: String,
        taskHourIdvalue: String,
        taskHourIdName: String,
        taskHourIdRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
