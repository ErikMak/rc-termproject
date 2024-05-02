<template>
  <v-app-bar
      :image="gradient"
      class="app-bar"
  >
    <!--  Логотип компании  -->
    <v-img
        class="ms-4"
        position="left"
        :height="25"
        :src="logo"
    ></v-img>
    <!--  Аватарка  -->
    <template v-slot:append>
      <v-avatar class="me-1">
        <v-img
            :src="avatar"
        ></v-img>
      </v-avatar>
    </template>
  </v-app-bar>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import gradient from "@/assets/gradient.jpg"
import logo from "@/assets/logo2.png"
import avatar from "@/assets/img_avatar.png"
export default defineComponent({
  name: 'HeaderComponent',
  data: () => ({
    gradient: gradient,
    avatar: avatar,
    logo: logo
  })
});
</script>