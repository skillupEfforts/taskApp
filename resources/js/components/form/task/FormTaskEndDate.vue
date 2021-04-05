<template>
    <div>
        <label :for="taskEndDateId"><slot name="end"></slot></label>
        <input
            :id="taskEndDateId"
            class="form-control"
            :type="taskEndDateInputType"
            :name="taskEndDateName"
            :min="taskEndDateMin"
            :max="taskEndDateMax"
            :value="taskEndDateValue"
            :required="taskEndDateRequired"
            @input="$emit('input', $event.target.value)">
            <slot name="task-enddate-error"></slot>
    </div>
</template>

<script>

export default {
    name: 'FormTaskEndDate',
    model: {
        prop: 'taskEndDateValue',
        event: 'input'
    },
    props: {
        taskEndDateId: {
            type: String,
            default: '',
        },
        taskEndDateInputType: {
            type: String,
            default: '',
        },
        taskEndDateMin: {
            type: String,
            default: '',
        },
        taskEndDateMax: {
            type: String,
            default: '',
        },
        taskEndDateValue: {
            type: String,
            default: '',
        },
        taskEndDateName: {
            type: String,
            default: '',
        },
        taskEndDateRequired: {
            type: Boolean,
            default: false,
        },
    },
}
</script>
