<template>
  <v-sheet
      class="sm-navbar d-flex mb-5 justify-center align-center"
      elevation="6"
      position="fixed"
  >
    <ul class="d-flex pa-0 ma-0">
      <NavLinkComponent
          title="Главная"
          path="/catalog"
          icon="fa-solid fa-house"
          name="catalog"
          alias_name="catalog_all"
      />
      <NavLinkComponent
          title="Бронь"
          path="/reservations"
          icon="fa-solid fa-bars"
          name="reservations"
      />
      <NavLinkComponent
          title="Избранное"
          path="/favorites"
          icon="fa-solid fa-heart"
          name="favorites"
      />
      <NavLinkComponent
          title="Профиль"
          path="/profile"
          icon="fa-solid fa-user"
          name="profile"
      />
    </ul>
  </v-sheet>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import NavLinkComponent from "@/components/MobileNav/NavLinkComp.vue";

export default defineComponent({
  name: 'MobileNavComponent',
  components: {NavLinkComponent},
})
</script>

<style scoped lang="scss">
@import '@/assets/theme';

.sm-navbar {
  z-index: 999;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: fit-content;
  padding: 0 1em;
  height: 70px;
  background-color: $black;
  border-radius: 8px;
}
</style>