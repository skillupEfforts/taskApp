<template>
  <transition name="l-modal" appear>
    <div class="l-modal l-modal-overlay" @click.self="$emit('close')">
      <div class="l-modal-window">
        <form>
            <div class="l-modal-content">
                <Heading3>タスク新規追加</Heading3>
                <div class="l-task-input">
                    <FormTaskNameBox
                        task-name-id="taskNameId"
                        task-name-input-type="text"
                        task-name-placeholder="親タスクを入力してください"
                        task-name="taskNameId"
                        @onBlur="taskNameCheck"
                        v-model="taskValueObject.taskName"
                        task-name-required>
                        <strong>親タスク入力</strong>
                        <template #task-name-error>
                            <p class="text-danger" v-if="taskNameError">タスク名が入力されていません。</p>
                            <p class="text-danger" v-if="taskNameDuplicateError">既に登録済みのタスクと重複しています。</p>
                        </template>
                    </FormTaskNameBox>
                    <FormTaskHourBox
                        task-hour-id="taskHourId"
                        task-hour-input-type="text"
                        task-hour-placeholder="予定工数を入力してください"
                        task-hour-name="taskHourId"
                        @onBlur="taskHourCheck"
                        v-model="taskValueObject.taskHour"
                        task-hour-required>
                        <strong>工数入力</strong>
                        <template #task-hour-error v-if="taskHourError">
                            <p class="text-danger">工数が入力されていません。</p>
                        </template>
                    </FormTaskHourBox>
                    <div class="l-task-input-box">
                        <div class="l-task-input-box-col2">
                            <FormTaskStartDate
                                task-start-date-id="taskStartDateStartId"
                                task-start-date-input-type="date"
                                task-start-date-min="2021-01-01"
                                task-start-date-max="2022-01-01"
                                task-start-date-id-name="taskStartDateStartId"
                                taskStartDateValue=""
                                v-model="taskValueObject.taskStartDate"
                                task-start-date-required>
                                <template #start><strong>期間（開始日）</strong></template>
                                <template #task-startdate-error v-if="taskStartDateError">
                                    <p class="text-danger">タスクの開始時期が入力されていません。</p>
                                </template>
                            </FormTaskStartDate>
                            <FormTaskEndDate
                                task-end-date-id="taskEndDateStartId"
                                task-end-date-input-type="date"
                                task-end-date-min="2021-01-01"
                                task-end-date-max="2022-01-01"
                                task-end-date-id-name="taskEndDateStartId"
                                taskEndDateValues=""
                                v-model="taskValueObject.taskEndDate"
                                task-end-date-required>
                                <template #end><strong>期間（開始日）</strong></template>
                                <template #task-enddate-error v-if="taskEndDateError">
                                    <p class="text-danger">タスクの開始時期が入力されていません。</p>
                                </template>
                            </FormTaskEndDate>
                        </div>
                    </div>
                    <FormTaskStatus
                        task-status-id="taskStatusId"
                        task-status-name="taskStatusName"
                        v-model="taskValueObject.taskStatus"
                        @onChange="taskStatusCheck">
                        <strong>ステータス</strong>
                        <template #task-status-error v-if="taskStatusError">
                            <p class="text-danger">タスクのステータスが選択されていません。</p>
                        </template>
                    </FormTaskStatus>
                    <FormTaskTextArea
                        task-textarea-id="taskTextAreaId"
                        v-model="taskMemo">
                        <strong>メモ</strong>
                    </FormTaskTextArea>
                </div>
            </div>
            <footer class="l-modal-footer">
                <FormTaskSubmitBtn
                    taskSubmitBtnId="taskRegistration"
                    taskSubmitBtnType="submit"
                    @onClick="taskRefresh">
                    タスク登録</FormTaskSubmitBtn>
            </footer>
        </form>
      </div>
    </div>
  </transition>
</template>

<script>
import Heading3 from '../heading/Heading3.vue';
import BtnSubmit from '../btn/BtnSubmit.vue';
import FormTaskNameBox from '../form/task/FormTaskNameBox.vue';
import FormTaskHourBox from '../form/task/FormTaskHourBox.vue';
import FormTaskStartDate from '../form/task/FormTaskStartDate.vue';
import FormTaskEndDate from '../form/task/FormTaskEndDate.vue';
import FormTaskStatus from '../form/task/FormTaskStatus.vue';
import FormTaskTextArea from '../form/task/FormTaskTextArea.vue';
import FormTaskSubmitBtn from '../form/task/FormTaskSubmitBtn.vue';

export default {
    name: 'modalRegistration',
    data() {
        return {
            //higehogeErrorはエラー文言フラグ
            //Error以外はv-model
            taskName: '',
            taskNameError: false,
            taskHour: '',
            taskHourError: false,
            taskStartDate: '',
            taskStartDateError: false,
            taskEndDate: '',
            taskEndDateError: false,
            taskStatus: 'none',
            taskStatusError: false,
            taskMemo: '',
            taskNameDuplicateError: false,
            dbRefreshData: Array,
            taskValueObject: {
                taskName: '',
                taskHour: '',
                taskStartDate: '',
                taskEndDate: '',
                taskStatus: 'none',
                taskMemo: '',
            }
        }
    },
    props : {
        userId: String,
    },
    mounted() {
        //期日カレンダーの初期値を今日、明日にする
        var getTimes = new Date();
        var year = getTimes.getFullYear();
        var month = getTimes.getMonth() + 1;
        var day = getTimes.getDate();
        const today = year + '-' + month + '-' + day;
        const tommorow = year + '-' + month + '-' + (day + 1);
        this.taskStartDate = today
        this.taskEndDate = tommorow
    },
    methods: {
        taskNameCheck() {
            if(this.taskValueObject.taskName.trim() === '') {
                this.taskNameError = true;
            } else {
                this.taskNameError = false;

                axios.get('/api/duplicateCheckTask', {
                    params: {
                        taskname: this.taskValueObject.taskName
                    }
                })
                .then(response => {
                    if(response.data === 'duplicate') {
                        this.taskNameDuplicateError = true;
                    } else {
                        this.taskNameDuplicateError = false;
                    }
                })
                .catch(error => {
                // console.log(error)
                    alert('エラーです')
                });
            }
        },
        taskHourCheck() {
            if(this.taskValueObject.taskHour === ''){
                this.taskHourError = true
            } else {
                this.taskHourError = false
            }
        },
        taskStatusCheck() {
            if(this.taskValueObject.taskStatus === 'none'){
                this.taskStatusError = true
            } else {
                this.taskStatusError = false
            }
        },
        taskRefresh() {
            console.log('modalRegistration.vueのtaskRefreshのイベント確認')
            this.$emit('taskRefresh', this.taskValueObject)
        }
    },
    components: {
        Heading3,
        BtnSubmit,
        FormTaskNameBox,
        FormTaskHourBox,
        FormTaskStatus,
        FormTaskStartDate,
        FormTaskEndDate,
        FormTaskTextArea,
        FormTaskSubmitBtn,
    }
}
</script>
