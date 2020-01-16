<template>
     <!--Pre-loader start-->
    <div class="loader animation-start" style="padding-top: 450px;padding-right:100px;">
        <span class="circle delay-1 size-2"></span>
        <span class="circle delay-2 size-4"></span>
        <span class="circle delay-3 size-6"></span>
        <span class="circle delay-4 size-7"></span>
        <span class="circle delay-5 size-7"></span>
        <span class="circle delay-6 size-6"></span>
        <span class="circle delay-7 size-4"></span>
        <span class="circle delay-8 size-2"></span>
    </div>

</template>

<script>
    import  store from  '../../vuex/store';

    export  default {
        name : 'preLoader',
        data() {
            return {}
        },
        methods:{

            },
        computed:{
                processing(){
                    return store.state.processing;
                }
        }

    }
</script>