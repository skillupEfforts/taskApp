<template>
    <div>
        <label :for="loginPassId"><slot></slot></label>
        <input :type="loginPassInputType" class="form-control" :id="loginPassId" :name="loginPassName" :placeholder="loginPassPlaceHolder" :value="loginPassvalue" @input="$emit('input', $event.target.value)" :required="loginPassRequired">
    </div>
</template>

<script>
export default {
    name: 'FormLoginPassBox',
    props: {
        loginPassId: String,
        loginPassInputType: String,
        loginPassPlaceHolder: String,
        loginPassvalue: String,
        loginPassName: String,
        loginPassRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
