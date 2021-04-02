<template>
    <div class="mt-5 text-center">
        <router-link class="btn btn-secondary w-50" :to="to"><slot></slot></router-link>
    </div>
</template>

<script>
export default {
    name: 'BtnRouterLink',
    props: {
        to: String,
    }
}
</script>
