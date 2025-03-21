<template>
  <v-card class="px-6 py-3">
    <h3 class="my-2">ReCar: войти в кабинет</h3>
    <v-form @submit.prevent="signinAction()" id="signin">
      <div class="text-subtitle-1 text-medium-emphasis">Логин</div>
      <v-text-field
          id="username"
          data-testid="username-text-field"
          density="compact"
          variant="outlined"
          placeholder="username"
          v-model="login"
          type="text"
          :error-messages="errors.login"
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
          data-testid="pass-text-field"
          id="password"
          density="compact"
          variant="outlined"
          placeholder="***"
          v-model="pass"
          type="password"
          :error-messages="errors.pass"
          required
      >
        <template v-slot:prepend-inner>
          <font-awesome-icon
              icon="fa-solid fa-lock"
              style="color: #8d8a8a;"
          />
        </template>
      </v-text-field>
      <p class="text-center mb-4">Нету аккаунта?<a class="text-blue"
                                                   href="#"
                                                   id="change-form"
                                                   @click.prevent="this.$emit('changeForm')"
      >Зарегистрироваться</a></p>
      <v-btn
          data-testid="auth-btn"
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
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {SigninFormType} from "@/types/ISigninForm";
import {UseSigninValidation} from "@/mixins/SigninValidationMixins";

const Component = defineComponent({
  name: 'SigninFormComponent',
  emits: ['sendResponseMsg', 'changeForm'],
  data: (): SigninFormType => ({
    login: '',
    pass: ''
  }),
  methods: {
    signinAction() {
      let isPasswordValid = this.signinValidation.checkPass(this),
          isLoginValid = this.signinValidation.checkLogin(this)

      let isFormValid = isLoginValid && isPasswordValid

      if(isFormValid) {
        console.log('biba')
      }
    }
  },
  setup() {
    const signinValidation = new UseSigninValidation()

    return {
      errors: signinValidation.getErrors(),
      signinValidation
    }
  }
})

export default Component
</script>

<style lang="scss" scoped>
@use 'FormStyles';
</style>