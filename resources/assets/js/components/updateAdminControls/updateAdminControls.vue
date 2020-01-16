<template>
    <span>
         <button type="button" :id="active" class="btn btn-default btn-sm"  data-toggle="tooltip" data-placement="bottom" title="account control" @click="deactivateAdmin(adminId,adminStatus)"><i class="feather  icon-airplay"> </i></button>
         <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="delete admin" @click="deleteAdmin(adminId)"><i class="feather icon-trash"> </i> </button>

    </span>
</template>

<script>
    export default {
        name: "updateAdminControls",
        props:['id','status'],
        data(){
            return{
            active : 1
            }
        },
        methods:{

            accountControl(adminId,status){
                if (status === "1") {
                    this.deactivateAdmin(adminId)
                }
                else{
                    this.deactivateAdmin(adminId)
                }
            },


             deactivateAdmin(adminId,status){
                  if (status ===  '1'){
                      let self = this;
                      let formData = new FormData();
                      formData.append('adminId',adminId);

                      sweetAlert({
                          title: 'Warning',
                          text: 'Do you want to  block this staff?',
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Yes, Block',
                          confirmButtonColor: '#fe8f9c',
                          closeOnConfirm: true,
                          showLoaderOnConfirm: true,
                      },function(isConfirm) {

                          if (isConfirm) {
                              axios.post('block-admin/api',formData).then(function (res) {

                                  if (res.data === 'success') {
                                          window.location = "manage-admins";
                                  }
                              }).
                              catch(function (error) {
                                  console.log(error);
                              });
                          }
                      });
                  }
                  else {
                      this.activateAdmin(adminId);
                  }

            },
            activateAdmin(adminId){
                let self = this;
                let formData = new FormData();
                formData.append('adminId',adminId);
                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to unblock this staff?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Unblock',
                    confirmButtonColor: '#fe8f9c',
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                },function(isConfirm) {
                    if (isConfirm) {
                        axios.post('unblock-admin/api',formData).then(function (res) {

                            if (res.data === 'success') {
                                window.location = "manage-admins";
                            }
                        }).
                        catch(function (error) {
                            console.log(error);
                        });
                    }
                });
            },
            deleteAdmin(adminId){
                let self = this;
                let formData = new FormData();
                formData.append('adminId',adminId);

                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to delete this admin?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Delete',
                    confirmButtonColor: '#fe8f9c',
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                },function(isConfirm) {

                    if (isConfirm) {
                        axios.post('delete-admin/api',formData).then(function (res) {

                            if (res.data === 'success') {
                                window.location = "manage-admins";
                            }
                        }).
                        catch(function (error) {
                            console.log(error);
                        });
                    }
                });
            },
        },
        computed:{
            adminId(){
                return this.id;
            },
            adminStatus(){
                return this.status;
            }

        }
    }
</script>

<style scoped>

</style>