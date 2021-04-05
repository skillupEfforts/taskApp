<template>
    <div class="col">
        <label :for="loginId"><slot></slot></label>
        <input
            :id="loginId"
            class="form-control"
            :type="loginInputType"
            :name="loginIdName"
            :placeholder="loginPlaceholder"
            :value="loginIdValue"
            :required="loginIdRequired"
            @input="$emit('input', $event.target.value)">
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
        loginId: {
            type:String,
            default:''
        },
        loginInputType: {
            type:String,
            default:''
        },
        loginPlaceholder: {
            type:String,
            default:''
        },
        loginIdValue: {
            type:String,
            default:''
        },
        loginIdName: {
            type:String,
            default:''
        },
        loginIdRequired: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
