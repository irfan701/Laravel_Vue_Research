//import './assets/main.css'
import Vue from 'vue'
import VueProgressBar from 'vue-progressbar'





import { createApp} from 'vue'
import App from './App.vue'
import router from "./routes";



const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
}

Vue.use(VueProgressBar, options)
createApp(App).use(router).mount('#app')


