<template>
  <v-row>
    <v-col>
      <TitleComponent title="Каталог" sub_title="Лучшие авто на выбор!"/>
    </v-col>
  </v-row>
  <v-row>
    <v-col class="py-0">
      <SearchComponent/>
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
    <CardComponent v-for="n in 4"/>
  </div>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import CardComponent from "@/components/Catalog/CardComp.vue";
import SearchComponent from "@/components/Catalog/SearchComp.vue";
import TitleComponent from "@/components/Title/TitleComp.vue";
import CategoryBoxesComponent from "@/components/Catalog/CategoryBoxesComp.vue";
export default defineComponent({
  name: 'CatalogView',
  components: {
    CategoryBoxesComponent,
    TitleComponent,
    SearchComponent,
    CardComponent
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