<template>
  <TitleComponent title="Избранное"/>
</template>

<script lang="ts">
import TitleComponent from "@/components/Title/TitleComp.vue";
import { defineComponent } from "vue";

export default defineComponent({
  name: "CarView",
  components: {
    TitleComponent
  }
})
</script>