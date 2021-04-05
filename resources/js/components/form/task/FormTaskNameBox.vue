<template>
    <div class="l-task-input-box">
        <label :for="taskNameId"><slot></slot></label>
        <input
            class="form-control"
            :type="taskNameInputType"
            :id="taskNameId"
            :name="taskName"
            :placeholder="taskNamePlaceholder"
            :value="taskNameValue"
            @input="$emit('input', $event.target.value)"
            @blur="onBlur"
            :required="taskNameRequired">
        <slot name="task-name-error"></slot>
    </div>
</template>

<script>
export default {
    name: 'FormTaskNameBox',
    model: {
        prop: 'taskNameValue',
        event: 'input'
    },
    props: {
        taskNameId: String,
        taskNameInputType: String,
        taskNamePlaceholder: String,
        taskNameValue: String,
        taskName: String,
        taskNameRequired: {
            type: Boolean,
            default: false,
        }
    },
    methods: {
        onBlur () {
            this.$emit('onBlur')
        }
    }
}
</script>
