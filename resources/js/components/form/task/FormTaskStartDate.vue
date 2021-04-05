<template>
    <div>
        <label :for="taskStartDateId"><slot name="start"></slot></label>
        <input
            class="form-control"
            :type="taskStartDateInputType"
            :id="taskStartDateId"
            :name="taskStartDateName"
            :min="taskStartDateMin"
            :max="taskStartDateMax"
            :value="taskStartDateValue"
            @input="$emit('input', $event.target.value)"
            :required="taskStartDateRequired">
            <slot name="task-startdate-error"></slot>
    </div>
</template>

<script>

export default {
    name: 'FormTaskStartDate',
    model: {
        prop: 'taskStartDateValue',
        event: 'input'
    },
    props: {
        taskStartDateId: String,
        taskStartDateInputType: String,
        taskStartDateMin: String,
        taskStartDateMax: String,
        taskStartDateValue: String,
        taskStartDateName: String,
        taskStartDateRequired: {
            type: Boolean,
            default: false,
        },
    }
}
</script>
