<template>
    <div>
        <label :for="loginId"><slot></slot></label>
        <input :type="loginInputType" class="form-control" :id="loginId" :placeholder="loginPlaceHolder" :value="value" @input="$emit('input', $event.target.value)" required>
    </div>
</template>

<script>
export default {
    name: 'FormLoginIdBox',
    props: {
        loginId: String,
        loginInputType: String,
        loginPlaceHolder: String,
    }
}
</script>
