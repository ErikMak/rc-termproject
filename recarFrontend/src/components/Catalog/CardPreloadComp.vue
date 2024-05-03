<template>
  <v-sheet
      id="car-card"
      class="pa-2"
      rounded
      position="relative"
  >
    <a class="favorite pa-2">
      <font-awesome-icon
          icon="fa-regular fa-bookmark"
          size="lg"
          style="color: black; margin-bottom: 1px"
      />
    </a>
    <div class="image mt-2 mb-1 position-relative">
      <div class="loader position-absolute"></div>
    </div>
    <v-sheet
        id="description"
        rounded
        class="bg-white px-2 py-1"
    >
      <div class="d-flex flex-column">
          <div class="d-flex flex-column" id="links">
            <div class="name-text effect-shine rounded-1"></div>
            <div class="small-text effect-shine rounded-1"></div>
          </div>
        <div class="d-flex align-center mt-2">
          <div class="money-text"></div>/день
        </div>
      </div>
    </v-sheet>
  </v-sheet>
</template>

<script lang="ts">
import { defineComponent} from "vue";

export default defineComponent({
  name: 'CardPreloadComponent',
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';
@import '@/assets/mixins';

@include loader;
@include shine-animation;

#car-card:hover {
  box-shadow: 0 0 8px rgba(0, 0, 0, .08);
}
#car-card {
  background: $light;
  transition: box-shadow .3s ease-in-out;
  .image {
    min-height: 112px;
  }
  .name-text {
    margin-top: 2px;
    background-color: rgb(222, 221, 221);
    width: 110px;
    height: 21px;
  }
  .small-text {
    margin-top: 4px;
    background-color: rgb(236, 236, 236);
    width: 132px;
    height: 12px;
  }
  .money-text {
    background-color: rgb(198, 208, 198);
    width: 30px;
    height: 18px;
    margin-right: 3px;
  }
  .favorite {
    background-color: $yellow;
    position: absolute;
    right: 10px;
    z-index: 10;
    width: 35px;
    height: 35px;
    border-radius: 5px;
    text-align: center;
  }
}
</style>