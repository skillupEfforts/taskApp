<template>
  <transition name="l-modal" appear>
    <div class="l-modal l-modal-overlay" @click.self="$emit('close')">
      <div class="l-modal-window">
        <form>
            <div class="l-modal-content">
                <Heading2>タスク新規追加</Heading2>
                <div class="l-task-input">
                    <FormTaskNameBox
                        task-name-id="taskNameId"
                        task-name-input-type="text"
                        task-name-placeholder="親タスクを入力してください"
                        task-name="taskNameId"
                        @onBlur="taskNameCheck"
                        v-model="taskName">
                        親タスク入力{{ taskName }}
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
                        v-model="taskHour">
                        工数入力{{ taskHour }}
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
                                v-model="taskStartDate">
                                <template #start>期間（開始日）{{ taskStartDate }}</template>
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
                                v-model="taskEndDate">
                                <template #end>期間（開始日）{{ taskEndDate }}</template>
                                <template #task-enddate-error v-if="taskEndDateError">
                                    <p class="text-danger">タスクの開始時期が入力されていません。</p>
                                </template>
                            </FormTaskEndDate>
                        </div>
                    </div>
                    <FormTaskStatus
                        task-status-id="taskStatusId"
                        task-status-name="taskStatusName"
                        v-model="taskStatus"
                        @onChange="taskStatusCheck">
                        ステータス{{ taskStatus }}
                        <template #task-status-error v-if="taskStatusError">
                            <p class="text-danger">タスクのステータスが選択されていません。</p>
                        </template>
                    </FormTaskStatus>
                    <FormTaskTextArea
                        task-textarea-id="taskTextAreaId"
                        v-model="taskMemo">
                        メモ{{ taskMemo }}
                    </FormTaskTextArea>
                </div>
            </div>
            <footer class="l-modal-footer">
            <slot name="footer">
                <!-- <BtnSubmit :onClick="taskRefresh" submit-id="taskRegistration" button-type="submit" class="w-50 mx-auto">タスク登録</BtnSubmit> -->
                <button @click.prevent="taskRefresh" submit-id="taskRegistration" button-type="submit" class="w-50 mx-auto">タスク登録</button>
            </slot>
            </footer>
        </form>
      </div>
    </div>
  </transition>
</template>

<script>
import Heading2 from '../heading/Heading2.vue';
import BtnSubmit from '../btn/BtnSubmit.vue';
import FormTaskNameBox from '../form/task/FormTaskNameBox.vue';
import FormTaskHourBox from '../form/task/FormTaskHourBox.vue';
import FormTaskStartDate from '../form/task/FormTaskStartDate.vue';
import FormTaskEndDate from '../form/task/FormTaskEndDate.vue';
import FormTaskStatus from '../form/task/FormTaskStatus.vue';
import FormTaskTextArea from '../form/task/FormTaskTextArea.vue';

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
            aaa: [
                {
                    taskName: '',
                    taskHour: '',
                    taskStartDate: '',
                    taskEndDate: '',
                    taskStatus: 'none',
                    taskMemo: '',
                }
            ]
        }
    },
    props : {
        userId: String,
    },
    mounted() {
        //期日カレンダーの初期値をを今日、明日にする
        // console.log(this.$el)
        var getTimes = new Date();
        var year = getTimes.getFullYear();
        var month = getTimes.getMonth() + 1;
        var day = getTimes.getDate();
        const today = year + '-' + month + '-' + day;
        const tommorow = year + '-' + month + '-' + (day + 1);
        this.taskStartDate = today
        this.taskEndDate = tommorow
        // console.log(this.$route.params.userId)
    },
    methods: {
        // taskRegistrationCheck() {

        // },
        taskNameCheck() {
            axios.get('/api/duplicateCheckTask', {
                params: {
                    userId: this.$route.params.userId,
                    taskname: this.taskName,
                    kosu: this.taskHour,
                    jitsukosu: this.taskHour,
                    startdate: this.taskStartDate,
                    enddate: this.taskEndDate,
                }
            })
            .then(response => {
                if(this.taskName.trim() === '') {
                    this.taskNameError = true;
                } else {
                    this.taskNameError = false;
                    if(response.data === 'duplicate') {
                        this.taskNameDuplicateError = true;
                    } else {
                        this.taskNameDuplicateError = false;
                    }
                }
            })
            .catch(error => {
                console.log(error)
                alert('エラーです')
            });

        },
        taskHourCheck() {
            if(this.taskHour === ''){
                this.taskHourError = true
            } else {
                this.taskHourError = false
            }
        },
        taskStatusCheck() {
            if(this.taskStatus === 'none'){
                this.taskStatusError = true
            } else {
                this.taskStatusError = false
            }
        },
        taskRefresh() {
            console.log('aaaaaaaaaaa')
            this.$emit('taskRefresh', this.aaa)
            // this.$emit('taskRefresh', this.dbRefreshData)
        }
    },
    components: {
        Heading2,
        BtnSubmit,
        FormTaskNameBox,
        FormTaskHourBox,
        FormTaskStatus,
        FormTaskStartDate,
        FormTaskEndDate,
        FormTaskTextArea,
    }
}
</script>
