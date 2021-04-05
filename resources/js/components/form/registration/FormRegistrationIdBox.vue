<template>
    <div class="col">
        <label :for="registrationId"><slot></slot></label>
        <input
            :id="registrationId"
            class="form-control"
            :type="registrationInputType"
            :name="registrationIdName"
            :placeholder="registrationPlaceholder"
            :value="registrationIdValue"
            :required="registrationIdRequired"
            @input="$emit('input', $event.target.value)"
            @blur="onBlur"/>
        <slot name="error"></slot>
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationIdBox',
    model: {
        prop: 'registrationIdValue',
        event: 'input',
    },
    props: {
        registrationId: {
            type: String,
            default: '',
        },
        registrationInputType: {
            type: String,
            default: '',
        },
        registrationPlaceholder: {
            type: String,
            default: '',
        },
        registrationIdValue: {
            type: String,
            default: '',
        },
        registrationIdName: {
            type: String,
            default: '',
        },
        registrationIdRequired: {
            type: Boolean,
            default: false,
        },
        // IdNotEntered: {
        //     type: Boolean,
        //     default: false,
        // },
        // IdAlreadyUsed: {
        //     type: Boolean,
        //     default: false,
        // },
    },
    methods: {
        onBlur() {
            this.$emit('onBlur')
        },
    },
}
</script>
