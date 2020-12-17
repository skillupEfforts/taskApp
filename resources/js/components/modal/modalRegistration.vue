<template>
  <transition name="l-modal" appear>
    <div class="l-modal l-modal-overlay" @click.self="$emit('close')">
      <div class="l-modal-window">
        <div class="l-modal-content">
            <Heading2>タスク新規追加</Heading2>
            <div class="l-task-input">
                <FormTaskNameBox
                    taskNameId="taskNameId"
                    taskNameInputType="text"
                    taskNamePlaceHolder="親タスクを入力してください"
                    taskNameIdName="taskNameId"
                >親タスク入力</FormTaskNameBox>
                <FormTaskHourBox
                    taskHourId="taskHourId"
                    taskHourInputType="text"
                    taskHourPlaceHolder="予定工数を入力してください"
                    taskHourIdName="taskHourId"
                >工数入力</FormTaskHourBox>
                <FormTaskDateBox
                    taskStartDateId="taskStartDateStartId"
                    taskStartDateInputType="date"
                    taskStartDateMin="2021-01-01"
                    taskStartDateMax="2022-01-01"
                    taskStartDateIdName="taskStartDateStartId"
                    taskEndDateId="taskEndDateStartId"
                    taskEndDateInputType="date"
                    taskEndDateMin="2021-01-01"
                    taskEndDateMax="2022-01-01"
                    taskEndDateIdName="taskEndDateStartId"
                >
                <template slot="start">期間（開始日）</template>
                <template slot="end">期間（終了日）</template>
                </FormTaskDateBox>
                <FormTaskStatus>ステータス</FormTaskStatus>
            </div>
        </div>
        <footer class="l-modal-footer">
          <slot name="footer">
            <button @click="$emit('add')"><slot></slot></button>
            <button @click="$emit('close')"><slot></slot></button>
          </slot>
        </footer>
      </div>
    </div>
  </transition>
</template>

<script>
import Heading2 from '../heading/Heading2.vue';
import FormTaskNameBox from '../form/task/FormTaskNameBox.vue';
import FormTaskHourBox from '../form/task/FormTaskHourBox.vue';
import FormTaskDateBox from '../form/task/FormTaskDateBox.vue';
import FormTaskStatus from '../form/task/FormTaskStatus.vue';

export default {
    name: 'modalRegistration',
    data() {
        return {
            taskName: '',
            taskHour: '',
            taskDate: '',
            taskNameValue: '',
        }
    },
    // model: {
    //     // prop: 'parentTaskNameValue',
    //     event: 'input'
    // },
    // props: {
    //     parentTaskId: String,
    //     parentTaskIdName: String,
    //     parentTaskIdPlaceHolder: String,
    //     parentTaskNameValue: String,
    // },
    components: {
        Heading2,
        FormTaskNameBox,
        FormTaskHourBox,
        FormTaskDateBox,
        FormTaskStatus,
    }
}
</script>
