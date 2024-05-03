<template>
  <v-row>
    <v-col>
      <div class="text-center mb-3">
        <h2 class="font-weight-medium">Бронирование</h2>
      </div>
      <div class="img-wrapper position-relative">
        <div class="bg-img-auto position-absolute"></div>
        <v-img
            height="100"
            rounded
            cover
            src="../src/assets/auto.jpg"
        ></v-img>
      </div>
      <v-divider class="my-3"></v-divider>
      <v-sheet class="car-name px-4 py-3" rounded>
        <p class="text-h6">Mercedes-Benz G-class</p>
        <p style="font-size: 15px">E300 4MATIC Avantgarde</p>
      </v-sheet>
      <v-sheet class="mt-3 px-4 py-3 price" rounded>
          <small>Стоимость</small>
          <p class="text-h5 text-price"><b class="font-weight-bold">$25</b>/день</p>
      </v-sheet>
      <div class="mt-4">
        <v-date-input
            label="Начало аренды"
            prepend-icon=""
        >
        </v-date-input>
      </div>
      <div>
        <v-date-input
            label="Конец аренды"
            prepend-icon=""
        >
        </v-date-input>
      </div>
      <v-divider class="mb-5"></v-divider>
      <div class="d-flex align-center justify-end">
        <b class="text-h5 font-weight-medium me-2">К оплате: </b>
        <b class="text-h5 font-weight-medium">300$</b>
      </div>
      <div class="button-group mt-5">
        <v-btn block color="green" class="mb-3" size="large" variant="elevated">
          Оплатить
        </v-btn>
        <v-btn block color="red-darken-1" variant="outlined">
          Отменить
        </v-btn>
      </div>
    </v-col>
  </v-row>
</template>

<script lang="ts">
import { defineComponent} from "vue";

export default defineComponent({
  name: 'CardComponent',
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

.car-name {
  background: $gray-500;
}

.text-price b {
  color: $green;
}

.price {
  border: 1px solid #c4c8cc;
}

.rent-car-button {
  background-color: $yellow;
}

.bg-img-auto {
  background-color: black;
  width: 100%;
  height: 100%;
  z-index: 100;
  opacity: 0.2;
}
</style>