<template>
    <div class="l-form">
        <PageHeading
        >アカウント新規追加
        <template #heading-sub v-if="danger">
            <br><span class="text-danger">登録するIDもしくはパスワードを入力してください。</span>
        </template>
        </PageHeading>
        <form @submit.prevent="accountRegistration">
            <div class="form-row">
                <FormRegistrationIdBox
                    class="col"
                    registration-id="registrationId"
                    registration-input-type="text"
                    registration-placeholder="登録するIDを入力してください"
                    registration-id-name="registrationId"
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
                    registration-pass-id="registrationPassId"
                    registration-pass-input-type="password"
                    registration-pass-placeHolder="登録するパスワードを入力してください"
                    registration-pass-name="registrationPass"
                >登録するパスワードを入力してください。
                </FormRegistrationPassBox>
            </div>
            <FormRegistrationSubmitBtn
                class="mt-3"
                registration-submit-id="registrationSubmitId"
                registration-button-type="submit"
            >アカウント新規登録
            </FormRegistrationSubmitBtn>
        </form>
        <!-- modal -->
        <modalCreateAccount v-show="showModal">
            <template #footer>
                <router-link to="/home" class="btn btn-primary w-50" @click="registrationApproval">タスク一覧ページへ</router-link>
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
            showModal: false,
            duplicateId: ''
        }
    },
    methods: {
        ModalToggle () {
           this.showModal = !this.showModal
        },
        registrationIdCheck () {//IDのテキストボックスblurイベント
            if(this.registrationId.trim() === ''){
                this.IdNotEntered = true
            } else {
                this.IdNotEntered = false
                //blur時にBD登録まで行ってしまう。。
                axios.get('/api/makeAccount', {
                    params: {
                        userId: this.registrationId,
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
        accountRegistration() {//アカウント新規追加イベント
            axios.get('/api/makeAccount', {
                params: {
                    userId: this.registrationId,
                    userPassword: this.registrationPass
                }
            })
            .then(response => {
                console.log(response)
                if(response.data === 'duplicate') {
                    this.$router.push('/error');
                } else {
                    this.ModalToggle();
                }
            })
            .catch(error => {
                console.log(error)
                this.$router.push('/error');
            });
        },
        registrationApproval() {//アカウント新規追加クリック後のモーダル内ボタンイベント
            console.log(params)
            this.$router.push({
                name: 'PageIndex',
                params :{ userId: response.data.userId }
            });
        }
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
