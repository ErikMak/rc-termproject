<template>
  <div class="auth-background w-100">
    <div class="logo position-relative">
      <!--  Логотип компании  -->
      <v-img
          :height="25"
          position="left"
          src="../../src/assets/logo2.png"
      ></v-img>
      <router-link :to="{name: 'welcome'}" class="logo-link position-absolute"></router-link>
    </div>

    <div class="wrapper mx-auto" style="width: 90%; margin-top: 10vh">
      <transition name="fade">
        <div v-show="responseMsg" id="error-card" class="error-card mx-auto mb-3 px-5 py-3 rounded">
          {{ responseMsg }}
        </div>
      </transition>
      <SigninFormComponent v-if="form"
                           @changeForm="changeForm"
      />
      <SignupFormComponent v-else
                           @changeForm="changeForm"
      />
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import SignupFormComponent from "@/components/Auth-Forms/SignupFormComp.vue";
import SigninFormComponent from "@/components/Auth-Forms/SigninFormComp.vue";

interface State {
  form: boolean,
  responseMsg: string
}
export default defineComponent({
  name: "AuthView",
  components: {SigninFormComponent, SignupFormComponent},
  data: (): State => ({
    form: true,
    // Ошибки с бэкенда
    responseMsg: ''
  }),
  methods: {
    getResponseMessageFromChild(val: string) {
      this.responseMsg = val

      setTimeout(() => {
        this.responseMsg = '';
      }, 10000);
    },
    changeForm() {
      this.form = !this.form
    }
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';
@import '@/assets/mixins';

@include vue-transition;
@include vue-flip-transition;

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
.error-card {
  background: linear-gradient(to left, #ff6868, #ed6060);
  color: white;
}
</style>
