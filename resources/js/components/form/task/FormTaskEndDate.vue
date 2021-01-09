<template>
    <div>
        <label :for="taskEndDateId"><slot name="end"></slot></label>
        <input
            :type="taskEndDateInputType"
            class="form-control"
            :id="taskEndDateId"
            :name="taskEndDateName"
            :min="taskEndDateMin"
            :max="taskEndDateMax"
            :value="taskEndDateValue"
            @input="$emit('input', $event.target.value)"
            :required="taskEndDateRequired">
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
        taskEndDateId: String,
        taskEndDateInputType: String,
        taskEndDateMin: String,
        taskEndDateMax: String,
        taskEndDateValue: String,
        taskEndDateName: String,
        taskEndDateRequired: {
            type: Boolean,
            default: false,
        },
    },
}
</script>
