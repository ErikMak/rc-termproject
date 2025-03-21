<template>
<!--    Header Preloader    -->
<div class="header-text mx-auto effect-shine rounded-1"></div>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
  name: 'CarHeaderPreloaderComponent'
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';
@import '@/assets/mixins';

@include shine-animation;

.header-text {
  background-color: rgb(222, 221, 221);
  width: 200px;
  height: 26px;
  margin-bottom: 10px;
}
</style>
