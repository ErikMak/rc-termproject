<template>
<v-card class="px-6 py-3">
  <h3 class="my-2">ReCar: регистрация</h3>
  <v-form @submit.prevent="signupAction()" id="signup">
    <div class="text-subtitle-1 text-medium-emphasis">Логин</div>
    <v-text-field
        data-testid="username-text-field"
        density="compact"
        variant="outlined"
        placeholder="username"
        id="username"
        type="text"
        :error-messages="errors.login"
        v-model="login"
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
        density="compact"
        variant="outlined"
        type="password"
        id="password"
        placeholder="***"
        :error-messages="errors.pass"
        v-model="pass"
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
        data-testid="confirm-pass-text-field"
        density="compact"
        variant="outlined"
        placeholder="***"
        type="password"
        id="confirm-pass"
        required
        :error-messages="errors.confirm_pass"
        v-model="confirm_pass"
    >
      <template v-slot:prepend-inner>
        <font-awesome-icon
            icon="fa-solid fa-lock"
            style="color: #8d8a8a;"
        />
      </template>
    </v-text-field>
    <p class="text-center mb-4">Уже есть аккаунт?<a
        class="text-blue"
        href="#"
        id="change-form"
        @click.prevent="this.$emit('changeForm')"
    >Войти</a></p>
    <v-btn
        data-testid="auth-btn"
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
</template>


<script lang="ts">
import {defineComponent} from "vue";
import type {SignupFormType} from "@/types/ISignupForm";
import {UseSignupValidation} from "@/mixins/SignupValidationMixins";

export default defineComponent({
  name: 'SignupFormComponent',
  emits: ['sendResponseMsg', 'changeForm'],
  data: (): SignupFormType => ({
    login: '',
    pass: '',
    confirm_pass : ''
  }),
  methods: {
    signupAction() {
      let isLoginValid = this.signupValidation.checkLogin(this),
          isPassValid = this.signupValidation.checkPass(this),
          isConfirmPassValid = this.signupValidation.checkConfirmPass(this)

      let isFormValid = isLoginValid && isPassValid && isConfirmPassValid

      console.log(isFormValid)
    }
  },
  setup() {
    const signupValidation = new UseSignupValidation()

    return {
      errors: signupValidation.getErrors(),
      signupValidation
    }
  }
})
</script>

<style lang="scss" scoped>
@use 'FormStyles';
</style>