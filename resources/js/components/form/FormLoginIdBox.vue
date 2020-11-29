<template>
    <div>
        <label :for="loginId"><slot></slot></label>
        <input :type="loginInputType" class="form-control" :id="loginId"  :name="loginIdName" :placeholder="loginPlaceHolder" :value="loginIdvalue" @input="$emit('input', $event.target.value)" :required="loginIdRequired">
    </div>
</template>

<script>
export default {
    name: 'FormLoginIdBox',
    props: {
        loginId: String,
        loginInputType: String,
        loginPlaceHolder: String,
        loginIdvalue: String,
        loginIdName: String,
        loginIdRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
