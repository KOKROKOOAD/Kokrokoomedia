<template>
  <div  class="btn-group btn-group-sm" id="user-control" style="margin-left: 11em;">
    <button type="button" class="btn btn-outline" id="act-user" @click="activateAdmin"><i class="fa fa-circle-o-notch text-dark"></i> Activate account</button>
    <button type="button" class="btn btn-outline" @click="deactivateAdmin"> <i class="fa fa-circle-o text-danger"> </i> block account </button>
    <button type="button" class="btn btn-outline" id="act-users" @click="activateAdmin"><i class="fa fa-check text-dark"></i> unblock account</button>
    <button type="button" class="btn btn-outline"><i class="fa fa-envelope"></i> Send Message</button>
    <!--<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> </button>-->
  </div>
</template>

<script>
    import  store from  '../../vuex/store';
    import  infoPanel from '../infoPanel/infoPanel'
    export default {

        name: "userSelectActions",
        props: ['ids','actUrl','deacUrl'],
        components:{
          infoPanel
        },
        data(){
            return{

            }
        },

        methods:{
            activateAdmin(){
                let self = this;
                sweetAlert({
                    title: 'Activate user',
                    text: 'Do you want to activate this user',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonTt: 'Yes, Activate',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,
                    //showLoaderOnConfirm: true,
                },function(){
                       // display updating notification on the info panel when activating the user
                    store.dispatch('displayMsg','updating user...');
                    store.dispatch('animatePanel', 'animated fadeInDown');
                    axios.post(self.getActUrl,{id:self.getIds}).then(function(res){
                        if(res.status === 200){
                            store.dispatch('fetchUsers');
                            store.dispatch('displayMsg','User successfully updated');
                            store.dispatch('showInfoPanel',true);
                             setTimeout(function () {
                                 store.dispatch('animatePanel', 'animated fadeOutUp');
                                  // store.dispatch('showInfoPanel',false);
                             },4000);


                        }
                    }).catch(function (res) {
                        console.log(res);
                    });
                });
            },
            deactivateAdmin(){
                let self = this;
                sweetAlert({
                    title: 'Deactivate user',
                    text: 'Do you want to deactivate this user',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Deactivate',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,
                    //showLoaderOnConfirm: true,
                },function(){
                    store.dispatch('displayMsg','updating user...');
                    store.dispatch('animatePanel', 'animated fadeInDown');
                    axios.post(self.getDeactUrl,self.getIds).then(function(res){
                        if(res.status === 200){
                            // self.deactive(admin);

                               // store.dispatch('fetchAdmins');
                              //  store.dispatch('fetchUsers');
                                store.dispatch('fetchNewUsers');
                            //    store.dispatch('fetchNewUsers');



                            store.dispatch('displayMsg','user successfully updated');
                            store.dispatch('showInfoPanel',true);
                            setTimeout(function () {
                                store.dispatch('animatePanel', 'animated fadeOutUp');
                              //  store.dispatch('showInfoPanel',false);
                            },4000);
                        }
                    }).catch(function (e) {
                        console.log(e);
                    });
                });
            },
        },
        computed:{
            getIds(){
                return store.state.userIds;
            },
            getActUrl(){
                return store.state.actUrl;
            },
            getDeactUrl(){
                return store.state.deacUrl;
            },
            msg(){
              return store.state.message;
            },
            pagi(){
                return store.state.pagination;
            }


        }
    }
</script>

<style scoped>

</style>