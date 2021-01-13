<template>
    <div>
        <div class="container">
            <PageHeading>タスク一覧表示画面​</PageHeading>
            <navigation @open="ToggleModal"></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable :sendDbTaskData="dbTaskData"></DataTable>
        <!-- <p>{{ dbTaskData }}</p> -->

        <!-- modal -->
        <ModalRegistration @close="ToggleModal" v-show="showModal"></ModalRegistration>
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
            dbTaskData: Array
        }
    },
    props : {
        userId: String,
    },
    mounted() {
        axios.get('/api/getTask', {
            params: {
                userId: this.$route.params.userId,
                // userId: 'test',
            }
        })
        .then(response => {
            this.dbTaskData = response.data
            // console.log(this.dbTaskData)

        })
        .catch(error => {
            // console.log(error)
            alert('エラーです')
        });
    },
    methods:{
        ToggleModal () {
            this.showModal = !this.showModal;
        },
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
