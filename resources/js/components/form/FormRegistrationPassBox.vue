<template>
    <div>
        <label :for="registrationPassId"><slot></slot></label>
        <input
            :type="registrationPassInputType"
            class="form-control"
            :id="registrationPassId"
            :name="registrationPassName"
            :placeholder="registrationPassPlaceHolder"
            :value="registrationPassvalue"
            @input="$emit('input', $event.target.value)"
            :required="registrationPassRequired">
    </div>
</template>

<script>
export default {
    name: 'FormRegistrationPassBox',
    model: {
        prop: 'registrationPassvalue',
        event: 'input'
    },
    props: {
        registrationPassId: String,
        registrationPassInputType: String,
        registrationPassPlaceHolder: String,
        registrationPassvalue: String,
        registrationPassName: String,
        registrationPassRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
