<template>
  <div class="background w-100">
    <div class="wrapper mx-auto" style="width: 90%; margin-top: 10vh">
<!--   ФОРМА ВХОДА   -->
      <v-card v-show="form == 1" class="px-6 py-3">
        <h3 class="my-2">ReCar: войти в кабинет</h3>
        <v-form @submit.prevent="auth()" id="signin">
          <div class="text-subtitle-1 text-medium-emphasis">Логин</div>
          <v-text-field
              density="compact"
              variant="outlined"
              placeholder="username"
              v-model="signinForm.login"
              required
          >
            <template v-slot:prepend-inner>
              <font-awesome-icon
                  icon="fa-solid fa-user"
                  style="color: #8d8a8a;"
              />
            </template>
          </v-text-field>

          <div class="text-subtitle-1 text-medium-emphasis">Пароль</div>
          <v-text-field
              density="compact"
              variant="outlined"
              placeholder="***"
              v-model="signinForm.password"
              required
          >
            <template v-slot:prepend-inner>
              <font-awesome-icon
                  icon="fa-solid fa-lock"
                  style="color: #8d8a8a;"
              />
            </template>
          </v-text-field>
          <p class="text-center mb-4">Нету аккаунта?<a class="text-blue" @click.prevent="(form = 0)" href="#">Зарегистрироваться</a></p>
          <v-btn
              type="submit"
              class="mb-3 auth-button"
              size="large"
              variant="flat"
              block
          >
            Войти
          </v-btn>
        </v-form>
      </v-card>
<!--   ФОРМА РЕГИСТРАЦИИ   -->
      <v-card class="px-6 py-3" v-show="form == 0">
        <h3 class="my-2">ReCar: регистрация</h3>
        <v-form @submit.prevent="register()" id="signup">
          <div class="text-subtitle-1 text-medium-emphasis">Логин</div>
          <v-text-field
              density="compact"
              variant="outlined"
              placeholder="username"
              :error-messages="loginError"
              v-model="signupForm.login"
              required
          >
            <template v-slot:prepend-inner>
              <font-awesome-icon
                  icon="fa-solid fa-user"
                  style="color: #8d8a8a;"
              />
            </template>
          </v-text-field>

          <div class="text-subtitle-1 text-medium-emphasis">Пароль</div>
          <v-text-field
              density="compact"
              variant="outlined"
              placeholder="***"
              :error-messages="passwordError"
              v-model="signupForm.password"
              required
          >
            <template v-slot:prepend-inner>
              <font-awesome-icon
                  icon="fa-solid fa-lock"
                  style="color: #8d8a8a;"
              />
            </template>
          </v-text-field>

          <div class="text-subtitle-1 text-medium-emphasis">Повтор пароля</div>
          <v-text-field
              density="compact"
              variant="outlined"
              placeholder="***"
              required
              :error-messages="repeatPasswordError"
              v-model="signupForm.repeat_password"
          >
            <template v-slot:prepend-inner>
              <font-awesome-icon
                  icon="fa-solid fa-lock"
                  style="color: #8d8a8a;"
              />
            </template>
          </v-text-field>
          <p class="text-center mb-4">Уже есть аккаунт?<a class="text-blue" href="#" @click.prevent="(form = 1)">Войти</a></p>
          <v-btn
              class="mb-3 auth-button"
              size="large"
              type="submit"
              variant="flat"
              block
          >
            Регистрация
          </v-btn>
        </v-form>
      </v-card>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AuthService from "@/services/AuthService";
import {mapActions} from "vuex";

interface State {
  form: number,
  signupForm: {
    login: string,
    password: string,
    repeat_password: string
  },
  signinForm: {
    login: string,
    password: string,
  },
  loginError: string,
  passwordError: string,
  repeatPasswordError: string
}
export default defineComponent({
  name: "AuthView",
  data: (): State => ({
    form: 1,
    signupForm: {
      login: '',
      password: '',
      repeat_password: ''
    },
    signinForm: {
      login: '',
      password: '',
    },
    repeatPasswordError: '',
    loginError: '',
    passwordError: ''
  }),
  methods: {
    ...mapActions(["checkLoggedStatus"]),
    checkLogin() {
      // const rv_username = /^(?=.{1,30}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/;
      const rv_username = /$/
      let valid = false

      if(this.signupForm.login != '' && rv_username.test(this.signupForm.login)) {
        this.loginError = ''
        valid = true
      } else {
        this.loginError = 'Некорректный логин'
      }

      return valid
    },
    checkPassword() {
      // const rv_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,30}$/;
      const rv_password = /$/
      let valid = false

      if(this.signupForm.password != '' && rv_password.test(this.signupForm.password)) {
        this.passwordError = ''
        valid = true
      } else {
        this.passwordError = 'Некорректный пароль'
      }

      return valid
    },
    checkRepeatPassword() {
      let valid = false

      if(this.signupForm.password == this.signupForm.repeat_password && this.signupForm.password) {
        this.repeatPasswordError = ''
        valid = true
      } else {
        this.repeatPasswordError = 'Повторите пароль'
      }

      return valid
    },
    auth() {
      AuthService.login({
        login: this.signinForm.login,
        password: this.signinForm.password
      }).then(() => {
        this.checkLoggedStatus()
      })
    },
    register() {
      let isPasswordValid = this.checkPassword(),
          isLoginValid = this.checkLogin(),
          isRepeatPasswordValid = this.checkRepeatPassword()

      let isFormValid = isLoginValid && isPasswordValid && isRepeatPasswordValid

      if(isFormValid) {
      //   РЕГИСТРАЦИЯ
      }
    }
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

.auth-button {
  min-height: 46px;
  text-align: center;
  width: 100%;
  background-color: $yellow;
}

.background {
  background-image: url("../src/assets/back-auth.jpg");
  background-size: cover;
}

</style>
