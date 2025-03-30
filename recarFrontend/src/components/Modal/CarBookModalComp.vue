<template>
<!--  Модальное окно бронирования комплектации авто -->
<v-dialog max-width="340">
  <template v-slot:activator="{ props: activatorProps }">
    <v-btn
        v-bind="activatorProps"
        flat
        class="rent-car-button mt-2 text-subtitle-1"
    >
      Арендовать машину
    </v-btn>
  </template>

  <template v-slot:default="{ isActive }">
    <v-card
        title="Выбор комплектации"
    >
      <v-card-text>
        <div class="radio-tile-group">
          <div class="input-container position-relative" v-for="row in carEquipments">
            <input
                class="position-absolute"
                type="radio"
                name="radio"
                :value="row.equip_id"
                v-model="equip_id"
                :disabled="!row.is_exist"
            >
            <v-sheet rounded class="radio-tile px-3 py-2">
              <p class="text-body-1 font-weight-bold">{{ row.name }}<small v-show="!row.is_exist" class="text-red ms-1">нет в наличии</small></p>
              <div class="equip_specs d-flex">
                <div class="spec-item d-flex align-center me-4">
                  <img src="../../../src/assets/transmission.png" alt="transmission" class="equip-spec-icon me-2">
                  <div class="equip-spec-col mb-1">
                    <small class="label">Трансмиссия</small>
                    <p class="text">{{ row.transmission }}</p>
                  </div>
                </div>
                <div class="spec-item d-flex align-center">
                  <img src="../../../src/assets/drive.png" alt="drive" class="equip-spec-icon me-2">
                  <div class="equip-spec-col mb-1">
                    <small class="label">Привод</small>
                    <p class="text">{{ row.drive }}</p>
                  </div>
                </div>
              </div>
              <div class="equip_specs d-flex mt-1">
                <p class="ms-7 text">
                  Мощность:
                  <a class="engine-link text-decoration-underline">
                    {{ row.car_engine.HP }} л.с ({{row.car_engine.volume}})
                  </a>
                </p>
              </div>
            </v-sheet>
          </div>
        </div>
      </v-card-text>

      <template v-slot:actions>
        <div class="ml-auto">
          <v-btn variant="text" @click="bookingAction()">
            Продолжить
          </v-btn>
          <v-btn
              variant="flat"
              text="Закрыть"
              @click="isActive.value = false"
          ></v-btn>
        </div>
      </template>
    </v-card>
  </template>
</v-dialog>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions, mapGetters, mapMutations} from "vuex";
import type {EquipmentType} from "@/types/IEquipData";

interface State {
  equip_id: number,
}

export default defineComponent({
  name: 'CarBookModalComponent',
  props: {
    model_id: {
      type: Number,
      required: true
    }
  },
  data: (): State => ({
    equip_id: 0,
  }),
  computed: {
    ...mapGetters(["getCarEquipments", "getLoggedStatus"]),
    carEquipments() : EquipmentType[] {
      return this.getCarEquipments
    }
  },
  methods: {
    ...mapActions(["uploadCarEquipments", "checkLoggedStatus"]),
    ...mapMutations(['createReservation']),
    bookingAction() {
      if(this.equip_id == 0) {
        return
      }

      if(this.getLoggedStatus) {
        this.createReservation({
          equip_id: this.equip_id.toString(),
          model_id: this.model_id
        })
        this.$router.push({name: 'booking'})
      } else {
        this.$router.push({name: 'auth'})
      }
    }
  },
  created() {
    this.uploadCarEquipments({id: this.model_id})
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';
@import '@/assets/mixins';

.rent-car-button {
  min-height: 46px;
  text-align: center;
  width: 100%;
  background-color: $yellow;
}

.radio-tile-group {
  display: grid;
  gap: 1em;
}

.input-container {
  width: 100%;
  input {
    height: 100%;
    width: 100%;
    cursor: pointer;
    margin: 0;
    z-index: 2;
    opacity: 0;
  }

  input:checked + .radio-tile {
    border: 2px solid $red;
    box-shadow: 0 0 12px rgba(219, 57, 57, .15);
  }

  input:hover:not(:checked) + .radio-tile {
    box-shadow: 0 0 12px rgba(171, 174, 180, .2);
  }

  .radio-tile {
    border: 2px solid $gray-550;
    height: 100%;
    .equip_specs .label {
      font-size: 11px;
      line-height: 1.2;
      color: $gray-600;
    }

    .equip_specs .text {
      margin-top: -4px;
    }

    .equip_specs .engine-link {
      color: $blue;
      z-index: 10;
    }

    .equip-spec-icon {
      width: 20px;
    }
  }
}
</style>