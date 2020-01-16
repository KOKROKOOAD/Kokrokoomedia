<template>

</template>

<script>
    import  store from  '../../vuex/store';

    export  default {
        name : 'sub',
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