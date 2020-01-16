<template>
    
</template>

<script>
    export default {
        name: "infoPanel",
        props:['message'],
        data(){
         return{

         }
    },
        mounted(){
            this.feedback(this.message);
        },
    methods:{
        feedback(message){
            if(message !== ''){
                // PNotify.desktop.permission();
                (new PNotify( {
                        title:'Notifications', type:'success', text:this.message, desktop: {
                            desktop: true, icon: 'assets/images/pnotify/success.png'
                        }
                    }
                ));
            }
        }
    },
    computed:{

    }
    }
</script>

<style scoped>

</style>