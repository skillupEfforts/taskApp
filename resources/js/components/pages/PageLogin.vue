<template>
    <form method="post" action="../home">
        <div class="form-row">
            <FormTextBox class="col"
                v-bind:id="loginId"
                v-bind:label-txt="loginIdTxt"
                v-bind:input-type="loginIdInputType"
                v-bind:place-holder="loginIdPlaceHolder"
            >
            </FormTextBox>
            <FormTextBox class="col"
                v-bind:id="loginPassId"
                v-bind:label-txt="loginPassTxt"
                v-bind:input-type="loginPassInputType"
                v-bind:place-holder="loginPassPlaceHolder"
            >
            </FormTextBox>
        </div>
        <BtnSubmit class="mt-3"
                v-bind:submit-id="submitId"
        >ログイン
        </BtnSubmit>
    </form>
</template>

<script>
import HeadingDate from '../heading/HeadingDate.vue';
import BtnSubmit from '../btn/BtnSubmit.vue';
import FormTextBox from '../form/FormTextBox.vue';

export default {
    name: 'PageLogin',
    data () {
        return {
            loginId: 'loginId',
            loginIdTxt: 'ID',
            loginIdInputType: 'text',
            loginIdPlaceHolder: 'ログインID',
            loginPassId: 'password',
            loginPassTxt: 'パスワード',
            loginPassInputType: 'text',
            loginPassPlaceHolder: 'ログインパスワード',
            submitId: 'loginSubmit',
        }
    },
    components: {
        HeadingDate,
        BtnSubmit,
        FormTextBox,
    }
}
</script>
