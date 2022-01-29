import { ref } from "vue";
import axios from "axios";

//export default function useBanks() {
const tasks = ref([]);
const prefixe = 'api';

const getTasks = async(datas) => {
    try {
        let { data: response } = await axios.post(prefixe + '/task/index', datas);
        tasks.value = response.data.body.tasks
    } catch (e) {
        console.log('error', e.message)
    }
}

const storeBank = async(datas) => {
    try {
        await axios.post(prefixe + '/tasks/store', datas)
        await getBanks()
    } catch (e) {
        console.log('error, e.message')
    }
}


const updateBank = async(datas) => {
    try {
        await axios.post(prefixe + '/bank/update', datas)
        await getBanks()
    } catch (e) {
        console.log('error, e.message')
    }
}

const deleteBank = async(datas) => {
    try {
        await axios.post(prefixe + '/bank/delete', datas)
        await getBanks()
    } catch (e) {
        console.log('error, e.message')
    }
}

const searchBank = async(datas) => {
    try {
        let { data: response } = await axios.post(prefixe + '/bank/show', datas)
        return response;
    } catch (e) {
        console.log('error, e.message')
    }
}

getTasks();


export default {
    tasks,
    getTasks,
    storeBank,
    searchBank,
    updateBank,
    deleteBank
}