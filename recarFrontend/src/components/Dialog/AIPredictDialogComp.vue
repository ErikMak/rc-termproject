<template>
  <!--  Диалоговое окно оповещения системы прогнозирования ДТП -->
  <v-dialog
      v-model="showDialog"
      width="auto"
  >
    <v-card
        color="red-darken-3"
        max-width="500"
        title="Система безопасности"
    >
      <template v-slot:prepend>
        <font-awesome-icon
            icon="fa-solid fa-ban"
            size="lg"
            style="color: white;"
        />
      </template>
      <template v-slot:text>
        <p class="text-justify">
          На основе анализа системой предупреждения ДТП
          текущих условий, характеристик авто и вашего опыта, мы рекомендуем вам воздержаться
          от управления выбранным автомобилем в данный момент.
          Пожалуйста, рассмотрите возможность использования альтернативного
          транспорта или подождите, пока ситуация улучшится.
        </p>
      </template>
      <template v-slot:actions>
        <v-btn
            class="ms-auto"
            text="Ok"
            @click="sendShowDialog"
        ></v-btn>
      </template>
    </v-card>
  </v-dialog>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
  name: 'AIPredictDialogComponent',
  emits: ["sendShowDialog"],
  props: {
    showDialog: {
      type: Boolean,
      required: true
    },
  },
  methods: {
    sendShowDialog() : void {
      this.$emit('sendShowDialog', !this.showDialog)
    }
  }
})
</script>