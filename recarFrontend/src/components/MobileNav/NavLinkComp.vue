<template>
  <li
      class="pa-2 me-2 d-flex align-center justify-center position-relative mobile-nav-item"
      :class="{'router-link-exact-active': this.$route.name === name}"
  >
      <font-awesome-icon :icon="icon" />
      <p class="title ms-2 font-weight-medium">{{ title }}</p>
      <router-link :to="path" class="mobile-nav-link pa-0"></router-link>
  </li>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
  name: 'NavLinkComponent',
  props: {
    title: {
      type: String,
      required: true
    },
    icon: {
      type: String,
      required: true
    },
    path: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    }
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

li {
  text-align: center;
  min-width: 40px;
  list-style: none;
  border-radius: 8px;
  min-height: 38px;
}

.mobile-nav-item:not(.router-link-exact-active):hover {
  background-color: #424242;
  transition: all .2s;
}
li:not(.router-link-exact-active) p {
  display: none;
}
li:not(.router-link-exact-active) {
  color: white;
  background-color: $dark;
}
li.router-link-exact-active {
  pointer-events: none;
  cursor: default;
  color: $black;
  background-color: $yellow;
  padding-left: 1em !important;
  padding-right: 1em !important;
}

.mobile-nav-link {
  top: 0;
  left: 0;
  position: absolute;
  width: 100%;
  border-radius: 8px;
  height: 100%;
}
</style>