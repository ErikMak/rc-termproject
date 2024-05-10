<template>
  <v-sheet
      id="car-card"
      class="pa-2"
      rounded
      position="relative"
  >
    <FavoriteComponent :catalog="true" :car_id="data.model_id"/>
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
        <router-link :to="{name: 'car', params: { brand: data.brand.toLowerCase(), slug: data.model_id}}" class="pa-0">
          <div class="d-flex flex-column" id="links">
            <b class="font-weight-medium">{{ data.brand + ' ' + data.name }}</b>
            <small style="margin-top: -3px;">
              <b
                class="font-weight-regular"
                :class="{'text-deep-orange-darken-2': data.category === 'Грузовая'}"
            >{{ data.category }};</b> {{ data.type }}</small>
          </div>
        </router-link>
        <p class="mt-1"><strong>${{ data.price }}</strong>/день</p>
      </div>
    </v-sheet>
  </v-sheet>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import FavoriteComponent from "@/components/Favorite/FavoriteComp.vue";

export default defineComponent({
  name: 'CardComponent',
  components: {FavoriteComponent},
  props: {
    data: {
      type: Object,
      required: true
    }
  },
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
  #car-preview {
    min-height: 112px;
  }
  strong {
    color: $green;
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