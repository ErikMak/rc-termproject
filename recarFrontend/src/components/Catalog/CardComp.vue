<template>
  <v-sheet
      id="car-card"
      class="pa-2"
      rounded
      position="relative"
  >
      <a class="favorite pa-2" href="#">
        <font-awesome-icon
            icon="fa-regular fa-bookmark"
            size="lg"
            style="color: black; margin-bottom: 1px"
        />
      </a>
    <v-img
        id="car-preview"
        class="mt-2 mb-1"
        src="../src/assets/cars/15.png"
    >
    </v-img>
    <v-sheet
        id="description"
        rounded
        class="bg-white px-2 py-1"
    >
      <div class="d-flex flex-column">
        <router-link :to="{name: 'car', params: { brand: 'bmw', slug: '1'}}" class="pa-0">
          <div class="d-flex flex-column" id="links">
            <b class="font-weight-medium">Mazda 6 2017</b>
            <small style="margin-top: -3px;">Легковая; МКПП</small>
          </div>
        </router-link>
        <p class="mt-1"><strong>$59</strong>/день</p>
      </div>
    </v-sheet>
  </v-sheet>
</template>

<script lang="ts">
import { defineComponent} from "vue";

export default defineComponent({
  name: 'CardComponent',
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

#car-card:hover {
  box-shadow: 0 0 8px rgba(0, 0, 0, .08);
}
#car-card {
  background: $light;
  transition: box-shadow .3s ease-in-out;
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
  strong {
    color: $green;
  }
  .favorite:hover {
    background-color: $yellow-dirt;
  }
  .favorite:active {
    background-color: $yellow-dirt;
  }

  b, small {
    color: black;
  }
  #links:hover {
    b, small {
      color: $red;
    }
  }
  #links:active {
    b, small {
      text-decoration: underline;
    }
  }
}
</style>