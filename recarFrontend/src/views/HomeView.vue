<template>
  <HeaderComponent></HeaderComponent>

  <v-main>
    <v-container fluid>
      <router-view />
    </v-container>
  </v-main>
  <MobileNavComponent/>
</template>


<script lang="ts">
import HeaderComponent from "@/components/Header/HeaderComp.vue";
import {defineComponent} from "vue";
import MobileNavComponent from "@/components/MobileNav/MobileNavComp.vue";

export default defineComponent({
  name: 'HomeView',
  components: {
    MobileNavComponent,
    HeaderComponent
  }
});
</script>