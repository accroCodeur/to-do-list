import { ref } from "vue";
import axios from "axios";

//export default function useTasks() {
const tasks = ref([]);
const prefixe = 'api';

const getTasks = async(datas) => {
    try {
        let response = await axios.post(prefixe + '/task/index', datas);
        tasks.value = response.data.body.tasks
    } catch (e) {
        console.log('error', e.message)
    }
}

const storeTask = async(datas) => {
    try {
        await axios.post(prefixe + '/tasks/store', datas)
        await getTasks()
    } catch (e) {
        console.log('error, e.message')
    }
}

const setStateTask = async(datas) => {
    try {
        await axios.post(prefixe + '/tasks/set-state', datas)
        await getTasks()
    } catch (e) {
        console.log('error, e.message')
    }
}


const updateTask = async(datas) => {
    try {
        await axios.post(prefixe + '/task/update', datas)
        await getTasks()
    } catch (e) {
        console.log('error, e.message')
    }
}

const deleteTask = async(datas) => {
    try {
        await axios.post(prefixe + '/task/delete', datas)
        await getTasks()
    } catch (e) {
        console.log('error, e.message')
    }
}

const searchTask = async(datas) => {
    try {
        let { data: response } = await axios.post(prefixe + '/task/show', datas)
        return response;
    } catch (e) {
        console.log('error, e.message')
    }
}

getTasks();


export default {
    tasks,
    getTasks,
    storeTask,
    searchTask,
    updateTask,
    deleteTask,
    setStateTask
}