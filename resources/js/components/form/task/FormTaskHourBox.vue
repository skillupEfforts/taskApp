<template>
    <div class="l-task-input-box">
        <label :for="taskHourId"><slot></slot></label>
        <input
            :id="taskHourId"
            class="form-control"
            :type="taskHourInputType"
            :name="taskHourName"
            :placeholder="taskHourPlaceholder"
            :value="taskHourValue"
            :required="taskHourRequired"
            @input="$emit('input', $event.target.value)"
            @blur="onBlur">
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
        taskHourId: {
            type: String,
            default: '',
        },
        taskHourInputType: {
            type: String,
            default: '',
        },
        taskHourPlaceholder: {
            type: String,
            default: '',
        },
        taskHourValue: {
            type: String,
            default: '',
        },
        taskHourName: {
            type: String,
            default: '',
        },
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
