<template>
    <div>
        <div class="container">
            <PageHeading>タスク一覧表示画面​</PageHeading>
            <navigation></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable></DataTable>
        <div class="l-w50-center mt-5">
            <BtnSubmit
                SubmitId="SubmitHours"
                ButtonType="submit"
            >実工数保存
            </BtnSubmit>
        </div>
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
    components: {
        PageHeading,
        navigation,
        HeadingDate,
        BtnSubmit,
        DataTable,
    }
}
</script>
