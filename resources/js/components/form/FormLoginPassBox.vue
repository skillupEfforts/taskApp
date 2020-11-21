<template>
    <div>
        <label :for="loginPassId"><slot></slot></label>
        <input :type="loginPassInputType" class="form-control" :id="loginPassId" :placeholder="loginPassPlaceHolder" required>
    </div>
</template>

<script>
export default {
    name: 'FormLoginPassBox',
    props: {
        loginPassId: String,
        loginPassInputType: String,
        loginPassPlaceHolder: String
    }
}
</script>
