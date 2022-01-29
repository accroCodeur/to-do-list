<template>
    <div class="task-list">
        <b-form-datepicker v-model="value" locale="en"></b-form-datepicker>
        <TaskItem/>
    </div>
</template>


<script>
    import TaskItem from './TaskItem'
    import { inject, ref } from 'vue'
    import { onMounted, onUpdated, onUnmounted } from 'vue'


    import dayjs from 'dayjs'


    export default {
        name: 'TaskList',
        components: { TaskItem},

        setup(){
            const { tasks, getTasks} = inject("useTasks");
            let value = ref(null)

            console.log(dayjs('2022-01-02'))

            onMounted(() => {

            })
        }
    }

</script>
