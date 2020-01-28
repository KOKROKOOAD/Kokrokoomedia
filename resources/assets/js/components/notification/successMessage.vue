<template>
    
</template>

<script>
    export default {
        props : ['message'],
        name: "successMessage",
        data(){
           return{

           }
        },
        mounted() {
            this.successMessage(this.message);
        },
        methods :{
            successMessage(message){
                 if(message !== ''){
                     new PNotify({
                         title: "Payment successful",
                         type: "info",
                         text:  message,
                         desktop: {
                             desktop: true,
                             icon: "assets/images/pnotify/info.png"
                         }
                     });
                 }



            }
        }
    }
</script>

<style scoped>

</style>