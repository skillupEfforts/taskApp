<template>
    <div class="l-form">
        <PageHeading2
        >アカウント新規登録
        <template #heading-sub v-if="danger">
            <br><span class="text-danger">登録するIDもしくはパスワードを入力してください。</span>
        </template>
        </PageHeading2>
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
                ><strong>登録するIDを入力してください。</strong>
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
                ><strong>登録するパスワードを入力してください。</strong>
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
        <ModalCreateAccount v-show="showModal">
            <template #footer>
                <router-link :to="{name: 'PageIndex', params: {'userId': registrationId}}" class="btn btn-success w-50">タスク一覧ページへ</router-link>
            </template>
        </ModalCreateAccount>
        <!-- /.modal -->
    </div>
</template>

<script>
import FormRegistrationIdBox from '../form/FormRegistrationIdBox.vue';
import FormRegistrationPassBox from '../form/FormRegistrationPassBox.vue';
import FormRegistrationSubmitBtn from '../form/FormRegistrationSubmitBtn.vue';
import PageHeading2 from '../heading/PageHeading2.vue';
import ModalCreateAccount from '../modal/ModalCreateAccount.vue';

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
            duplicateId: '',
        }
    },
    methods: {
        ModalToggle () {
           this.showModal = !this.showModal
        },
        registrationIdCheck () {//IDのテキストボックスblurイベント
            if(this.registrationId.trim() === ''){
                this.IdNotEntered = true
                if(this.IdAlreadyUsed){
                    this.IdAlreadyUsed = false
                }
            } else {
                this.IdNotEntered = false
                //blur時にBD登録まで行ってしまう。。
                axios.get('/api/duplicateCheck', {
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
            axios.get('/api/registrationAccount', {
                params: {
                    userId: this.registrationId,
                    userPassword: this.registrationPass
                }
            })
            .then(response => {
                console.log(response)
                console.log(response.data.userId)
                if(response.data === 'duplicate') {
                    this.$router.push('/error');
                } else {
                    this.ModalToggle();
                }
            })
            .catch(error => {
                // console.log(error)
                this.$router.push('/error');
            });
        },
        // registrationApproval() {//アカウント新規追加クリック後のモーダル内ボタンイベント
        //     console.log(params)
        //     this.$router.push({
        //         name: 'PageIndex',
        //         params :{ userId: response.data.userId }
        //     });
        // }
    },
    components: {
        FormRegistrationSubmitBtn,
        FormRegistrationIdBox,
        FormRegistrationPassBox,
        PageHeading2,
        ModalCreateAccount
    }
}
</script>
