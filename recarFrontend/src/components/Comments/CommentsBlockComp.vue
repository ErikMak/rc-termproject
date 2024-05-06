<template>
  <div class="comments-item py-3 px-4 rounded mb-3">
    <v-row>
      <v-col>
        <div class="d-flex align-center">
          <b class="me-2 text-decoration-underline">ErikMak</b>
          <small class="text-deep-orange-darken-2">23.02.33 18:00:00</small>
        </div>
        <i>Оценка: <strong>2.3</strong></i>
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
      </v-col>
    </v-row>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
  name: 'CommentsBlockComponent'
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

.comments-item {
  background-color: $gray-500;
}

.comments-item p {
  font-size: 0.9em;
}
</style>