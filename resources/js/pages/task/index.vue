<template>
    <div>
        <div class="container">
            <Heading2>本日のタスク一覧</Heading2>
            <Navigation :to-index="toPageIndex" :to-taskall="toPageTaskAll" />
        </div>
        <BtnAddTask add-task-id="addtask" add-task-button-type="button" @onClick="ToggleModal">親タスク追加</BtnAddTask>

        <HeadingDate />
        <DataTable :receive-db-data="dbTaskData" @update="afterUpdateGetTask" />

        <!-- modal -->
        <ModalRegistration v-if="showModal" @taskRefresh="refreshData" @close="ToggleModal" />
        <!-- /.modal -->
    </div>
</template>

<script>
import Heading2 from '../../components/heading/Heading2.vue';
import Navigation from '../../components/nav/Navigation.vue';
import HeadingDate from '../../components/heading/HeadingDate.vue';
import DataTable from '../../components/datatable/DataTable.vue';
import ModalRegistration from '../../components/modal/ModalRegistration.vue';
import BtnAddTask from '../../components/btn/BtnAddTask.vue'

export default {
    name: 'PageIndex',
    components: {
        Heading2,
        Navigation,
        HeadingDate,
        DataTable,
        ModalRegistration,
        BtnAddTask
    },
    props : {
        userId: {
            type: String,
            default: ''
        },
    },
    data() {
        return {
            showModal: false,
            parentTaskName: '',
            dbTaskData: Object,
            dbRefreshData: Array,
            loginId: String,
        }
    },
    computed:{
        // Navigationコンポーネントで当日ページ遷移する際のパラメーター渡し関数
        toPageIndex(){
            const toPageIndex = {
                name: 'PageIndex',
                params: {
                    'userId': this.loginId
                }
            }
            return toPageIndex
        },

        // Navigationコンポーネントでタスク一覧ページ遷移する際のパラメーター渡し関数
        toPageTaskAll(){
            const toPageTaskAll = {
                name: 'PageTaskAll',
                params: {
                    'userId': this.loginId
                },
            }
            return toPageTaskAll
        }
    },
    async created() {
        axios.get('/api/getTask', {
            params: {
                userId: this.$route.params.userId,
                // loginId: this.$route.params.loginId,
            }
        })
            .then(response => {
                this.loginId = this.$route.params.userId
                this.dbTaskData = response.data
            })
            .catch(error => {
                alert('通信に失敗しました。ブラウザを更新してください。');
            });
    },
    methods:{
        ToggleModal () {
            this.showModal = !this.showModal
        },
        refreshDbData (dbData) {
            this.dbTaskData = [];
            this.dbTaskData.push(...dbData)
        },
        refreshData (taskValueObject) {
            axios.get('/api/registrationTask', {
                params: {
                    userId: this.$route.params.userId,
                    taskname: taskValueObject.taskName,
                    kosu: taskValueObject.taskHour,
                    jitsukosu: taskValueObject.taskHour,
                    startdate: taskValueObject.taskStartDate,
                    enddate: taskValueObject.taskEndDate,
                    state: taskValueObject.taskStatus,
                    // loginId: this.$route.params.loginId,
                    // taskname: taskValueObject.taskName,
                    // kosu: taskValueObject.taskHour,
                    // jitsukosu: taskValueObject.taskHour,
                    // startdate: taskValueObject.taskStartDate,
                    // enddate: taskValueObject.taskEndDate,
                    // state: taskValueObject.taskStatus
                }
            })
                .then(response => {
                    if(response.data === 'duplicate') {
                        alert('タスク名が重複しています。')
                    } else {
                        alert('タスク登録しました。')
                        this.refreshDbData(response.data);
                        this.ToggleModal();
                    }
                })
                .catch(error => {
                    console.log(error)
                    alert('通信に失敗しました。ブラウザを更新してください。');
                });
        },
        afterUpdateGetTask(updateData) {
            axios.post('/api/updateTask', updateData.sendUpdateData)
                .then(response => {
                    if(response.data === 'update') {
                        alert('タスク更新完了')
                        this.refreshDbData(updateData.refreshDbData);
                    }
                })
                .catch(error => {
                    alert('通信に失敗しました。ブラウザを更新してください。');
                    console.log(error)
                });
        }
    }
}
</script>
