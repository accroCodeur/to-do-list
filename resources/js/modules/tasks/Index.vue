<template>
    <div class="task-container">
        <Header/>
        <TaskForm/>
        <TaskList/>
    </div>
</template>


<script>
    import Header from './components/Header'
    import TaskForm from './components/Form'
    import TaskList from './components/List'

    export default {
        name: 'TaskManager',
        components:{
            Header, TaskForm, TaskList
        }
    }

</script>
