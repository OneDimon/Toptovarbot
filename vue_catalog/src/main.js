import { createApp} from 'vue'
import App from './App.vue'
import router from './router'

const app = createApp(App)
// Подключаем роутер к приложению
app.use(router)

app.mount('#app')
