<template>
    <div class="l-task-input-box">
        <label :for="taskStatusId"><slot></slot></label>
        <select :name="taskStatusName" :id="taskStatusId" @change="onChange">
            <option v-for="(value, index) in status"
                    :value="value.StatusValue">{{ value.StatusTxt }}</option>
        </select>
        <slot name="task-status-error"></slot>
    </div>
</template>

<script>

export default {
    name: 'FormTaskStatus',
    props: {
        taskStatusId: String,
        taskStatusName: String,
        taskSelected: String,
        statusObject: Object,
    },
    model: {
        prop: 'taskSelected',
        event: 'onChange'
    },
    computed: {
        status () {
            const statusObject = [
                {
                    StatusTxt: 'ステータスを選択してください。',
                    StatusValue: 'none',
                },
                {
                    StatusTxt: '着手前',
                    StatusValue: '1',
                },
                {
                    StatusTxt: '対応中',
                    StatusValue: '2',
                },
                {
                    StatusTxt: 'Dir確認中',
                    StatusValue: '3',
                },
                {
                    StatusTxt: 'FB修正中',
                    StatusValue: '4',
                },
                {
                    StatusTxt: '完了',
                    StatusValue: '5',
                },
            ]
            return statusObject
        }
    },
    methods: {
        onChange: function(e) {
          this.$emit("onChange", e.target.value);
        }
    },
}
</script>
