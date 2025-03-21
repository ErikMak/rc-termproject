/* eslint-disable */
import { ComponentCustomProperties } from 'vue'
import Axios from './plugins/axios';

declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $axios: Axios;
  }
}