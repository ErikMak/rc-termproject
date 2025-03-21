/* eslint-disable */
import { ComponentCustomProperties } from 'vue'
import { Toastr } from './plugins/toastr';

declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $toastr: Toastr;
  }
}