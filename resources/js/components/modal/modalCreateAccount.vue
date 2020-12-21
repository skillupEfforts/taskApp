<template>
  <transition name="l-modal" appear>
    <div class="l-modal l-modal-overlay" @click.self="$emit('close')">
      <div class="l-modal-window l-modal-window-account">
        <div class="l-modal-content">
            <Heading2>アカウント登録しました。</Heading2>
        </div>
        <footer class="l-modal-footer">
          <slot name="footer"></slot>
        </footer>
      </div>
    </div>
  </transition>
</template>

<script>
import Heading2 from '../heading/Heading2.vue';

export default {
    name: 'modalCreateAcount',
    data() {
        return {
        }
    },
    components: {
        Heading2,
    },
    methods: {
        onClick () {
            this.$emit('onClick')
        }
    }
}
</script>
