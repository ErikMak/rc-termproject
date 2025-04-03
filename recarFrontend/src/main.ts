import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from './plugins/axios'
import vuetify from './plugins/vuetify'
import toastr from './plugins/toastr'
import store from './store'
import setupInterceptors from './plugins/axiosInterceptors'

// Font Awesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas)
library.add(far)
library.add(fab)

const app = createApp(App)
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(router)
app.use(vuetify)
app.use(store)

setupInterceptors()

app.config.globalProperties.$axios = axios;
app.config.globalProperties.$toastr = toastr;
app.mount('#app')
