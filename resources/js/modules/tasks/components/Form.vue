<template>
    <div class="form-container">
        <div class="row">
            <div class="col-sm-5">
                <input type="text" placeholder="Enter a task" class="task-input" v-model="form.wording">
            </div>

            <div class="col-sm-5">
                <date-picker :dateChange="dateChange"></date-picker>
            </div>

            <div class="col-sm-2 send-container">
                <span @click="sendTask" v-if="loading == false"> <i class="fas fa-paper-plane"> </i></span>
                <span v-else> <i class="fas fa-spinner"></i>  </span>
            </div>
        </div>
    </div>
</template>


<script>
    import dayjs from 'dayjs';
    import {  inject, reactive, ref } from 'vue'
    import DatePicker from '../../../components/Datepicker.vue'

    export default {
        components: { DatePicker },

        setup(){
            const { tasks, storeTask} = inject("useTasks");

            const loading = ref(false)

            const form = reactive({
                wording: null,
                due_date: null,
            });


            const dateChange =   (value) =>{
                form.due_date = dayjs(value.date).format('DD/MM/YYYY HH:MM:ss')
            }

            const sendTask = async function (){
                loading.value = true;
                console.log(loading.value)
                await storeTask({...form})
                loading.value = false;
            }

            return {
                dateChange , form, sendTask, loading
            }
        }
    }

</script>


<style lang="scss">
    .task-input{
        width: 100%;
        height: 36px;
        background-color: #343a40;
        color: #FFF;
        font-weight: bold;
        font-size: 15px;
        padding: 2px 12px;
    }

    .send-container{
        text-align: center;
        color: #a8aeae;
        font-size: 25px;

        span{
            cursor: pointer
        }
    }
</style>
