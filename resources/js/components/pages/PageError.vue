<template>
    <div class="l-form-error">
        <PageHeading2 class="text-danger"
        >IDまたはパスワードが間違っています。
        </PageHeading2>
        <router-link class="btn btn-primary w-100" to="/">TOPへ戻る</router-link>
    </div>
</template>

<script>
import PageHeading2 from '../heading/PageHeading2.vue';
import UtilityBtn from '../btn/UtilityBtn.vue';

export default {
    name: 'PageError',
    components: {
        PageHeading2,
        UtilityBtn,
    },
}
</script>
