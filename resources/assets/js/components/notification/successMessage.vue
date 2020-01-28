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
                         title: "Delete successful",
                         type: "success",
                         text:  message,
                         desktop: {
                             desktop: true,
                             icon: "assets/images/pnotify/success.png"
                         }
                     });
                 }



            }
        }
    }
</script>

<style scoped>

</style>