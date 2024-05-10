<template>
  <v-row>
    <v-col>
      <TitleComponent title="Каталог" sub_title="Лучшие авто на выбор!"/>
    </v-col>
  </v-row>
  <v-row>
    <v-col class="py-0">
      <SearchComponent label="Поиск" v-on:car_name="getValueFromChild"/>
    </v-col>
  </v-row>
  <v-row>
    <v-col class="pb-0">
      <CategoryBoxesComponent />
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <v-divider></v-divider>
    </v-col>
  </v-row>
  <div class="wrapper pt-3">
      <CardPreloadComponent v-if="getCatalogPreloader" v-for="n in 2"></CardPreloadComponent>
      <CardComponent v-else v-for="row in getCatalogCars" :data=row />
  </div>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import CardComponent from "@/components/Catalog/CardComp.vue";
import SearchComponent from "@/components/Catalog/SearchComp.vue";
import TitleComponent from "@/components/Title/TitleComp.vue";
import CategoryBoxesComponent from "@/components/Catalog/CategoryBoxesComp.vue";
import {mapActions, mapGetters} from "vuex";
import CardPreloadComponent from "@/components/Catalog/CardPreloadComp.vue";
import Api from '@/common/cars'

interface State {
  car_name: string
}

export default defineComponent({
  name: 'CatalogView',
  components: {
    CardPreloadComponent,
    CategoryBoxesComponent,
    TitleComponent,
    SearchComponent,
    CardComponent
  },
  data: (): State => ({
    car_name: ''
  }),
  methods: {
    ...mapActions(["uploadCatalogCars", "findCatalogCars"]),
    getValueFromChild(val: string) : void {
      this.car_name = val
    },
  },
  computed: {
    ...mapGetters(["getCatalogCars", "getCatalogPreloader"])
  },
  created() {
    const brand = this.$route.params.brand

    this.uploadCatalogCars({brand: brand})

    this.$watch(
        () => this.$route.params,
        (toParams, previousParams) => {
          if(toParams.brand) {
            this.uploadCatalogCars({brand: toParams.brand})
          }
        }
    )

    this.$watch(
        () => this.$route.fullPath,
        (path) => {
          if(path == '/catalog') {
            this.uploadCatalogCars()
          }
        }
    )
  },
  watch: {
    car_name() {
      const car_name = this.car_name
      this.findCatalogCars({name: car_name})
    }
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

.wrapper {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: .75em;
}
</style>