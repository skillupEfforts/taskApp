<template>
    <div class="l-task-input-box">
        <label :for="taskStatusId"><slot></slot></label>
        <select :name="taskStatusName" :id="taskStatusId" @change="updateValue">
            <option v-for="(statusArray, index) in status"
                    :value="index">{{ statusArray }}</option>
        </select>
        <slot name="task-status-error"></slot>
    </div>
</template>

<script>
const statusArray = [
    '着手前',
    '対応中',
    'Dir確認中',
    'FB修正中',
    '完了'
]

export default {
    name: 'FormTaskStatus',
    model: {
        prop: 'taskSelected',
        event: 'input'
    },
    computed: {
        status () {
            // console.log(statusArray)
            return statusArray
        }
    },
    methods: {
        updateValue: function(e) {
          this.$emit("input", e.target.value);
        }
    },
    props: {
        taskStatusId: String,
        taskStatusName: String,
        taskSelected: String,
    }
}
</script>
