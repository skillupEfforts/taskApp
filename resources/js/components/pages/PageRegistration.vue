<template>
    <div class="l-form">
    <PageHeading
        :headingTtl="headingTtl"
        :class="{ 'text-danger':danger }"
    >
    </PageHeading>
        <form @submit.prevent="registration">
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
            registrationPass: '',
            headingTtl: 'アカウント新規追加',
            danger: false
        }
    },
    methods: {
        registration() {
            console.log(this.registrationId)
            if(this.registrationId !== '' && this.registrationPass !== ''){
                this.$router.push({
                    name: 'PageLogin'
                });
            } else {
                console.log(this.PageHeading)
                this.headingTtl = '登録するID、パスワードを入力してください。';
                this.danger = true;
            }
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
