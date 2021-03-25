<template>
    <div>
        <div class="container">
            <PageHeading>タスク一覧表示画面​</PageHeading>
            <navigation @open="ToggleModal"></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable :receiveDbTaskData="dbTaskData" @update="afterUpdateGetTask"></DataTable>

        <!-- modal -->
        <ModalRegistration @taskRefresh="refreshData" @close="ToggleModal" v-if="showModal"></ModalRegistration>
        <!-- /.modal -->
    </div>
</template>

<script>
import PageHeading from '../heading/PageHeading.vue';
import Heading2 from '../heading/Heading2.vue';
import navigation from '../nav/navigation.vue';
import HeadingDate from '../heading/HeadingDate.vue';
import BtnSubmit from '../btn/BtnSubmit.vue';
import DataTable from '../datatable/DataTable.vue';
import ModalRegistration from '../modal/ModalRegistration';

export default {
    name: 'PageIndex',
    data() {
        return {
            showModal: false,
            parentTaskName: '',
            dbTaskData: Object,
            dbRefreshData: Array,
        }
    },
    props : {
        userId: String,
    },
    async created() {
        axios.get('/api/getTask', {
            params: {
                userId: this.$route.params.userId,
            }
        })
        .then(response => {
            console.log(response.data)
            this.dbTaskData = response.data
        })
        .catch(error => {
            alert('エラーです')
        });
    },
    methods:{
        ToggleModal () {
            this.showModal = !this.showModal
        },
        refreshDbData (dbData) {
            // console.log(this.dbTaskData)
            this.dbTaskData = [];
            // console.log(this.dbTaskData)
            this.dbTaskData.push(...dbData)
            // console.log(this.dbTaskData)
        },
        refreshData (taskValueObject) {
            console.log('PageIndex.vueのrefreshDataのイベント確認。\n下はmodalRegistration.vueからemitで渡している引数taskValueObjectの値')
            console.log(taskValueObject);
            axios.get('/api/registrationTask', {
                params: {
                    userId: this.$route.params.userId,
                    taskname: taskValueObject.taskName,
                    kosu: taskValueObject.taskHour,
                    jitsukosu: taskValueObject.taskHour,
                    startdate: taskValueObject.taskStartDate,
                    enddate: taskValueObject.taskEndDate,
                    state: taskValueObject.taskStatus
                }
            })
            .then(response => {
                console.log(response)
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
                alert('エラーです')
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
                alert('エラーです')
                console.log(error)
            });
        }
    },
    components: {
        PageHeading,
        Heading2,
        navigation,
        HeadingDate,
        BtnSubmit,
        DataTable,
        ModalRegistration,
    }
}
</script>
