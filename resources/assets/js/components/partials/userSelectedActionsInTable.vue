<template>
  <div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-default" @click="showViewUserPage(true,false,selectedUserId)"><i class="fa fa-eye" ></i> </button>
    <button type="button" class="btn btn-info updbtn" @click="showUserUpdatePage(true,false,selectedUserId)"><i class="fa fa-edit"></i> </button>
    <button type="button" class="btn btn-danger delBtn"><i class="fa fa-trash"></i> </button>
  </div>
</template>

<script>
    import store from "../../vuex/store";

    export default {
        props : ['userId'],
        name: "userSelectedActionsInTable",
        data(){
            return{

            }
        },
        methods:{
            showViewUserPage(status,stat,id){
                 store.dispatch('showSingleUserPage',status);
                 store.dispatch('showUserTable',stat);
                 store.dispatch('viewSingleUser',id);
                return store.state.showSingleUserPage;
            },
            showUserUpdatePage(status,stat,id){
                store.dispatch('showUpdateUserPage',status);
                store.dispatch('showUserTable',stat);
                store.dispatch('viewSingleUser',id);
                return store.state.showUpdateUserPage;
            }

        },
        computed:{
            selectedUserId(){
                return this.userId;
            }

        }
    }
</script>

<style scoped>

</style>