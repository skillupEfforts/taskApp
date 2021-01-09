<template>
    <tr>
        <th scope="row" id="js-parentTask" class="text-center">
            <slot name="taskNames">ダミー</slot>
        </th>
        <td id="js-plan-workeffortTime" class="text-center">
            <slot name="taskHours">Hour/Hour</slot>
        </td>
        <td id="js-schedule" class="text-center">
            <slot name="taskDates">Start〜End</slot>
        </td>
        <td id="js-actual-workeffortTime">
            <input
                type="text"
                inputmode="numeric"
                class="form-control"
                @input="$emit('input', $event.target.value)"
                placeholder="実工数を入力してください">
        </td>
    </tr>
</template>

<script>
export default {
    name: 'DataTableRow',
}
</script>
