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
                    @onBlur="registrationIdCheck"
                    v-model="registrationId"
                >登録するIDを入力してください。
                <template slot="error">
                    <p class="text-danger" v-if="IdNotEntered">登録するログインIDを入力してください。</p>
                    <p class="text-danger" v-if="IdAlreadyUsed">登録するログインIDはすでに使われております。他のログインIDを試してください。</p>
                </template>
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
            danger: false,
            IdNotEntered: false,
            IdAlreadyUsed: false
        }
    },
    methods: {
        registration() {
            if(this.registrationId !== '' && this.registrationPass !== ''){
                this.$router.push('/home');
            }
            else {
                this.headingTtl = '登録するIDもしくはパスワードを入力してください。';
                this.danger = true;
            }
        },
        registrationIdCheck () {
            if(this.registrationId === ''){
                this.IdNotEntered = true
                this.IdAlreadyUsed = false
            } else if (this.registrationId === 'aaaaa') {
                this.IdAlreadyUsed = true
                this.IdNotEntered = false
            } else {
                this.IdNotEntered = false
                this.IdAlreadyUsed = false
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
