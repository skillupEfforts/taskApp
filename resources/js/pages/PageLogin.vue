<template>
    <div class="container">
        <form method="post" action="../home">
            <div class="form-row row justify-content-md-center">
                <FormLoginIdBox class="col-3"
                    loginId="loginid"
                    loginInputType="text"
                    loginPlaceHolder="ログインID"
                >ID</FormLoginIdBox>
                <FormLoginPassBox class="col-3"
                    loginPassId="loginPassId"
                    loginPassInputType="text"
                    loginPassPlaceHolder="ログインパスワード"
                >パスワード
                </FormLoginPassBox>
            </div>
            <FormSubmitBtn class="mt-3"
                loginSubmitId="loginSubmitId"
            >ログイン
            </FormSubmitBtn>
        </form>
    </div>
</template>

<script>
import FormLoginIdBox from '../components/form/FormLoginIdBox.vue';
import FormLoginPassBox from '../components/form/FormLoginPassBox.vue';
import FormSubmitBtn from '../components/form/FormSubmitBtn.vue';

export default {
    name: 'PageLogin',
    components: {
        FormLoginIdBox,
        FormLoginPassBox,
        FormSubmitBtn,
    }
}
</script>

<style>
    header {
        padding: 0 !important;
        background: transparent !important;
    }
    footer {
        padding: 0 !important;
        background: transparent !important;
    }
</style>
