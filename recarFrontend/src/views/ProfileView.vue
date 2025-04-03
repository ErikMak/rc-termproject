<template>
  <TitleComponent title="Профиль"/>
  <div class="d-flex align-center mt-3">
    <p class="text-h6 me-1">{{ getUserLogin }}</p>
    <a class="text-subtitle-1 text-decoration-underline" @click.prevent="logout()">выйти</a>
  </div>
  <v-sheet class="bg-balance pa-4 rounded my-3">
    <p>Баланс</p>
    <b class="text-h5">{{ getUserBalance }}&#160;&#8381;</b>
  </v-sheet>
  <v-divider class="my-4"></v-divider>
  <div>
    <p class="text-h6 my-2">Персональные данные</p>
    <v-select
        v-model="gender"
        :items="['Мужской', 'Женский']"
        :error-messages="errors.gender"
        label="Пол водителя"
    ></v-select>
    <v-form>
      <v-text-field
          label="Стаж вождения"
          :error-messages="errors.exp"
          v-model="exp"
      >
      </v-text-field>
      <v-btn block flat class="save-button text-subtitle-1 mt-3"
             color='blue-accent-2'
             @click="save()"
      >Сохранить</v-btn>
    </v-form>
  </div>
</template>

<script lang="ts">
import TitleComponent from "@/components/Title/TitleComp.vue";
import { defineComponent } from "vue";
import {mapActions, mapGetters} from "vuex";
import UserService from "@/services/UserService";
import type {ResponseType} from "@/types/IResponse";
import {UseUserDataValidation} from "@/mixins/UserDataValidationMixins";
import Api from '@/common/user'
import {createErrorChain} from "@/services/ErrorHandler";
import type {UserDataType} from "@/types/IUserData";
import CookieService from "@/services/CookieService";

interface State {
  exp: string
  gender: string
}

export default defineComponent({
  name: "CarView",
  data: (): State => ({
    exp: '',
    gender: ''
  }),
  components: {
    TitleComponent
  },
  methods: {
      ...mapActions(["checkLoggedStatus"]),
      validate(callback: any) {
        let isGenderValid = this.userDataValidation.checkGender(this),
            isExpValid = this.userDataValidation.checkExp(this)

        let isFormValid = isGenderValid && isExpValid

        if(isFormValid) {
          callback()
        }
      },
      save() {
        this.validate(() => {
          const exp = parseInt(this.exp)
          const gender: boolean = this.gender == 'Женский'

          Api.updateUserData({
            exp: exp,
            gender: gender
          }, (res: ResponseType) => {
            // Обновление cookie userData
            CookieService.setCookie('user', JSON.stringify(res.data),
              parseInt(import.meta.env.VITE_VUE_APP_COOKIE_LIFETIME))

            this.$toastr.info(res.message)
          }, (err: any) => {
            const properties = [
              'exp', 'gender',
            ]

            const errorHandler = createErrorChain(properties, (msg: string[]) => {
              this.$toastr.error(msg.pop())
            })

            errorHandler.handle(err)
          })
        })
      },
      logout() {
        UserService.logout().then(() => {
          this.checkLoggedStatus()
          this.$router.go(0)
        })
      }
  },
  computed: {
    ...mapGetters(["getLoggedStatus", "getUserLogin", "getUserData"]),
    getUserBalance() {
      const data : UserDataType = this.getUserData
      return data.balance
    }
  },
  created() {
    const data : UserDataType = this.getUserData

    if(data.exp != null) {
      this.exp = data.exp.toString()
      this.gender = data.gender ? "Женский" : "Мужской"
    }
  },
  setup() {
    const userDataValidation = new UseUserDataValidation()

    return {
      userDataValidation,
      errors: userDataValidation.getErrors()
    }
  }
})
</script>

<style lang="scss">
@import '@/assets/toasts';
</style>

<style lang="scss" scoped>
@import '@/assets/theme';
@import '@/assets/mixins';

.save-button {
  min-height: 46px;
  text-align: center;
  width: 100%;
}

a {
  pointer-events: all;
  cursor: pointer;
  color: $blue;
}

.bg-balance {
  color: white;
  background-image: url("@/assets/noise-back.jpg");
  background-position-y: 80%;
  background-size: cover;
}
</style>