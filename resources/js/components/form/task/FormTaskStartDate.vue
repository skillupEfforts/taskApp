<template>
    <div>
        <label :for="taskStartDateId"><slot name="start"></slot></label>
        <input
            :id="taskStartDateId"
            class="form-control"
            :type="taskStartDateInputType"
            :name="taskStartDateName"
            :min="taskStartDateMin"
            :max="taskStartDateMax"
            :value="taskStartDateValue"
            :required="taskStartDateRequired"
            @input="$emit('input', $event.target.value)">
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
        taskStartDateId: {
            type: String,
            default: '',
        },
        taskStartDateInputType: {
            type: String,
            default: '',
        },
        taskStartDateMin: {
            type: String,
            default: '',
        },
        taskStartDateMax: {
            type: String,
            default: '',
        },
        taskStartDateValue: {
            type: String,
            default: '',
        },
        taskStartDateName: {
            type: String,
            default: '',
        },
        taskStartDateRequired: {
            type: Boolean,
            default: false,
        },
    }
}
</script>
