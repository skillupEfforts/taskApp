<template>
    <div class="l-task-input-box">
        <label :for="taskHourId"><slot></slot></label>
        <input
            class="form-control"
            :type="taskHourInputType"
            :id="taskHourId"
            :name="taskHourName"
            :placeholder="taskHourPlaceholder"
            :value="taskHourValue"
            @input="$emit('input', $event.target.value)"
            @blur="onBlur"
            :required="taskHourRequired">
        <slot name="task-hour-error"></slot>
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
        taskHourPlaceholder: String,
        taskHourValue: String,
        taskHourName: String,
        taskHourRequired: {
            type: Boolean,
            default: false,
        }
    },
    methods: {
        onBlur () {
            this.$emit('onBlur')
        }
    },
}
</script>
