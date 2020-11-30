<template>
    <div class="l-form-error">
        <PageHeading class="text-danger"
        >IDまたはパスワードが間違っています。
        </PageHeading>

        <router-link class="btn btn-primary w-100"
        to="/"
        >TOPへ戻る
        </router-link>


    </div>
</template>

<script>
import PageHeading from '../heading/PageHeading.vue';
import UtilityBtn from '../btn/UtilityBtn.vue';

export default {
    name: 'PageError',
    components: {
        PageHeading,
        UtilityBtn,
    },
}

</script>
