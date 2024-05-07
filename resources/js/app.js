import './bootstrap';
import * as bootstrap from 'bootstrap'
import './bootstrap';

 // Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';

import criterisView from '../components/criterisView.vue';
import modul from '../components/inscripcioModulsView.vue'
 // Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';
import { createApp } from 'vue';    

createApp(criterisView).mount('#alumnesCriteris');
createApp(modul).mount('#modul');