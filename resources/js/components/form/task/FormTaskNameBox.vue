<template>
    <div class="l-task-input-box">
        <label :for="taskNameId"><slot></slot></label>
        <input
            :id="taskNameId"
            class="form-control"
            :type="taskNameInputType"
            :name="taskName"
            :placeholder="taskNamePlaceholder"
            :value="taskNameValue"
            :required="taskNameRequired"
            @input="$emit('input', $event.target.value)"
            @blur="onBlur">
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
        taskNameId: {
            type: String,
            default: '',
        },
        taskNameInputType: {
            type: String,
            default: '',
        },
        taskNamePlaceholder: {
            type: String,
            default: '',
        },
        taskNameValue: {
            type: String,
            default: '',
        },
        taskName: {
            type: String,
            default: '',
        },
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
