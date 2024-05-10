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
          <p class="text-h5 text-price"><b class="font-weight-bold">${{cost}}</b>/день</p>
        </v-sheet>
        <div class="mt-4">
          <v-date-input
              v-model="date_issue"
              label="Начало аренды"
              prepend-icon=""
              :min="new Date(Date.now() - (24*60*60*1000)).toISOString()"
              :error-messages="date_issue_error"
              @update:modelValue="calculate"
          >
          </v-date-input>
        </div>
        <div>
          <v-date-input
              v-model="date_return"
              label="Конец аренды"
              prepend-icon=""
              :min="new Date(Date.now() - (24*60*60*1000)).toISOString()"
              :error-messages="date_return_error"
              @update:modelValue="calculate"
          >
          </v-date-input>
        </div>
        <v-divider class="mb-5"></v-divider>
        <div class="d-flex align-center justify-end">
          <b class="text-h5 font-weight-medium me-2">К оплате: </b>
          <b class="text-h5 font-weight-medium">{{total_cost}}$</b>
        </div>
        <div class="button-group mt-5">
          <v-btn @click="pay" block color="green" class="mb-3" size="large" variant="elevated">
            Оплатить
          </v-btn>
          <v-btn @click="abort" block color="red-darken-1" variant="outlined">
            Отменить
          </v-btn>
        </div>
      </div>
    </v-col>
  </v-row>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import type {ReservationCoupleType} from "@/types/IReservationCouple";
import ApiCar from '@/common/cars'
import toasts from "toastr";
import ApiEquip from '@/common/equipments'
import {mapGetters, mapMutations} from "vuex";
import Api from "@/common/reservation"

interface State {
  car: ReservationCoupleType
  total_cost: number
  date_issue: any
  date_return: any
  car_name: string
  equip_name: string
  cost: number
  date_issue_error: string
  date_return_error: string
}

export default defineComponent({
  name: 'CardComponent',
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
    cost: 0,
    date_issue_error: '',
    date_return_error: ''
  }),
  created() {
    window.scrollTo(0, 0)
    this.car = this.$store.getters['getReservationData']

    if(this.car.model_id) {
      // Подгрузка названий (лишняя загрузка?)
      ApiCar.getCarById({id: this.car.model_id}, (res: Response) => {
        const car = res.data

        this.cost = parseFloat(car.price)
        this.car_name = car.brand + ' ' + car.name
      })
      ApiEquip.getEquipmentsById({id: this.car.model_id}, (res: Response) => {
        const equipments = res.data

        const result = equipments.find(({ equip_id }) => equip_id === parseInt(this.car.equip_id))
        this.equip_name = result.name
      })
    } else {
      this.$router.push('/catalog')
    }
  },
  computed: {
    ...mapGetters(["getUserID"])
  },
  methods: {
    ...mapMutations(['createReservation']),
    toIsoString(date: any) {
      var tzo = -date.getTimezoneOffset(),
          dif = tzo >= 0 ? '+' : '-',
          pad = function(num: any) {
            return (num < 10 ? '0' : '') + num;
          };

      return date.getFullYear() +
          '-' + pad(date.getMonth() + 1) +
          '-' + pad(date.getDate()) +
          'T' + pad(date.getHours()) +
          ':' + pad(date.getMinutes()) +
          ':' + pad(date.getSeconds()) +
          dif + pad(Math.floor(Math.abs(tzo) / 60)) +
          ':' + pad(Math.abs(tzo) % 60);
    },
    checkDateIssue() {
      let valid = false

      if(this.date_issue == null) {
        this.date_issue_error = 'Укажите дату начала аренды'
      } else {
        valid = true
        this.date_issue_error = ''
      }

      return valid
    },
    checkDateReturn() {
      let valid = false

      if(this.date_return == null) {
        this.date_return_error = 'Укажите дату окончания аренды'
      } else {
        valid = true
        this.date_return_error = ''
      }

      return valid
    },
    checkInterval() {
      let valid = false

      if(this.date_return - this.date_issue <= 0) {
        this.date_issue_error = 'Некорректный диапазон'
        this.date_return_error = 'Некорректный диапазон'
      } else {
        this.date_return_error = ''
        this.date_issue_error = ''
        valid = true
      }

      return valid
    },
    pay() {
      let isDateReturnValid = this.checkDateReturn(),
          isDateIssueValid = this.checkDateIssue()

      let isBookValid = isDateIssueValid && isDateReturnValid

      if(isBookValid) {
        let isIntervalValid = this.checkInterval()
        if(isIntervalValid) {
          const user_id = this.getUserID

          Api.createReservation({
            user_id: user_id,
            model_id: this.car.model_id,
            equip_id: this.car.equip_id,
            date_issue: this.toIsoString(this.date_issue),
            date_return: this.toIsoString(this.date_return),
            total_cost: this.total_cost
          }, (res: Response) => {
            toasts.success(res.message)
            this.$router.push('/catalog')
          }, (err: any) => {
            toasts.error(err.error)
          })
        }
      }
    },
    calculate() {
      let isDateReturnValid = this.checkDateReturn(),
          isDateIssueValid = this.checkDateIssue()

      let isBookValid = isDateIssueValid && isDateReturnValid

      if(isBookValid) {
        let isIntervalValid = this.checkInterval()
        if(isIntervalValid) {
          let Difference_In_Time =
              this.date_return.getTime() - this.date_issue.getTime();

          let Difference_In_Days =
              Math.round
              (Difference_In_Time / (1000 * 3600 * 24));

          this.total_cost = Difference_In_Days * this.cost
        }
      }
    },
    abort() {
      this.createReservation({
        equip_id: '',
        model_id: ''
      })

      this.$router.push('/catalog')
    }
  }
})
</script>

<style lang="scss">
@import '@/assets/theme';
@import 'toastr';

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