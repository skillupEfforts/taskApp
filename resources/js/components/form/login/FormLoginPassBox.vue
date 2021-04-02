<template>
    <div class="col">
        <label :for="loginPassId"><slot></slot></label>
        <input
            class="form-control"
            :type="loginPassInputType"
            :id="loginPassId"
            :name="loginPassName"
            :placeholder="loginPassPlaceholder"
            :value="loginPassValue"
            @input="$emit('input', $event.target.value)"
            :required="loginPassRequired">
    </div>
</template>

<script>
export default {
    name: 'FormLoginPassBox',
    model: {
        prop: 'loginPassValue',
        event: 'input'
    },
    props: {
        loginPassId: String,
        loginPassInputType: String,
        loginPassPlaceholder: String,
        loginPassValue: String,
        loginPassName: String,
        loginPassRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
