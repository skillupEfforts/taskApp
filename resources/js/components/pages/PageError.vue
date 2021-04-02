<template>
    <div class="l-form-error">
        <PageHeading2 class="text-danger"
        >IDまたはパスワードが間違っています。
        </PageHeading2>
        <BtnRouterLink
            wrap-class="mt-3"
            btn-class="btn-primary w-100"
            to="/"
        >TOPへ戻る
        </BtnRouterLink>
    </div>
</template>

<script>
import PageHeading2 from '../heading/PageHeading2.vue';
import BtnRouterLink from '../btn/BtnRouterLink.vue';

export default {
    name: 'PageError',
    components: {
        PageHeading2,
        BtnRouterLink,
    },
}
</script>
