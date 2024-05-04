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
        :src="'../src/assets/cars/'+data.img"
    >
    </v-img>
    <v-sheet
        id="description"
        rounded
        class="bg-white px-2 py-1"
    >
      <div class="d-flex flex-column">
        <router-link :to="{name: 'car', params: { brand: data.brand, slug: data.model_id}}" class="pa-0">
          <div class="d-flex flex-column" id="links">
            <b class="font-weight-medium">{{ capitalizeBrand(data.brand) + ' ' + data.name }}</b>
            <small style="margin-top: -3px;">{{ data.category }}; {{ data.type }}</small>
          </div>
        </router-link>
        <p class="mt-1"><strong>${{ data.price }}</strong>/день</p>
      </div>
    </v-sheet>
  </v-sheet>
</template>

<script lang="ts">
import { defineComponent} from "vue";

export default defineComponent({
  name: 'CardComponent',
  props: {
    data: {
      type: Object,
      required: true
    }
  },
  methods: {
    capitalizeBrand(brand: string) {
      switch (brand) {
        case 'bmw': return 'BMW'
        case 'mercedes-benz': return 'Mercedes-Benz'
        case 'land rover': return 'Land Rover'
        default: return brand.charAt(0).toUpperCase() + brand.slice(1)
      }
    }
  }
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
  #car-preview {
    min-height: 112px;
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