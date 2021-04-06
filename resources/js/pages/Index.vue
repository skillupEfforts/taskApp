<template>
    <div class="l-form">
        <Heading2>ログイン</Heading2>
        <form @submit.prevent="submit">
            <div class="form-row">
                <FormLoginIdBox
                    v-model="userId"
                    login-id="loginId"
                    login-input-type="text"
                    login-placeholder="ログインID"
                    login-id-name="loginId"
                    login-id-required><strong>ログインID</strong>
                </FormLoginIdBox>
                <FormLoginPassBox
                    v-model="userPass"
                    login-pass-id="loginPassId"
                    login-pass-input-type="password"
                    login-pass-placeholder="ログインパスワード"
                    login-pass-name="loginPass"
                    login-pass-required><strong>ログインパス</strong>
                </FormLoginPassBox>
            </div>
            <FormLoginSubmitBtn
                wrap-class="mt-3"
                login-submit-btn-id="loginSubmit"
                login-submit-btn-type="submit">ログイン
            </FormLoginSubmitBtn>
            <LinkRouterBtn
                wrap-class="mt-5"
                btn-class="btn-secondary w-50"
                to="/registration">アカウント新規作成
            </LinkRouterBtn>
        </form>
    </div>
</template>

<script>
import FormLoginIdBox from '../components/form/login/FormLoginIdBox.vue';
import FormLoginPassBox from '../components/form/login/FormLoginPassBox.vue';
import FormLoginSubmitBtn from '../components/form/login/FormLoginSubmitBtn.vue';
import Heading2 from '../components/heading/Heading2.vue';
import LinkRouterBtn from '../components/link/LinkRouterBtn.vue';
import axios from 'axios'

export default {
    name: 'PageLogin',
    components: {
        FormLoginSubmitBtn,
        FormLoginIdBox,
        FormLoginPassBox,
        Heading2,
        LinkRouterBtn
    },
    data() {
        return {
            userId: '',
            userPass: '',
            // loginId: '',
            // password: ''
        }
    },
    methods: {
        submit() {
            axios.get('/api/home', {
                // axios.get('/api/login', {
                params: {
                    userId: this.userId,
                    userPassword: this.userPass,
                    // loginId: this.loginId,
                    // password: this.password,
                }
            })
                .then(response => {
                    console.log('response:', response)
                    if(response.data === 0) {
                        this.$router.push('/error');
                    } else {
                        this.$router.push({
                            name: 'PageIndex',
                            params :{ userId: response.data.userId }
                        // params :{ loginId: response.data.loginId }
                        });
                    }
                })
                .catch(error => {
                // console.log(error)
                    alert('通信に失敗しました。ブラウザを更新してください。');
                    this.$router.push('/error');
                });
        }
    }
}
</script>
