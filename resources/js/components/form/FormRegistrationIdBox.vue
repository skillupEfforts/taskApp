<template>
    <div>
        <label :for="registrationId"><slot></slot></label>
        <input :type="registrationInputType"
            class="form-control" :id="registrationId"
            :name="registrationIdName"
            :placeholder="registrationPlaceHolder"
            :value="registrationIdvalue"
            @input="$emit('input', $event.target.value)"
            :required="registrationIdRequired">
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationIdBox',
    model: {
        prop: 'registrationIdvalue',
        event: 'input'
    },
    props: {
        registrationId: String,
        registrationInputType: String,
        registrationPlaceHolder: String,
        registrationIdvalue: String,
        registrationIdName: String,
        registrationIdRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
