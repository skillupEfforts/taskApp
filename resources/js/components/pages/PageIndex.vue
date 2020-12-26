<template>
    <div>
        <div class="container">
            <PageHeading>タスク一覧表示画面​</PageHeading>
            <navigation @open="ToggleModal"></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable></DataTable>
        <div class="l-w50-center mt-5">
            <BtnSubmit submit-id="SubmitHours" button-type="submit">実工数保存</BtnSubmit>
        </div>
        <!-- modal -->
        <modalRegistration @close="ToggleModal" v-show="showModal"></modalRegistration>
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
import modalRegistration from '../modal/modalRegistration.vue';

export default {
    name: 'PageIndex',
    data() {
        return {
            showModal: false,
            parentTaskName: '',
        }
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
        modalRegistration,
    }
}
</script>
