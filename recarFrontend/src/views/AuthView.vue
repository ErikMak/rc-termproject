<template>
  <div class="auth-background w-100">
    <div class="logo position-relative">
      <!--  Логотип компании  -->
      <v-img
          :height="25"
          position="left"
          src="../../src/assets/logo2.png"
      ></v-img>
      <router-link to="/" class="logo-link position-absolute"></router-link>
    </div>

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
              :error-messages="signinForm.loginError"
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
              :error-messages="signinForm.passwordError"
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
              id="auth-button"
              class="mb-3"
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
              :error-messages="signupForm.loginError"
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
              :error-messages="signupForm.passwordError"
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
              :error-messages="signupForm.repeatPasswordError"
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
              id="auth-button"
              class="mb-3"
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
import toasts from "toastr";

interface State {
  form: number,
  signupForm: {
    login: string
    password: string
    repeat_password: string
    loginError: string
    passwordError: string
    repeatPasswordError: string
  },
  signinForm: {
    login: string
    password: string
    loginError: string
    passwordError: string
  },
}
export default defineComponent({
  name: "AuthView",
  data: (): State => ({
    form: 1,
    signupForm: {
      login: '',
      password: '',
      repeat_password: '',
      repeatPasswordError: '',
      loginError: '',
      passwordError: ''
    },
    signinForm: {
      login: '',
      password: '',
      loginError: '',
      passwordError: ''
    },
  }),
  methods: {
    ...mapActions(["checkLoggedStatus"]),
    checkLogin() {
      const rv_username = /^(?=.{1,30}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/;
      let valid = false

      if(this.signupForm.login != '' && rv_username.test(this.signupForm.login)) {
        this.signupForm.loginError = ''
        valid = true
      } else {
        this.signupForm.loginError = 'Некорректный логин'
      }

      return valid
    },
    checkPassword() {
      const rv_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,30}$/;
      let valid = false

      if(this.signupForm.password != '' && rv_password.test(this.signupForm.password)) {
        this.signupForm.passwordError = ''
        valid = true
      } else {
        this.signupForm.passwordError = 'Некорректный пароль'
      }

      return valid
    },
    checkRepeatPassword() {
      let valid = false

      if(this.signupForm.password == this.signupForm.repeat_password && this.signupForm.password) {
        this.signupForm.repeatPasswordError = ''
        valid = true
      } else {
        this.signupForm.repeatPasswordError = 'Повторите пароль'
      }

      return valid
    },
    checkLoginIsNull() {
      let valid = false

      if(this.signinForm.login != '') {
        this.signinForm.loginError = ''
        valid = true
      } else {
        this.signinForm.loginError = 'Поле не может быть пустым'
      }

      return valid
    },
    checkPasswordIsNull() {
      let valid = false

      if(this.signinForm.password != '') {
        this.signinForm.passwordError = ''
        valid = true
      } else {
        this.signinForm.passwordError = 'Поле не может быть пустым'
      }

      return valid
    },
    auth() {
      let isPasswordValid = this.checkPasswordIsNull(),
          isLoginValid = this.checkLoginIsNull();

      let isFormValid = isPasswordValid && isLoginValid;

      if(isFormValid) {
        AuthService.login({
          login: this.signinForm.login,
          password: this.signinForm.password
        }).then(() => {
          this.checkLoggedStatus()
          this.$router.push('/')
        }).catch(err => {
          toasts.error(err.response.data.error);
        })
      }
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

<style lang="scss">
@import '@/assets/theme';
@import 'toastr';

#auth-button {
  min-height: 46px;
  text-align: center;
  width: 100%;
  background-color: $yellow;
}

.auth-background {
  background-image: url("@/assets/back-auth.jpg");
  background-size: cover;
  .logo {
    top: 5%;
    left: 7%;
  }
  .logo-link {
    top: 0;
    max-width: 86px;
    width: 100%;
    height: 100%;
  }
}

</style>
