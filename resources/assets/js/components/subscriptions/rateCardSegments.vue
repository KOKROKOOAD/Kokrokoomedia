<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Media Segments form</h4>
                            <span>Which segments do you want to <code>Publish  </code>, Select segments  to get continue.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Select segments</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

                    <!--<button class="btn btn-inverse waves-effect" data-type="inverse" data-from="top" data-align="right" data-icon="fa fa-check">Inverse</button>-->


        <!-- Page body start -->
        <div class="page-body">
            <div class="row">

                <div class=" col-md-12 col-sm-12">
                    <!-- Default select start -->
                    <div class="card">
                        <div class="card-header">
                            <!--<h5>Default Select</h5>-->
                            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->

                        </div>
                        <div class="card-block">
                            <div class="row">
                               <!--segments goes here-->
                                <div class="col-md-2"></div>

                                <div class=" col-md-8">
                                    <h4 class="sub-title">Select date</h4>
                                    <!--<p>Add <code>id="#dropper-animation"</code></p>-->
                                    <input id="dropper-animation"  class="form-control sub_date" type="text" placeholder="Click to select subscription date"/>
                                    <div style="padding-top: 20px;">
                                    <router-link :to="rate_cards"  class="btn btn-mat btn-info" >Back</router-link>
                                    <router-link :to="segments" class="btn btn-mat btn-inverse " @click.native="fetchSegments">Next</router-link>
                                        <!--<button @click="fetchSegments">click me</button>-->
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- Default select end -->

                </div>
                <div class="col-md-2"></div>

            </div>
        </div>
    </div>
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name : 'rateCardSegments',

        mounted(){


        },
        data(){
            return {

                showBtn : true,
                select_rate_card : '/user-account/create-sub-rate-card',
                bill : '/user-account/create-sub-summary',
                invoice : '/user-account/create-sub-invoice',
                segments : '/user-account/select-segment',
                rate_cards : 'selectRateCard',
                sub_date : '',
                notify : 'Slot available'


            }
        },
        methods: {

            checkSubAvailabilty(){
                let self = this;
                 let dat =  $('.sub_date').val();
                 self.sub_date = dat.split("/").join("-");
               // console.log(self.sub_date);
                axios.get('check-segment-api/' + self.sub_date).then(function (res) {
                   // console.log(typeof res.data);
                     self.isEmpt(res.data,self);
                });

            },
            isEmpt(obj,self) {
                if (jQuery.isEmptyObject(obj)){
                    store.dispatch('getAvailableDate', self.notify);
                    console.log(self.notification)

                }
                else{
                    console.log('no');

                }
        },
            fetchSegments(date){
                let days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ];
               // let selDay =  $('.sub_date').val();
                store.dispatch('getSegmentDate',date);
               // this.sub_date = dat.split("/").join("-");
                console.log(this.sub_date);
                let d = new Date(selDay);
                this.day = days[d.getDay() - 1];
                store.dispatch('getSelSegmentDay', this.day);
            },


        },

        computed:{
          notification(){
              return store.getters.checkAvailableDate;
          },
            segData(){
                return store.getters.segmentsData;
            }
        },

    }

</script>

