<template>
  <TitleComponent title="Профиль"/>
  <div class="d-flex align-center mt-3">
    <p class="text-h6 me-1">{{ getUserLogin }}</p>
    <a class="text-subtitle-1 text-decoration-underline" @click.prevent="logout()">выйти</a>
  </div>
  <v-sheet class="bg-black pa-4 rounded mt-3">
    <p>Баланс</p>
    <b class="text-h5">{{ getUserBalance }}$</b>
  </v-sheet>
  <v-divider class="my-4"></v-divider>
</template>

<script lang="ts">
import TitleComponent from "@/components/Title/TitleComp.vue";
import { defineComponent } from "vue";
import {mapActions, mapGetters} from "vuex";
import UserService from "@/services/UserService";

export default defineComponent({
  name: "CarView",
  components: {
    TitleComponent
  },
  methods: {
      logout() {
        UserService.logout().then(() => {
          this.checkLoggedStatus()
          this.$router.push('/')
        })
      }
  },
  computed: {
    ...mapGetters(["getLoggedStatus", "getUserLogin", "getUserBalance"])
  },
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

a {
  pointer-events: all;
  cursor: pointer;
  color: $blue;
}
</style>