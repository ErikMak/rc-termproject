<template>
  <div class="category-boxes">
    <div
        class="category-box"
        :class="{'router-link-exact-active': this.$route.params.brand === item.link.params.brand}"
        v-for="(item, i) in categories"
        :key="i"
    >
        <v-img
            class="car-logo"
            :src="item.src"
            :alt="item.alt"
        >
        </v-img>
      <router-link
          :to="item.link"
          class="category-link pa-0"
      >
      </router-link>
    </div>
  </div>
  <div class="text-right mt-2">
    <router-link :to="{name: 'catalog_all'}" class="show-all-link text-right">показать все</router-link>
  </div>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import CategoriesMixins from "@/data/CategoriesMixins";

export default defineComponent({
  name: "CategoryBoxesComponent",
  mixins: [CategoriesMixins],
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

.category-boxes {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 0.45em;
  .category-box {
    position: relative;
    transition: all .2s ease-in-out;
    border-radius: 6px;
    background-color: $gray-500;
    border-bottom: 2px solid $gray-550;
    .car-logo {
      max-height: 100%;
      max-width: 100%;
      border-radius: 6px;
    }
  }

  .category-box:hover {
    -webkit-transform: scale(1.2);
    -ms-transform: scale(1.2);
    transform: scale(1.2);
  }
  .category-link {
    top: 0;
    left: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 6px;
  }

  .category-box.router-link-exact-active {
    pointer-events: none;
    cursor: default;
    border-bottom: 2px solid $red;
  }
}

.show-all-link {
  color: $blue;
  text-decoration: underline;
}
</style>