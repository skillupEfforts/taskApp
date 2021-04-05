<template>
    <div class="col">
        <label :for="registrationPassId"><slot></slot></label>
        <input
            :id="registrationPassId"
            class="form-control"
            :type="registrationPassInputType"
            :name="registrationPassName"
            :placeholder="registrationPassPlaceholder"
            :value="registrationPassValue"
            :required="registrationPassRequired"
            @input="$emit('input', $event.target.value)">
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationPassBox',
    model: {
        prop: 'registrationPassValue',
        event: 'input'
    },
    props: {
        registrationPassId: {
            type: String,
            default: '',
        },
        registrationPassInputType: {
            type: String,
            default: '',
        },
        registrationPassPlaceholder: {
            type: String,
            default: '',
        },
        registrationPassValue: {
            type: String,
            default: '',
        },
        registrationPassName: {
            type: String,
            default: '',
        },
        registrationPassRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
