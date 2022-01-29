<template>
    <Datepicker v-model="date" @closed="change"></Datepicker>
</template>

<script>
    import { inject, ref } from 'vue'

    export default({

        props:{
            dateChange:{
                type: Function,
                require: true
            }
        },

        setup(props) {

            const {dateChange} = props

            let date = ref(null);

            const change = () => {
                dateChange(date)

            }

            return {
                date, change, dateChange
            }
        },
    })
</script>

<style lang="css">

.dp__theme_light {
    --dp-background-color: #343a40 !important;
    --dp-text-color: #FFF !important;
    --dp-hover-color: #f3f3f3;
    --dp-hover-text-color: #212121;
    --dp-hover-icon-color: #959595;
    --dp-primary-color: #1976d2;
    --dp-primary-text-color: #f8f5f5;
    --dp-secondary-color: #c0c4cc;
    --dp-border-color: none !important;
    --dp-border-color-hover: #aaaeb7;
    --dp-disabled-color: #f6f6f6;
    --dp-scroll-bar-background: #f3f3f3;
    --dp-scroll-bar-color: #959595;
    --dp-success-color: #76d275;
    --dp-success-color-disabled: #a3d9b1;
    --dp-icon-color: #959595;
    --dp-danger-color: #ff6f60;
    --dp-marker-color: #ff6f60;
    --dp-tooltip-color: #fafafa;
    --dp-disabled-color-text: #8e8e8e;
}

.dp__input {
  background-color: var(--dp-background-color);
  border-radius: 4px;
  font-family: -apple-system,blinkmacsystemfont,"Segoe UI",roboto,oxygen,ubuntu,cantarell,"Open Sans","Helvetica Neue",sans-serif;
  border: 1px solid var(--dp-border-color);
  outline: none;
  transition: border-color .2s cubic-bezier(0.645, 0.045, 0.355, 1);
  width: 100%;
  font-size: 13px !important;
  line-height: 1.5rem;
  padding: 6px 12px;
  padding-left: 12px;
  color: var(--dp-text-color);
  box-sizing: border-box;
  font-weight: bold;
}
</style>

