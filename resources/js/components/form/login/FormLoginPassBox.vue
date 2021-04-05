<template>
    <div class="col">
        <label :for="loginPassId"><slot></slot></label>
        <input
            :id="loginPassId"
            class="form-control"
            :type="loginPassInputType"
            :name="loginPassName"
            :placeholder="loginPassPlaceholder"
            :value="loginPassValue"
            :required="loginPassRequired"
            @input="$emit('input', $event.target.value)">
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
        loginPassId: {
            type:String,
            default:''
        },
        loginPassInputType: {
            type:String,
            default:''
        },
        loginPassPlaceholder: {
            type:String,
            default:''
        },
        loginPassValue: {
            type:String,
            default:''
        },
        loginPassName: {
            type:String,
            default:''
        },
        loginPassRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
