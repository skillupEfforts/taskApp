<template>
    <div class="l-form">
        <form @submit.prevent="submit">
            <div class="form-row">
                <FormLoginIdBox class="col"
                    loginId="loginId"
                    loginInputType="text"
                    loginPlaceHolder="ログインID"
                    loginIdName="loginId"
                    v-model="userId"
                >ログインID
                </FormLoginIdBox>
                <FormLoginPassBox class="col"
                    loginPassId="loginPassId"
                    loginPassInputType="password"
                    loginPassPlaceHolder="ログインパスワード"
                    loginPassName="loginPass"
                    v-model="userPass"
                >ログインパス
                </FormLoginPassBox>
            </div>
            <FormSubmitBtn class="mt-3"
                loginSubmitId="loginSubmit"
                loginButtonType="submit"
            >作成
            </FormSubmitBtn>
            <div style="margin-top:30px;">
                <router-link class="btn btn-primary w-100"
                    to="/"
                >ログイン画面へ戻る
                </router-link>
            </div>
        </form>
    </div>
</template>

<script>
import FormLoginIdBox from '../form/FormLoginIdBox.vue';
import FormLoginPassBox from '../form/FormLoginPassBox.vue';
import FormSubmitBtn from '../form/FormSubmitBtn.vue';

export default {
    name: 'PageLAccount',
    data() {
        return {
            userId: '',
            userPass: ''
        }
    },
    methods: {
        submit() {
            axios.get('/api/makeAccount', {
                params: {
                    userId: this.userId,
                    userPassword: this.userPass
                }
            })
            .then(response => {
                console.log(response)
                // if(response.data === 0) {
                //     this.$router.push('/error');
                // } else {
                //     this.$router.push({
                //         name: 'PageIndex',
                //         params :{ userId: response.data.userId }
                //     });
                // }
            })
            .catch(error => {console.log(error)
                this.$router.push('/error');
            });
        }
    },
    components: {
        FormSubmitBtn,
        FormLoginIdBox,
        FormLoginPassBox
    }
}
</script>
