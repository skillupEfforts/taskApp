<template>
    <div>
        <div class="container">
            <PageHeading>タスク一覧表示画面​</PageHeading>
            <navigation
                @open="openModal"
            ></navigation>
        </div>
        <HeadingDate></HeadingDate>
        <DataTable></DataTable>
        <div class="l-w50-center mt-5">
            <BtnSubmit
                SubmitId="SubmitHours"
                ButtonType="submit"
            >実工数保存</BtnSubmit>
        </div>
        <!-- modal -->
        <modalRegistration @close="closeModal" v-if="showModal">
            <!-- footer スロットコンテンツ -->
            <template slot="footer">
                <BtnSubmit @click.native="add">
                ああああ
                </BtnSubmit>
                <!--<button @click="add">追加</button>-->
                <!--<button @click="closeModal" v-if="showModal">閉じる</button>-->
                <!-- <button @click="doSend">閉じる</button> -->
            </template>
            <!-- /footer -->
        </modalRegistration>
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
    // computed: {
    //     aaa: {
    //         get () {
    //             return console.log(this.parentTaskName);
    //         }
    //     }
    // },
    methods:{
        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
        doSend() {
            if (this.message.length > 0) {
                alert(this.message);
                this.message = '';
                this.closeModal();
            } else {
                alert('メッセージを入力してください');
            }
        },
        add() {
                alert('タスクを登録しました。');
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
