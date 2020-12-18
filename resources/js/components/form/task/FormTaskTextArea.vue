<template>
    <div class="l-task-input-box">
        <div class="l-task-input-box-txt">
            <label :for="taskTextAreaId"><slot></slot></label>
            <textarea
            id="taskTextAreaId"
            name="taskTextAreaId"
            :value="taskMemo"
            @input="$emit('input', $event.target.value)">
            </textarea>
        </div>
    </div>
</template>

<script>

export default {
    name: 'FormTaskTextArea',
    model: {
        prop: 'taskMemo',
        event: 'input'
    },
    computed: {
        status () {
            // console.log(statusArray)
            return statusArray
        }
    },
    props: {
        taskTextAreaId: String,
        taskStatusName: String,
    }
}
</script>
