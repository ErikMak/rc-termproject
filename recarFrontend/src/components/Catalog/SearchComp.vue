<template>
  <v-text-field
      v-model="value"
      @keyup="emitToParent"
      density="compact"
      :label="label"
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
  props: {
    label: {
      type: String,
      required: true
    },
  },
  data: () => ({
    value: ''
  }),
  emits: ['car_name'],
  methods: {
    emitToParent() : any {
      this.$emit('car_name', this.value)
    },
  }
})
</script>