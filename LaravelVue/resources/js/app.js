import './bootstrap';

import Swal from 'sweetalert2'
window.Swal=Swal
const toast=Swal.mixin({
    toast: true,
    position:"top-end",
    showConfirmButton:false,
    timer:3000
})

window.toast=toast;


import {createApp} from 'vue'
import App from './App.vue'
import router from "./routes";

createApp(App).use(router).mount("#app")


