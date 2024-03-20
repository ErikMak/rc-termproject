<template>
  <v-row>
    <v-col>
      <TitleComponent/>
    </v-col>
  </v-row>
  <v-row>
    <v-col class="py-0">
      <SearchComponent/>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <v-divider></v-divider>
    </v-col>
  </v-row>
  <div class="wrapper">
    <CardComponent v-for="n in 4"/>
  </div>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import CardComponent from "@/components/Catalog/CardComp.vue";
import SearchComponent from "@/components/Catalog/SearchComp.vue";
import TitleComponent from "@/components/Title/TitleComp.vue";
export default defineComponent({
  name: 'CatalogView',
  components: {
    TitleComponent,
    SearchComponent,
    CardComponent
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

small {
  color: $gray-600;
}

.wrapper {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: .75em;
}
</style>