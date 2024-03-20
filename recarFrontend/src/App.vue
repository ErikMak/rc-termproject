<template>
  <v-app>
    <v-layout ref="app">
      <router-view></router-view>
    </v-layout>
  </v-app>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'App',
})
</script>


<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

* {
  font-family: 'Rubik', sans-serif;
}
</style>
