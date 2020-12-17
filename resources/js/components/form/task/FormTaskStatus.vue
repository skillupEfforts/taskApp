<template>
    <div class="l-task-input-box">
        <label :for="taskStatusId"><slot></slot></label>
        <select :name="taskStatusName" :id="taskStatusId">
            <option value="" v-for="(status, index) in statusArray">
            {{ status }}
            </option>
        </select>
        <!--<input
            :type="taskStatusInputType"
            class="form-control"
            :id="taskStatusId"
            :name="taskStatusIdName"
            :placeholder="taskStatusPlaceHolder"
            :value="taskStatusValue"
            @input="$emit('input', $event.target.value)"
            :required="taskStatusRequired">-->
    </div>
</template>

<script>
const statusArray = ['着手前', '対応中', 'Dir確認中', 'FB修正中', '完了']

export default {
    name: 'FormTaskStatus',
    model: {
        prop: 'taskNameValue',
        event: 'input'
    },
    computed: {
        today () {
            return today
        }
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
