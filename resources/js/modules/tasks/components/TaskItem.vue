<template>
    <div class="task-item">
        <div class="primary-info row">
            <div class="col-sm-2"> <input type="checkbox" name="" id="" onChange=""> </div>
            <div class="col-sm-8"> <span>Task name</span> </div>
            <div class="col-sm-2 text-right action-column"> <i class="fas fa-ellipsis-h"></i> </div>
        </div>
        <div class="second-info"></div>
    </div>
</template>


<script>

    import { inject, ref } from 'vue'

    export default {
        setup(){

        
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
