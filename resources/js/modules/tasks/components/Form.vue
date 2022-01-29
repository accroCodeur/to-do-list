<template>
    <div class="form-container">
        <div class="row">
            <div class="col-sm-6">
                <input type="text" placeholder="Enter a task" class="task-input">
            </div>

            <div class="col-sm-6">
                <date-picker :dateChange="dateChange"></date-picker>
            </div>


        </div>
    </div>
</template>


<script>
    import DatePicker from '../../../components/Datepicker.vue'

    export default {
        components: { DatePicker },

        setup(){
            const dateChange = (value) =>{
                console.log('change', value)
            }

            return {
                dateChange
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
</style>
