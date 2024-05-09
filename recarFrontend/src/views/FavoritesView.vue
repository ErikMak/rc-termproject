<template>
  <TitleComponent title="Избранное" class="mb-3"/>
  <div class="favorites-grid">
      <v-card
          v-for="(row, index) in favorites"
          :id="index"
          class="mx-auto w-100"
          :subtitle="row.car.category + '; ' + row.car.type"
          flat
          color="#f5f5f5"
      >
        <template v-slot:title>
          <router-link :to="{name: 'car', params: { brand: row.car.brand.toLowerCase(), slug: row.car.model_id}}" class="pa-0">
            <div id="link">
              <p class="link-b font-weight-medium">{{ row.car.brand + ' ' + row.car.name }}</p>
            </div>
          </router-link>
        </template>
        <template v-slot:prepend>
          <v-avatar class="me-3">
            <v-img src="../../src/assets/car-icon.jpg"></v-img>
          </v-avatar>
        </template>
        <template v-slot:append>
          <v-btn
              color="red-darken-1"
              icon="fa-solid fa-trash-can"
              size="small"
              variant="tonal"
              @click="deleteFromFavorites(index)"
          ></v-btn>
        </template>
      </v-card>
  </div>
</template>

<script lang="ts">
import TitleComponent from "@/components/Title/TitleComp.vue";
import { defineComponent } from "vue";
import Api from '@/common/favorites'
import {mapGetters} from "vuex";
import type {CarType} from "@/types/ICarData";
import toasts from "toastr";

interface State {
  favorites: Array<CarType>
}

export default defineComponent({
  name: "CarView",
  components: {
    TitleComponent
  },
  data: (): State => ({
    favorites: []
  }),
  methods: {
    deleteFromFavorites(index: number) {
      const idx = index.toString()
      const model_id = this.favorites.at(index).car.model_id

      Api.deleteFromFavorites({favorite_id: model_id}, (res: Response) => {
        toasts.info(res.data)
        document.getElementById(idx)?.remove()
      })
    }
  },
  computed: {
    ...mapGetters(["getUserID"])
  },
  created() {
    const user_id = this.getUserID

    Api.getFavorites({user: user_id}, (res: Response)  => {
      this.favorites = res.data
    })
  }
})
</script>

<style lang="scss">
@import '@/assets/theme';
@import 'toastr';

.favorites-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 1em;
  .link-b {
    color: black;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  #link:hover {
    p {
      color: $red;
    }
  }
  #link:active {
    p {
      text-decoration: underline;
    }
  }
}
</style>