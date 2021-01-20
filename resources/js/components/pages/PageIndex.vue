<template>
    <div>
        <div class="container">
            <PageHeading>タスク一覧表示画面​</PageHeading>
            <navigation @open="ToggleModal"></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable :send-db-task-data="dbTaskData"></DataTable>

        <!-- modal -->
        <ModalRegistration @taskRefresh="test" @close="ToggleModal" v-if="showModal"></ModalRegistration>
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
            dbTaskData: Array,
            dbRefreshData: Array,
        }
    },
    props : {
        userId: String,
    },
    mounted() {
        axios.get('/api/getTask', {
            params: {
                userId: this.$route.params.userId,
            }
        })
        .then(response => {
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
        test (taskValueObject) {
            console.log('ああああああああああああ')
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
                // } else if(response.data === 'registration'){
                    alert('タスク登録しました。')
                    console.log(this.dbTaskData)
                    this.dbTaskData = [];
                    console.log(this.dbTaskData)
                    this.dbTaskData.push(...response.data)
                    console.log(this.dbTaskData)
                    this.ToggleModal();
                    // this.$router.push({
                    //     name: 'PageIndex',
                    //     params :{ taskname: response.data.taskname }
                    // });
                }
            })
            .catch(error => {
                console.log(error)
                alert('エラーです')
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
