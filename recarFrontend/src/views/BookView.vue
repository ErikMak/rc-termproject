<template>
  <v-row>
    <v-col>
      <div id="book-page">
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
          <p class="text-h6">{{ car_name }}</p>
          <p style="font-size: 15px">{{ equip_name }}</p>
        </v-sheet>
        <v-sheet class="mt-3 px-4 py-3 price" rounded>
          <small>Стоимость</small>
          <p class="text-h5 text-price"><b class="font-weight-bold">{{cost}}&#8381;</b>/день</p>
        </v-sheet>
        <div class="mt-4">
          <v-date-input
              v-model="date_issue"
              label="Начало аренды"
              prepend-icon=""
              :min="minDate"
              :error-messages="errors.date_issue"
              @update:modelValue="calculate"
          >
          </v-date-input>
        </div>
        <div>
          <v-date-input
              v-model="date_return"
              label="Конец аренды"
              prepend-icon=""
              :min="minDate"
              :error-messages="errors.date_return"
              @update:modelValue="calculate"
          >
          </v-date-input>
        </div>
        <div class="mt-1">
          <p class="text-center">Количество людей в машине</p>
          <v-sheet class="px-4 py-2 d-flex justify-space-between align-center">
            <v-btn icon variant="tonal" @click="decrement">
              <font-awesome-icon
                  icon="fa-solid fa-minus"
                  size="lg"
                  style="color: black;"
              />
            </v-btn>
            <p class="text-h5">{{ peop_in_car }}</p>
            <v-btn icon variant="tonal" @click="increment">
              <font-awesome-icon
                  icon="fa-solid fa-plus"
                  size="lg"
                  style="color: black;"
              />
            </v-btn>
          </v-sheet>
        </div>
        <v-divider class="mb-5 mt-2"></v-divider>
        <div class="d-flex align-center justify-end">
          <b class="text-h5 font-weight-medium me-2">К оплате: </b>
          <b class="text-h5 font-weight-medium">{{total_cost}}&#8381;</b>
        </div>
        <div class="button-group mt-5">
          <v-btn @click="pay()"
                 block color="green"
                 class="mb-3"
                 size="large"
                 variant="elevated"
                 :loading="loading"
          >
            Оплатить
          </v-btn>
          <v-btn @click="abort" block color="red-darken-1" variant="outlined">
            Отменить
          </v-btn>
        </div>
      </div>
    </v-col>
  </v-row>
  <AIPredictDialogComponent :show-dialog="bookDialog.getShowDialog()"
                            @send-show-dialog="getValueFromChild"
  />
</template>

<script lang="ts">
import { defineComponent} from "vue";
import type {ReservationCoupleType} from "@/types/IReservationCouple";
import ApiCar from '@/common/cars'
import ApiEquip from '@/common/equipments'
import {mapGetters, mapMutations} from "vuex";
import Api from "@/common/reservation"
import type ResponseType from '@/types/IResponse'
import DataMixins from "@/mixins/DataMixins";
import {UseBookingValidation} from "@/mixins/BookingValidationMixins";
import {UseBookingDialog} from "@/mixins/BookingDialogMixins";
import {createErrorChain} from "@/services/ErrorHandler";
import AIPredictDialogComponent from "@/components/Dialog/AIPredictDialogComp.vue";

interface State {
  car: ReservationCoupleType
  total_cost: number
  date_issue: any
  date_return: any
  car_name: string
  equip_name: string
  cost: number
  peop_in_car: number,
  loading: boolean
}

export default defineComponent({
  name: 'CardComponent',
  components: {
    AIPredictDialogComponent
  },
  data: (): State => ({
    car: {
      model_id: '',
      equip_id: ''
    },
    total_cost: 0,
    date_issue: null,
    date_return:null,
    car_name: '',
    equip_name: '',
    peop_in_car: 0,
    cost: 0,
    loading: false,
  }),
  created() {
    window.scrollTo(0, 0)
    this.car = this.$store.getters['getReservationData']

    if(this.car.model_id) {
      // Подгрузка названий (лишняя загрузка?)
      ApiCar.getCarById({id: this.car.model_id}, (res: ResponseType) => {
        const car = res.data

        this.car_name = car.brand + ' ' + car.name
      }, (err: any) => {

      })

      ApiEquip.getEquipmentsById({id: this.car.model_id}, (res: ResponseType) => {
        const equipments = res.data

        const result = equipments.find(({ equip_id }) => equip_id === parseInt(this.car.equip_id))
        this.equip_name = result.name
        this.cost = result.price
      })
    } else {
      this.$router.push({name: 'catalog_all'})
    }
  },
  computed: {
    ...mapGetters(["getUserID"]),
    minDate() {
      return new Date(Date.now() - (24*60*60*1000)).toISOString()
    }
  },
  mixins: [DataMixins],
  methods: {
    ...mapMutations(['createReservation']),
    getValueFromChild(val: boolean) {
      this.bookDialog.getValueFromChild(val);
    },
    validate(callback: any) {
      let isDateReturnValid = this.bookValidation.checkDateReturn(this),
          isDateIssueValid = this.bookValidation.checkDateIssue(this)

      let isBookValid = isDateIssueValid && isDateReturnValid

      if(isBookValid) {
        let isIntervalValid = this.bookValidation.checkInterval(this)
        if (isIntervalValid) {
          callback()
        }
      }
    },
    pay() {
      this.validate(() => {
        this.loading = true

        Api.createReservation({
          model_id: this.car.model_id,
          equip_id: this.car.equip_id,
          date_issue: this.toIsoString(this.date_issue),
          date_return: this.toIsoString(this.date_return),
          total_cost: this.total_cost,
          peop_in_car: this.peop_in_car
        }, (res: ResponseType) => {
          this.$toastr.success(res.message)
          this.loading = false
          this.$router.push({name: 'catalog_all'})
        }, (err: any) => {
          if(err.response.status != undefined && err.response.status === 503) {
            console.info('оповещение системы безопасности')
            this.bookDialog.toggleDialog()
            this.loading = false
            throw new Error('ai_safety_error');
          }

          const properties = [
            'model_id', 'eqiup_id', 'date_issue', 'date_return', 'total_cost', 'peop_in_car'
          ]

          this.loading = false

          const errorHandler = createErrorChain(properties, (msg: string[]) => {
            this.$toastr.error(msg.pop())
          })

          errorHandler.handle(err)
        })
      })
    },
    increment() {
      this.peop_in_car++;
    },
    decrement() {
      if(this.peop_in_car > 0)
        this.peop_in_car--;
    },
    calculate() {
      this.validate(() => {
        let Difference_In_Time =
            this.date_return.getTime() - this.date_issue.getTime();

        let Difference_In_Days =
            Math.round
            (Difference_In_Time / (1000 * 3600 * 24));

        this.total_cost = Difference_In_Days * this.cost
      })
    },
    abort() {
      this.createReservation({
        equip_id: '',
        model_id: ''
      })

      this.$router.push({name: 'catalog_all'})
    }
  },
  setup() {
    const bookValidation = new UseBookingValidation()
    const bookDialog = new UseBookingDialog()

    return {
      bookValidation,
      bookDialog,
      errors: bookValidation.getErrors()
    }
  }
})
</script>

<style lang="scss">
@import '@/assets/toasts';
</style>

<style lang="scss" scoped>
@import '@/assets/theme';

#book-page {
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
}
</style>