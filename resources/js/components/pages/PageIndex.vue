<template>
    <div>
        <div class="container">
            <PageHeading>{{ headingTtl }}</PageHeading>
            <navigation></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable></DataTable>
        <BtnSubmit>{{ submitTxt }}</BtnSubmit>
    </div>
</template>

<script>
import PageHeading from '../heading/PageHeading.vue';
import navigation from '../nav/navigation.vue';
import HeadingDate from '../heading/HeadingDate.vue';
import BtnSubmit from '../btn/BtnSubmit.vue';
import DataTable from '../datatable/DataTable.vue';

export default {
    name: 'PageIndex',
    data () {
        return {
            headingTtl: 'タスク一覧表示画面​',
            submitTxt: '実工数保存',
        }
    },
    components: {
        PageHeading,
        navigation,
        HeadingDate,
        BtnSubmit,
        DataTable,
    }
}
</script>
