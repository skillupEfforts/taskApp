<template>
  <transition name="l-modal" appear>
    <div class="l-modal l-modal-overlay">
      <div class="l-modal-window l-modal-window-account">
        <div class="l-modal-content">
            <Heading3 class="text-body">アカウント登録しました。</Heading3>
        </div>
        <footer class="l-modal-footer">
          <slot name="footer"></slot>
        </footer>
      </div>
    </div>
  </transition>
</template>

<script>
import Heading3 from '../heading/Heading3.vue';

export default {
    name: 'modalCreateAcount',
    data() {
        return {
        }
    },
    components: {
        Heading3,
    },
}
</script>
