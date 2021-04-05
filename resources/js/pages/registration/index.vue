<template>
    <div class="l-form">
        <Heading2>アカウント新規登録</Heading2>
        <form @submit.prevent="accountRegistration">
            <div class="form-row">
                <FormRegistrationIdBox
                    v-model="registrationId"
                    registration-id="registrationId"
                    registration-input-type="text"
                    registration-placeholder="登録するIDを入力してください"
                    registration-id-name="registrationId"
                    registration-id-required
                    @onBlur="registrationIdCheck"><strong>登録するIDを入力してください。</strong>
                <template #error>
                    <p v-if="IdNotEntered" class="text-danger">登録するログインIDを入力してください。</p>
                    <p v-if="IdAlreadyUsed" class="text-danger">登録するログインIDはすでに使われております。他のログインIDを試してください。</p>
                </template>
                </FormRegistrationIdBox>
                <FormRegistrationPassBox
                    registration-pass-id="registrationPassId"
                    registration-pass-input-type="password"
                    registration-pass-placeholder="登録するパスワードを入力してください"
                    registration-pass-name="registrationPass"
                    registration-pass-required><strong>登録するパスワードを入力してください。</strong>
                </FormRegistrationPassBox>
            </div>
            <FormRegistrationSubmitBtn
                registration-submit-id="registrationSubmitId"
                registration-button-type="submit"
                btn-class="btn-primary w-100">アカウント新規登録
            </FormRegistrationSubmitBtn>
        </form>
        <!-- modal -->
        <ModalCreateAccount v-show="showModal">
            <template #footer>
                <LinkRouterBtn
                    :to="{name: 'PageIndex', params: {'userId': registrationId}}"
                    btn-class="btn-success w-50">タスク一覧ページへ
                </LinkRouterBtn>
            </template>
        </ModalCreateAccount>
        <!-- /.modal -->
    </div>
</template>

<script>
import FormRegistrationIdBox from '../../components/form/registration/FormRegistrationIdBox.vue';
import FormRegistrationPassBox from '../../components/form/registration/FormRegistrationPassBox.vue';
import FormRegistrationSubmitBtn from '../../components/form/registration/FormRegistrationSubmitBtn.vue';
import Heading2 from '../../components/heading/Heading2.vue';
import ModalCreateAccount from '../../components/modal/ModalCreateAccount.vue';
import LinkRouterBtn from '../../components/link/LinkRouterBtn.vue';
// import axios from 'axios'

export default {
    name: 'PageRegistration',
    components: {
        FormRegistrationSubmitBtn,
        FormRegistrationIdBox,
        FormRegistrationPassBox,
        Heading2,
        ModalCreateAccount,
        LinkRouterBtn
    },
    data() {
        return {
            registrationId: '',
            registrationPass: '',
            danger: false,
            IdNotEntered: false,
            IdAlreadyUsed: false,
            showModal: false,
            duplicateId: '',
        }
    },
    methods: {
        ModalToggle () {
            this.showModal = !this.showModal
        },

        //IDのテキストボックスblurイベント
        registrationIdCheck () {
            if(this.registrationId.trim() === ''){
                this.IdNotEntered = true
                if(this.IdAlreadyUsed){
                    this.IdAlreadyUsed = false
                }
            } else {
                this.IdNotEntered = false
                axios.get('/api/duplicateCheck', {
                    params: {
                        userId: this.registrationId,
                        // loginId: this.registrationId,
                    }
                })
                    .then(response => {
                        if(response.data === 'duplicate') {
                            this.IdAlreadyUsed = true
                        } else {
                            this.IdAlreadyUsed = false
                        }
                    })
                    .catch(error => {
                        alert('通信に失敗しました。ブラウザを更新してください。');
                    });
            }
        },

        //アカウント新規追加イベント
        accountRegistration() {
            axios.get('/api/registrationAccount', {
                params: {
                    userId: this.registrationId,
                    userPassword: this.registrationPass
                    // loginId: this.registrationId,
                    // password: this.registrationPass
                }
            })
                .then(response => {
                    if(response.data === 'duplicate') {
                        this.$router.push('/error');
                    } else {
                        this.ModalToggle();
                    }
                })
                .catch(error => {
                    this.$router.push('/error');
                });
        },
    }
}
</script>
