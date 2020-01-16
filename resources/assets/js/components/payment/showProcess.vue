<template>
    <div   class="card" style="position : absolute;z-index: 99;top:25em;left:460px;padding-left:5px;padding-right:5px;background:transparent">
        <span style="font-size:16px;"><img src="/images/loading.gif" style="height: 20px;width: 20px;"> Processing please wait.....</span>
    </div>

</template>


<script>
    import  store from  '../../vuex/store';
    export default {
        name: "showProcessing",

        data(){
            return {

            }
        },
        mounted(){

        },
        methods: {



        },
        computed:{
            getProcessStatus(){
              return  store.state.processing;
            }

        },

    }




</script>