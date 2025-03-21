
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'; 
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { createVuetify } from 'vuetify';

import { es } from 'vuetify/locale';
const vuetify = createVuetify({
  components,
  directives,
  locale:{
    locale:'es',
    messages:{es}
  }
});

export default vuetify;