<template>
  <v-sheet
      class="sm-navbar d-flex mb-5 justify-center align-center"
      elevation="6"
      position="fixed"
  >
    <ul class="d-flex pa-0 ma-0">
      <li class="pa-2 me-2 d-flex align-center justify-center">
        <font-awesome-icon icon="fa-solid fa-house" />
        <p class="title ms-2 font-weight-medium">Главная</p>
      </li>
      <li class="pa-2 me-2 active d-flex align-center justify-center">
        <font-awesome-icon icon="fa-solid fa-bars" />
        <p class="title ms-2 font-weight-medium">Бронь</p>
      </li>
      <li class="pa-2 me-2 d-flex align-center justify-center">
        <font-awesome-icon icon="fa-solid fa-heart" />
        <p class="title ms-2 font-weight-medium">Избранное</p>
      </li>
      <li class="pa-2 d-flex align-center justify-center">
        <font-awesome-icon icon="fa-solid fa-user" />
        <p class="title ms-2 font-weight-medium">Профиль</p>
      </li>
    </ul>
  </v-sheet>
</template>

<script lang="ts">
import { defineComponent} from "vue";

export default defineComponent({
  name: 'MobileNavComponent',
})
</script>

<style scoped lang="scss">
@import '@/assets/theme';

.sm-navbar {
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: fit-content;
  padding: 0 1em;
  height: 70px;
  background-color: $black;
  border-radius: 8px;
  li {
    text-align: center;
    min-width: 40px;
    list-style: none;
    border-radius: 8px;
  }
  li:not(.active) p {
    display: none;
  }
  li:not(.active) {
    color: white;
    background-color: $dark;
  }
  li.active {
    color: $black;
    background-color: $yellow;
    padding-left: 1em !important;
    padding-right: 1em !important;
  }
}
</style>