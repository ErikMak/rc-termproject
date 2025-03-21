<template>
  <v-sheet
      class="sm-navbar d-flex mb-5 justify-center align-center"
      elevation="6"
      position="fixed"
  >
    <ul class="d-flex pa-0 ma-0">
      <NavLinkComponent
          v-for="(item, itemIndex) in items"
          :key="itemIndex"
          :title="item.title"
          :obj="item.link"
          :icon="item.icon"
          :class="{'me-2': itemIndex < 3}"
      />
    </ul>
  </v-sheet>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import NavLinkComponent from "@/components/MobileNav/NavLinkComp.vue";
import MobileNavMixins from "@/data/MobileNavMixins";

export default defineComponent({
  name: 'MobileNavComponent',
  components: {NavLinkComponent},
  mixins: [MobileNavMixins]
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