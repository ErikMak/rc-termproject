<template>
  <div class="d-flex flex-column">
    <p v-if="title" class="text-h5 font-weight-bold">{{ title }}</p>
    <p v-else class="text-h5 font-weight-bold">Главная</p>

    <small v-if="sub_title" class="font-weight-regular">{{ sub_title }}</small>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'TitleComponent',
  props: {
    title: {
      type: String,
      required: false
    },
    sub_title: {
      type: String,
      required: false
    }
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

small {
  color: $gray-600;
}
</style>