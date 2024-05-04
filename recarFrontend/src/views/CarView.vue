<template>
  <v-row>
    <v-col class="pb-0">
      <div class="car-header-wrapper position-relative">
        <div class="back-arrow position-absolute">
          <a class="back-link" @click="$router.push({path: '/catalog/'+this.$route.params.brand})">
          <font-awesome-icon
              icon="fa-solid fa-chevron-left"
              size="lg"
              style=""
          />
          </a>
        </div>
        <div class="text-center">
          <h2 class="font-weight-medium">{{ capitalizeBrand(details.brand) + ' ' + details.name }}</h2>
        </div>
      </div>
    </v-col>
  </v-row>
  <v-row>
    <v-col class="pb-0 position-relative">
      <div class="img-wrapper position-relative">
        <v-img
            :src="'../../src/assets/cars/'+details.img"
            aspect-ratio="16/9"
            class="px-3"
        >
        </v-img>
        <div class="rating-block position-absolute text-center">
          <p class="font-weight-medium">X.X</p>
        </div>
        <div class="price-block position-absolute text-center">
          <p class="font-weight-medium"><b class="font-weight-bold">${{details.price}}</b>/день</p>
        </div>
          <a class="favorite-block position-absolute pa-2" href="#">
          <font-awesome-icon
              icon="fa-regular fa-bookmark"
              size="lg"
              style="color: black; margin-bottom: 1px"
          />
          </a>
      </div>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <h2 class="mb-4">Основные параметры</h2>
      <div class="car-specs-wrapper">
        <div class="car-specs pa-3">
          <div class="car-spec-col mb-1">
            <small class="label">Категория</small>
            <p class="text">{{details.category}}</p>
          </div>
          <div class="car-spec-col mb-1">
            <small class="label">Тип</small>
            <p class="text">{{details.type}}</p>
          </div>
          <div class="car-spec-col mb-1">
            <small class="label">Год выпуска</small>
            <p class="text">{{details.year}}</p>
          </div>
        </div>
      </div>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <h2 class="mb-4">Дополнительные сведения</h2>
      <v-table density="compact" class="car-another-specs">
        <thead></thead>
        <tbody>
          <tr>
            <td class="px-0 pb-3">Страна</td>
            <td class="px-0 pb-3">
              <div class="d-flex align-center">
                <img class="country-flag" src="../../src/assets/flags/czech.png" alt="flag">
                {{details.country}}
              </div>
            </td>
          </tr>
          <tr>
            <td class="px-0 py-3">Объем бака, л</td>
            <td class="px-0 py-3">{{ details.tank }}</td>
          </tr>
          <tr>
            <td class="px-0 py-3">Масса, кг</td>
            <td class="px-0 py-3">{{ details.weight }}</td>
          </tr>
        </tbody>
      </v-table>
    </v-col>
  </v-row>
  <v-row>
    <v-col>

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
                <div class="input-container position-relative" v-for="row in getCarEquipments">
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
                        <img src="../../src/assets/transmission.png" alt="transmission" class="equip-spec-icon me-2">
                        <div class="equip-spec-col mb-1">
                          <small class="label">Трансмиссия</small>
                          <p class="text">{{ row.transmission }}</p>
                        </div>
                      </div>
                      <div class="spec-item d-flex align-center">
                        <img src="../../src/assets/drive.png" alt="drive" class="equip-spec-icon me-2">
                        <div class="equip-spec-col mb-1">
                          <small class="label">Привод</small>
                          <p class="text">XXX</p>
                        </div>
                      </div>
                    </div>
                    <div class="equip_specs d-flex mt-1">
                      <p class="ms-7 text">
                        Мощность:
                        <a class="engine-link text-decoration-underline">
                          {{ row.engine.HP }} л.с ({{row.engine.volume}})
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
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <CommentInputComponent />
    </v-col>
  </v-row>
</template>

<script lang="ts">
import TitleComponent from "@/components/Title/TitleComp.vue";
import { defineComponent } from "vue";
import CommentInputComponent from "@/components/Comments/CommentInputComp.vue";
import Api from '@/common/cars'
import {mapActions, mapGetters, mapMutations} from "vuex";
import { capitalizeBrand } from "@/services/CapitalizeService";

interface State {
  details: Object,
  equip_id: number
}

export default defineComponent({
  name: "CarView",
  components: {
    CommentInputComponent,
    TitleComponent
  },
  data: (): State => ({
    details: {
      brand: '',
      name: ''
    },
    equip_id: 0
  }),
  computed: {
    ...mapGetters(['getCarEquipments', 'getLoggedStatus'])
  },
  methods: {
    ...mapMutations(['createReservation']),
    ...mapActions(['uploadCarEquipments', 'checkLoggedStatus']),
    capitalizeBrand(brand: string) : string {
      return capitalizeBrand(brand)
    },
    bookingAction() {
      if(this.equip_id == 0) {
        return
      }

      if(this.getLoggedStatus) {
        this.createReservation({
          equip_id: this.equip_id.toString(),
          model_id: this.$route.params.slug
        })
        this.$router.push('/booking')
      } else {
        this.$router.push('/auth')
      }
    }
  },
  created() {
    this.uploadCarEquipments({id: this.$route.params.slug})
    Api.getCarById({id: this.$route.params.slug}, (res: Response) => {
      this.details = res.data
    })

    this.checkLoggedStatus()
  },
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

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



.rent-car-button {
  min-height: 46px;
  text-align: center;
  width: 100%;
  background-color: $yellow;
}


.back-arrow {
  top: 6px;
  .back-link {
    color: $gray-600;
    cursor: pointer;
  }
  .back-link:hover {
    transition: .2s;
    color: black;
  }
}

.img-wrapper {
  min-height: 203px;
}

.rating-block {
  height: 40px;
  width: 40px;
  bottom: 0;
  left: 0;
  border-radius: 5px;
  background-color: $red;
  line-height: 40px;
  p {
    color: white;
    vertical-align: middle;
    display: inline-block;
    line-height: 1.5;
  }
}

.price-block {
  height: 40px;
  top: 0;
  left: 0;
  background-color: $salad;
  font-size: 18px;
  padding: 0 4px;
  line-height: 40px;
  p {
    vertical-align: middle;
    display: inline-block;
    line-height: 1.5;
  }
}

.favorite-block {
  background-color: $yellow;
  top: 0;
  right: 0;
  width: 40px;
  height: 40px;
  border-radius: 5px;
  text-align: center;
  transition: all .3s;
}

.favorite-block:hover {
  background-color: $yellow-dirt;
}

.car-specs-wrapper {
  border: 1px solid $gray-550;
  .car-specs {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .car-spec-col {
    .label {
      font-size: 11px;
      line-height: 1.2;
      color: $gray-600;
    }
    .text {
      margin-top: -4px;
    }
  }
}

.car-another-specs {
  .country-flag {
    margin-right: 7px;
    max-height: 15px;
  }
}
</style>