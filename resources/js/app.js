import { createApp } from 'vue'
import TaskManager from './modules/tasks/Index'

import Datepicker from 'vue3-date-time-picker';
import 'vue3-date-time-picker/dist/main.css'

import '../scss/main.scss'

const app = createApp({})

app.component('task-manager', TaskManager)
app.component('Datepicker', Datepicker)

app.mount('#app')