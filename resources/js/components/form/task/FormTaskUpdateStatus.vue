<template>
    <div class="l-task-input-box">
        <label :for="taskUpdateStatusId"><slot></slot></label>
        <select :name="taskStatusUpdataName" :id="taskUpdateStatusId" @change="onChange">
            <option v-for="(value, index) in status"
                    :value="value.StatusValue">{{ value.StatusTxt }}</option>
        </select>
        <slot name="task-status-error"></slot>
    </div>
</template>

<script>

export default {
    name: 'FormTaskUpdateStatus',
    props: {
        taskUpdateStatusId: String,
        taskStatusUpdataName: String,
        taskUpadateSelected: String,
        dbDate: Array,
    },
    model: {
        prop: 'taskSelected',
        event: 'onChange'
    },
    mounted() {
        // console.log('this.dbDate');
        // console.log(this.dbDate);
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
                    StatusValue: '着手前',
                },
                {
                    StatusTxt: '対応中',
                    StatusValue: '対応中',
                },
                {
                    StatusTxt: 'Dir確認中',
                    StatusValue: 'Dir確認中',
                },
                {
                    StatusTxt: 'FB修正中',
                    StatusValue: 'FB修正中',
                },
                {
                    StatusTxt: '完了',
                    StatusValue: '完了',
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
