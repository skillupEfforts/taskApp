<template>
    <div class="l-form">
        <PageHeading
        >アカウント新規追加
        <template #heading-sub v-if="danger">
            <br><span class="text-danger">登録するIDもしくはパスワードを入力してください。</span>
        </template>
        </PageHeading>
        <form @submit.prevent="registration">
            <div class="form-row">
                <FormRegistrationIdBox
                    class="col"
                    registrationId="registrationId"
                    registrationInputType="text"
                    registrationPlaceHolder="登録するIDを入力してください"
                    registrationIdName="registrationId"
                    @onBlur="registrationIdCheck"
                    v-model="registrationId"
                >登録するIDを入力してください。
                <template #error>
                    <p class="text-danger" v-if="IdNotEntered">登録するログインIDを入力してください。</p>
                    <p class="text-danger" v-if="IdAlreadyUsed">登録するログインIDはすでに使われております。他のログインIDを試してください。</p>
                </template>
                </FormRegistrationIdBox>
                <FormRegistrationPassBox
                    class="col"
                    registrationPassId="registrationPassId"
                    registrationPassInputType="password"
                    registrationPassPlaceHolder="登録するパスワードを入力してください"
                    registrationPassName="registrationPass"
                    v-model="registrationPass"
                >登録するパスワードを入力してください。
                </FormRegistrationPassBox>
            </div>
            <FormRegistrationSubmitBtn
                class="mt-3"
                registrationSubmitId="registrationSubmitId"
                registrationButtonType="submit"
            >アカウント新規登録
            </FormRegistrationSubmitBtn>
        </form>
        <!-- modal -->
        <modalCreateAccount
            v-show="showModal">
            <template #footer>
                <router-link to="/home" class="btn btn-primary w-50">タスク一覧ページへ</router-link>
            </template>
        </modalCreateAccount>
        <!-- /.modal -->
    </div>
</template>

<script>
import FormRegistrationIdBox from '../form/FormRegistrationIdBox.vue';
import FormRegistrationPassBox from '../form/FormRegistrationPassBox.vue';
import FormRegistrationSubmitBtn from '../form/FormRegistrationSubmitBtn.vue';
import PageHeading from '../heading/PageHeading.vue';
import modalCreateAccount from '../modal/modalCreateAccount.vue';

export default {
    name: 'PageRegistration',
    data() {
        return {
            registrationId: '',
            registrationPass: '',
            danger: false,
            IdNotEntered: false,
            IdAlreadyUsed: false,
            showModal: false
        }
    },
    computed: {
    },
    methods: {
        ModalToggle () {
           this.showModal = !this.showModal
        },
        registration () {
            if(this.registrationId.trim() !== '' && this.registrationPass.trim() !== ''){
                // this.$router.push('/home');
                this.ModalToggle()
            } else {
                this.danger = true;
            }
        },
        registrationIdCheck () {
            if(this.registrationId.trim() === ''){
                this.IdNotEntered = true
                this.IdAlreadyUsed = false
            } else if (this.registrationId.trim() === 'aaaaa') {
                this.IdAlreadyUsed = true
                this.IdNotEntered = false
            } else {
                this.IdNotEntered = false
                this.IdAlreadyUsed = false
            }
        },
    },
    components: {
        FormRegistrationSubmitBtn,
        FormRegistrationIdBox,
        FormRegistrationPassBox,
        PageHeading,
        modalCreateAccount
    }
}
</script>
