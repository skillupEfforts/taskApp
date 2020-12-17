<template>
    <div class="l-form">
    <PageHeading>アカウント新規追加</PageHeading>
        <form @submit.prevent="submit">
            <div class="form-row">
                <FormRegistrationIdBox class="col"
                    registrationId="registrationId"
                    registrationInputType="text"
                    registrationPlaceHolder="登録するIDを入力してください"
                    registrationIdName="registrationId"
                    v-model="registrationId"
                >登録するIDを入力してください。
                </FormRegistrationIdBox>
                <FormRegistrationPassBox class="col"
                    registrationPassId="registrationPassId"
                    registrationPassInputType="password"
                    registrationPassPlaceHolder="登録するパスワードを入力してください"
                    registrationPassName="registrationPass"
                    v-model="registrationPass"
                >登録するパスワードを入力してください。
                </FormRegistrationPassBox>
            </div>
            <FormRegistrationSubmitBtn class="mt-3"
                registrationSubmitId="registrationSubmitId"
                registrationButtonType="submit"
            >アカウント新規登録
            </FormRegistrationSubmitBtn>
        </form>
    </div>
</template>

<script>
import FormRegistrationIdBox from '../form/FormRegistrationIdBox.vue';
import FormRegistrationPassBox from '../form/FormRegistrationPassBox.vue';
import FormRegistrationSubmitBtn from '../form/FormRegistrationSubmitBtn.vue';
import PageHeading from '../heading/PageHeading.vue';

export default {
    name: 'PageRegistration',
    data() {
        return {
            registrationId: '',
            registrationPass: ''
        }
    },
    methods: {
        submit() {
            axios.get('/api/home', {
                params: {
                    registrationId: this.registrationId,
                    registrationPassword: this.registrationPass
                }
            })
            .then(response => {
                console.log(response)
                if(response.data === 0) {
                    this.$router.push('/error');
                } else {
                    this.$router.push({
                        name: 'PageIndex',
                        params :{ registrationId: response.data.registrationId }
                    });
                }
            })
            .catch(error => {console.log(error)
                this.$router.push('/error');
            });
        }
    },
    components: {
        FormRegistrationSubmitBtn,
        FormRegistrationIdBox,
        FormRegistrationPassBox,
        PageHeading
    }
}
</script>
