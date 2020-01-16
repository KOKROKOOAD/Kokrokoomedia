<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Default select start -->
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <h4 class="sub-title">Provide rate card title</h4>
                                    <input name="select" class="form-control form-control-primary"  v-model="rateCardTitle">
                                </div>
                                <div class="animated fadeIn" style="padding-left: 16px;">
                                    <button v-show="rateCardTitle !== ''" :disabled="disabled"  role="button" type="button" class="btn btn-primary" @click="storeRateCardTitle()">Submit
                                        <img v-show="disabled"  src="/images/loading.gif" width="20" height="20">

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name: "createRateCardTitle",
        data(){
            return{
                isLoading : false,
                rateCardTitle : '',
                disabled : false,
            }
        },
        methods:{

            storeRateCardTitle(){
                let self = this;
                let formData =new FormData();
                formData.append('rateCardTitle', self.rateCardTitle);
                // self.isLoading = true;
                // self.disabled = true;

                    axios.post('rate-card-title/api-store',formData).then(function(res){
                        if(res) {
                            store.dispatch('getRateCardId', res.data);
                            //self.isLoading = false;
                           //window.location.href ='/media-house-admin/create-rate-card';
                            self.$router.push({ name :'create-rate-card'});

                            self.disabled = false;
                        }
                        else{
                          //  self.isLoading = false;
                         //   self.disabled = false;
                          //  alert('Sorry an error happened');
                        }
                    }).catch(function (res) {
                        console.log(res.data);
                    });


            },

        },
        computed:{
          cardId(){
            return  store.getters.rateCardId;
          }
        }

    }
</script>

<style scoped>

</style>