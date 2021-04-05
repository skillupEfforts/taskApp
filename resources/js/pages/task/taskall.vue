<template>
    <div>
        <div class="container">
            <Heading2>登録タスク一覧</Heading2>
            <Navigation :to-index="toPageIndex" :to-taskall="toPageTaskAll" />
        </div>
        <div class="row">
            <div class="col-2">
                <HeadingDate />
            </div>
            <div class="col-2">
                <BtnAddTask add-task-id="addtask" add-task-button-type="button" @onCLick="ToggleModal">親タスク追加</BtnAddTask>
            </div>
        </div>

    </div>
</template>

<script>
import Heading2 from '../../components/heading/Heading2.vue';
import HeadingDate from '../../components/heading/HeadingDate.vue';
import Navigation from '../../components/nav/Navigation.vue';
import BtnAddTask from '../../components/btn/BtnAddTask.vue';

export default {
    name: 'Taskall',
    components: {
        Heading2,
        HeadingDate,
        Navigation,
        BtnAddTask
    },
    props : {
        userId: {
            type: String,
            default: ''
        },
    },
    data(){
        return{
            loginId: String,
        }
    },
    computed:{
        // Navigationコンポーネントで当日ページ遷移する際のパラメーター渡し関数
        toPageIndex(){
            const toPageIndex = {
                name: 'PageIndex',
                params: {
                    userId: this.loginId
                }
            }
            return toPageIndex
        },

        // Navigationコンポーネントでタスク一覧ページ遷移する際のパラメーター渡し関数
        toPageTaskAll(){
            const toPageTaskAll = {
                name: 'PageTaskAll',
                params: {
                    userId: this.loginId
                }
            }
            return toPageTaskAll
        }
    },
    mounted(){
        this.loginId = this.$route.params.userId
        console.log('PageTaskAllのログインID:', this.loginId);
    },
}
</script>
