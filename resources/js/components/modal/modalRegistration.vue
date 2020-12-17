<template>
  <transition name="modal" appear>
    <div class="modal modal-overlay" @click.self="$emit('close')">
      <div class="modal-window">
        <div class="modal-content">
            <!--<form @submit.prevent="add">-->
                <!--<div class="form-row">-->
                    <h3 class="text-info"><slot name="modalTtl"></slot></h3>
                    <slot name="modal-input-task-parent">
                        <div class="modal-input-task-parent">
                        <FormRegistrationIdBox>
                        <slot></slot>
                        </FormRegistrationIdBox>
                            <label :for="parentTaskId"><slot name="parentTaskName"></slot></label>
                            <input
                                class="form-control"
                                :id="parentTaskId"
                                :name="parentTaskIdName"
                                :placeholder="parentTaskIdPlaceHolder"
                                :value="parentTaskNameValue"
                                @input="$emit('input', $event.target.value)">
                        </div>
                    </slot>
                <!--</div>-->
            <!--</from>-->
        </div>
        <footer class="modal-footer">
          <slot name="footer">
            <button @click="$emit('add')"><slot></slot></button>
            <button @click="$emit('close')"><slot></slot></button>
          </slot>
        </footer>
      </div>
    </div>
  </transition>
</template>

<script>
import FormRegistrationIdBox from '../form/FormRegistrationIdBox.vue';

export default {
    name: 'modalRegistration',
    model: {
        prop: 'parentTaskNameValue',
        event: 'input'
    },
    props: {
        parentTaskId: String,
        parentTaskIdName: String,
        parentTaskIdPlaceHolder: String,
        parentTaskNameValue: String,
    },
    components: {
        FormRegistrationIdBox,
    }
}
</script>


<style lang="scss" scoped>
.modal {
  &.modal-overlay {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    z-index: 30;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
  }

  &-window {
    width: 80%;
    height: 80%;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
  }

  &-content {
    padding: 10px 20px;
  }

  &-footer {
    background: #ccc;
    padding: 10px;
    text-align: right;
  }
}

// オーバーレイのトランジション
.modal-enter-active, .modal-leave-active {
  transition: opacity 0.4s;

  // オーバーレイに包含されているモーダルウィンドウのトランジション
  .modal-window {
    transition: opacity 0.4s, transform 0.4s;
  }
}

// ディレイを付けるとモーダルウィンドウが消えた後にオーバーレイが消える
.modal-leave-active {
  transition: opacity 0.6s ease 0.4s;
}

.modal-enter, .modal-leave-to {
  opacity: 0;

  .modal-window {
    opacity: 0;
    transform: translateY(-20px);
  }
}
</style>
