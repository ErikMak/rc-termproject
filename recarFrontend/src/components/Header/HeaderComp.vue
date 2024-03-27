<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'HeaderComponent'
});
</script>

<template>
  <v-app-bar
      image="../src/assets/gradient.jpg"
      class="app-bar"
  >
    <!--  Логотип компании  -->
    <v-img
        class="ms-4"
        position="left"
        :height="25"
        src="../src/assets/logo2.png"
    ></v-img>
    <!--  Аватарка  -->
    <template v-slot:append>
      <v-avatar class="me-1">
        <v-img
            src="../src/assets/img_avatar.png"
        ></v-img>
      </v-avatar>
    </template>
  </v-app-bar>
</template>