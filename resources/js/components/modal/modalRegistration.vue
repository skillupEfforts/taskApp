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
                    taskName="taskNameId"
                    @onBlur="taskNameCheck"
                    v-model="taskName">
                    親タスク入力{{ taskName }}
                    <template #task-name-error v-if="taskNameError">
                        <p class="text-danger">親タスク名が入力されていません。</p>
                    </template>
                </FormTaskNameBox>
                <FormTaskHourBox
                    taskHourId="taskHourId"
                    taskHourInputType="text"
                    taskHourPlaceHolder="予定工数を入力してください"
                    taskHourName="taskHourId"
                    @onBlur="taskHourCheck"
                    v-model="taskHour">
                    工数入力{{ taskHour }}
                    <template #task-hour-error v-if="taskHourError">
                        <p class="text-danger">工数が入力されていません。</p>
                    </template>
                </FormTaskHourBox>
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
                    taskEndDateIdName="taskEndDateStartId">
                    <template #start>期間（開始日）</template>
                    <template #end>期間（終了日）</template>
                    <template #task-startdate-error>
                        <p class="text-danger">タスクの開始時期が入力されていません。</p>
                    </template>
                    <template #task-enddate-error>
                        <p class="text-danger">タスクの終了時期が入力されていません。</p>
                    </template>
                </FormTaskDateBox>
                <FormTaskStatus
                    v-model="taskSelected"
                    taskStatusId="taskStatusId"
                    taskStatusName="taskStatusName">
                    ステータス{{ taskSelected }}
                    <template #task-status-error>
                        <p class="text-danger">タスクのステータスが入力されていません。</p>
                    </template>
                </FormTaskStatus>
                <FormTaskTextArea
                    taskTextAreaId="taskTextAreaId"
                    v-model="taskMemo">
                    メモ{{ taskMemo }}
                </FormTaskTextArea>
            </div>
        </div>
        <footer class="l-modal-footer">
          <slot name="footer">
            <BtnSubmit @click.native="taskRegistrationCheck">追加</BtnSubmit>
            <!--<button @click="$emit('add')"><slot></slot></button>-->
            <!--<button @click="$emit('close')"><slot></slot></button>-->
          </slot>
        </footer>
      </div>
    </div>
  </transition>
</template>

<script>
import Heading2 from '../heading/Heading2.vue';
import BtnSubmit from '../btn/BtnSubmit.vue';
import FormTaskNameBox from '../form/task/FormTaskNameBox.vue';
import FormTaskHourBox from '../form/task/FormTaskHourBox.vue';
import FormTaskDateBox from '../form/task/FormTaskDateBox.vue';
import FormTaskStatus from '../form/task/FormTaskStatus.vue';
import FormTaskTextArea from '../form/task/FormTaskTextArea.vue';

export default {
    name: 'modalRegistration',
    data() {
        return {
            taskName: '',
            taskNameError: false,
            taskHour: '',
            taskHourError: false,
            taskDate: '',
            taskSelected: '',
            taskMemo: '',
        }
    },
    computed: {
    },
    methods: {
        taskRegistrationCheck() {
            let thisElem = this.test;
            let validateArray = Object.entries(thisElem);
            let validateLength = validateArray.length
            console.log(validateLength)

        },
        taskNameCheck() {
            if(this.taskName === ''){
                this.taskNameError = true
            } else {
                this.taskNameError = false
            }
        },
        taskHourCheck() {
            if(this.taskHour === ''){
                this.taskHourError = true
            } else {
                this.taskHourError = false
            }
        }
        //     // console.log(this.taskNameError)
        //     let notENteredFlag = 0;
        //     let notENteredName = '';
        //     let thisElem = this.test;
        //     let validateArray = Object.entries(thisElem);
        //     for(let validateNum = 0; validateNum < validateArray.length; validateNum++){
        //         if(validateArray[validateNum][1] !== ''){
        //             notENteredFlag++;
        //         } else {
        //             notENteredName = validateArray[validateNum][0];
        //             // data.notENteredName + 'Error' = true;
        //             notENteredFlag--;
        //             aaa = notENteredName + 'Error'
        //             // console.log(notENteredName+ 'Error');
        //         }
        //         if(notENteredFlag === validateArray.length){
        //             alert('入力されている')
        //         }
        //     }
        // },
        // tttt(){
        //     this.taskRegistrationCheck();
        //     // this.aaa = !this.aaa
        //     console.log(this.aaa);

        // }
    },
    components: {
        Heading2,
        BtnSubmit,
        FormTaskNameBox,
        FormTaskHourBox,
        FormTaskDateBox,
        FormTaskStatus,
        FormTaskTextArea,
    }
}
</script>
