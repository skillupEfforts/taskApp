<template>
    <div class="l-task-input-box">
        <label :for="taskNameId"><slot></slot></label>
        <input
            :type="taskNameInputType"
            class="form-control"
            :id="taskNameId"
            :name="taskNameIdName"
            :placeholder="taskNamePlaceHolder"
            :value="taskNameValue"
            @input="$emit('input', $event.target.value)"
            :required="taskNameRequired">
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
        taskNamePlaceHolder: String,
        taskNameIdvalue: String,
        taskNameIdName: String,
        taskNameIdRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
