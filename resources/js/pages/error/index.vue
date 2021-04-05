<template>
    <div class="l-form-error">
        <Heading2 class="text-danger">IDまたはパスワードが間違っています。
        </Heading2>
        <LinkRouterBtn
            wrap-class="mt-3"
            btn-class="btn-primary w-100"
            to="/">TOPへ戻る
        </LinkRouterBtn>
    </div>
</template>

<script>
import Heading2 from '../../components/heading/Heading2.vue';
import LinkRouterBtn from '../../components/link/LinkRouterBtn.vue';

export default {
    name: 'PageError',
    components: {
        Heading2,
        LinkRouterBtn,
    },
}
</script>
