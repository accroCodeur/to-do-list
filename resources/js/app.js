require('./bootstrap');

import { createApp } from 'vue'
import TaskManager from './modules/tasks/Index.vue'

const app = createApp({})

app.component('task-manager', TaskManager)

app.mount('#app')