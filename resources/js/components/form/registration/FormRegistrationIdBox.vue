<template>
    <div class="col">
        <label :for="registrationId"><slot></slot></label>
        <input
            class="form-control"
            :type="registrationInputType"
            :id="registrationId"
            :name="registrationIdName"
            :placeholder="registrationPlaceholder"
            :value="registrationIdValue"
            @input="$emit('input', $event.target.value)"
            @blur="onBlur"
            :required="registrationIdRequired">
        <slot name="error"></slot>
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationIdBox',
    model: {
        prop: 'registrationIdValue',
        event: 'input'
    },
    props: {
        registrationId: String,
        registrationInputType: String,
        registrationPlaceholder: String,
        registrationIdValue: String,
        registrationIdName: String,
        registrationIdRequired: {
            type: Boolean,
            default: false,
        },
        IdNotEntered: {
            type: Boolean,
            default: false,
        },
        IdAlreadyUsed: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        onBlur () {
            this.$emit('onBlur')
        }
    }
}
</script>
