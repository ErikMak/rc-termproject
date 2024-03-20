<template>
  <v-text-field
      density="compact"
      label="Поиск"
      variant="solo"
      hide-details
      single-line
      flat
      bg-color="#efedf0"
  >
    <template v-slot:append-inner>
      <font-awesome-icon
          icon="fa-solid fa-magnifying-glass"
          style="color: black;"
      />
    </template>
  </v-text-field>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'SearchComponent',
})
</script>