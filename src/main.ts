import { createApp } from 'vue'
import 'primeicons/primeicons.css'
import './style.css'
import App from './App.vue'
import router from './router'
import { setupPrimeVue } from './plugins/primevue'

const app = createApp(App)
setupPrimeVue(app)
app.use(router)
app.mount('#app')
