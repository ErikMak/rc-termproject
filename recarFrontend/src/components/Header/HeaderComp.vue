<template>
  <v-app-bar
      :image="gradient"
      class="app-bar"
  >
    <div class="logo position-relative">
      <!--  Логотип компании  -->
      <v-img
          class="ms-4"
          position="left"
          :height="25"
          :src="logo"
      ></v-img>
      <router-link :to="{name: 'welcome'}" class="ms-4 logo-link position-absolute"></router-link>
    </div>
    <!--  Аватарка  -->
    <template v-slot:append>
      <v-avatar v-if="getLoggedStatus" class="me-2">
        <v-img
            :src="avatar"
        ></v-img>
      </v-avatar>
      <v-btn v-else
             color="white"
             variant="tonal"
             size="small"
             class="me-2"
             :to="{name: 'auth'}"
      >
        Войти
      </v-btn>
    </template>
  </v-app-bar>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import gradient from "@/assets/gradient.webp"
import logo from "@/assets/logo2.png"
import avatar from "@/assets/img_avatar.webp"
import {mapActions, mapGetters} from "vuex";
export default defineComponent({
  name: 'HeaderComponent',
  data: () => ({
    gradient: gradient,
    avatar: avatar,
    logo: logo
  }),
  created() {
    this.checkLoggedStatus()
  },
  methods: {
    ...mapActions(["checkLoggedStatus"])
  },
  computed: {
    ...mapGetters(["getLoggedStatus"])
  },
});
</script>

<style lang="scss" scoped>
.logo {
  width: 100%;
}
.logo-link {
  top: 0;
  max-width: 86px;
  width: 100%;
  height: 100%;
}
</style>