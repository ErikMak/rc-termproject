import {createVuetify} from "vuetify";

import 'vuetify/styles'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import * as labsComponents from 'vuetify/labs/components'

import { ru, en } from 'vuetify/locale'

export default createVuetify({
    components: {
        ...components,
        ...labsComponents,
        ...directives,
    },
    locale: {
        locale: 'ru',
        fallback: 'ru',
        messages: { en, ru }
    }
})