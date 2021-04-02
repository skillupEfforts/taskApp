<template>
    <div class="col">
        <label :for="registrationPassId"><slot></slot></label>
        <input
            :type="registrationPassInputType"
            class="form-control"
            :id="registrationPassId"
            :name="registrationPassName"
            :placeholder="registrationPassPlaceholder"
            :value="registrationPassValue"
            @input="$emit('input', $event.target.value)"
            :required="registrationPassRequired">
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
        registrationPassId: String,
        registrationPassInputType: String,
        registrationPassPlaceholder: String,
        registrationPassValue: String,
        registrationPassName: String,
        registrationPassRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
