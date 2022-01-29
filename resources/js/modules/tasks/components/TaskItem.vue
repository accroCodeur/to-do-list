<template>
    <div class="task-item">
        <div class="primary-info row">
            <div class="col-sm-1"> <input type="checkbox"  :checked="item.status == 1" @change="setState(item)"> </div>
            <div class="col-sm-9"> <span>{{ item.todo_item }}</span> </div>
            <div class="col-sm-2 text-right action-column"> <i class="fas fa-ellipsis-h"></i> </div>
        </div>
        <div class="second-info">{{ dayjs(item.due_date).format('MM/DD/YYYY HH:MM:ss') }}</div>
    </div>
</template>


<script>

    import { inject, ref } from 'vue'
    import dayjs from 'dayjs';

    export default {

        props:{
            item: {
                type: Object,
                required: true
            }
        },

        setup(props){
            const {item} = props
            const { tasks, setStateTask} = inject("useTasks");

            const check = ref(false)

            const setState = async function (item){
                await setStateTask({id:item.id})
            }

            return{
                item, dayjs,setState
            }
        },
    }

</script>


<style lang="scss">
    .task-item{
        padding: 10px 0px;
    }

    .action-column{
        padding-top: 5px;
    }

</style>
