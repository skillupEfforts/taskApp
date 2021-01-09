<template>
    <div>
        <div class="container">
            <PageHeading>タスク一覧表示画面​</PageHeading>
            <navigation @open="ToggleModal"></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable
            :sendDbTaskData="dbTaskData"
        >
        </DataTable>
        <!-- <p>{{ dbTaskData }}</p> -->
        <div class="l-w50-center mt-5">
            <BtnSubmit submit-id="SubmitHours" button-type="submit">実工数保存</BtnSubmit>
        </div>
        <!-- modal -->
        <ModalRegistration @close="ToggleModal" v-show="showModal"></ModalRegistration>
        <!-- /.modal -->
    </div>
    <!--{{ $route.params.userId }}-->
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
            actualHour: '',
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
            }
        })
        .then(response => {
            // console.log(this.$route.params.userId)
            this.dbTaskData = response.data
            console.log(this.dbTaskData)

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
        click () {

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
