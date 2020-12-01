<template>
    <div class="l-form">
        <form method="post" @submit.prevent="submit">
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
                    loginPassInputType="text"
                    loginPassPlaceHolder="ログインパスワード"
                    loginPassName="loginPass"
                    v-model="userPass"
                >ログインパス
                </FormLoginPassBox>
            </div>
            <FormSubmitBtn class="mt-3"
                loginSubmitId="loginSubmit"
                loginButtonType="submit"
            >ログイン
            </FormSubmitBtn>
        </form>
    </div>
</template>

<script>
import FormLoginIdBox from '../form/FormLoginIdBox.vue';
import FormLoginPassBox from '../form/FormLoginPassBox.vue';
import FormSubmitBtn from '../form/FormSubmitBtn.vue';

export default {
    name: 'PageLogin',
    methods: {
        submit() {
            axios.patch('/api/home', {
                userId: this.userId,
                userPassword: this.userPassword
            })
            .then(response => {
                console.log(response)
                if(response.data === 0) {
                    this.$router.push('/error');
                } else {
                    this.$router.push({
                        name: 'PageIndex',
                        params :{ id: response.data.userId }
                    });
                }
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
