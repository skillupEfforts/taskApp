<template>
    <div class="col">
        <label :for="loginId"><slot></slot></label>
        <input
            class="form-control"
            :type="loginInputType"
            :id="loginId"
            :name="loginIdName"
            :placeholder="loginPlaceholder"
            :value="loginIdValue"
            @input="$emit('input', $event.target.value)"
            :required="loginIdRequired">
    </div>
</template>

<script>
export default {
    name: 'FormLoginIdBox',
    model: {
        prop: 'loginIdValue',
        event: 'input'
    },
    props: {
        loginId: String,
        loginInputType: String,
        loginPlaceholder: String,
        loginIdValue: String,
        loginIdName: String,
        loginIdRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
