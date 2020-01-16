<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Segment selection form</h4>
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
        <div v-show="getProcessStatus" class="default-grid row">
            <show-processing></show-processing>
        </div>

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
                                    <h4 class="sub-title">Select segment</h4>
                                    <!--<p>Add <code>id="#dropper-animation"</code></p>-->
                                    <!--<input id="dropper-animation"  class="form-control sub_date" type="text" placeholder="Click to select subscription date"/>-->
                                    <select name="select" class="form-control form-control-primary" v-model="selSegment" @change="checkSpots(selSegment)">
                                        <option disabled value="" selected>Select a segment</option>
                                        <option v-for="segments in segments_data" :value="segments.tue_duration + ' ' + segments.tue_b_duration">{{segments.tue_duration}} -- {{segments.tue_b_duration}}</option>

                                    </select>
                                    <div style="padding-top: 20px;">
                                        <router-link :to="segment_date"  class="btn btn-mat btn-info" >Back</router-link>
                                        <router-link :to="segment_rate" class="btn btn-mat btn-inverse ">Next</router-link>
                                        <!--<button @click="fetchSegments()">click me</button>-->
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
        name : 'selectSegments',

        mounted(){

        },
        created(){
            this.fetchSegments();
        },
        data(){
            return {
                invoice : '/user-account/create-sub-invoice',
                segment_date : '/user-account/create-sub-date',
                 segment_rate : '/user-account/select-rate',
                segments_data : [],
                selSegment : '',
                selMedia : '',
                print_segments : []
            }
        },
        methods: {
            fetchSegments(){
                let self = this;
                store.dispatch('getProcessing', true);
               // console.log(self.segData[1]);
                setTimeout(function () {
                    axios.get('fetch-segments/' +  self.getSelectMedia + '/' + self.getRateCardTitle + '/' + self.segmentDay).then(function (res) {
                        console.log(res.data[0].segments);
                     self.segments_data  = res.data[0].segments;
                        store.dispatch('getProcessing', false);

                        self.selMedia = res.data[1];
                          let dat = res.data[0];
                        for (let key in dat) {
                            if (dat.hasOwnProperty(key)) {
                              //  console.log(dat[key].segments);
                                //console.log(self.segments_data);
                            }
                        }

                    }).catch(function (error) {
                        console.log(error);
                    });
                },3000);

            },
            checkSpots(segment){
                let self = this;
                store.dispatch('getProcessing', true);
                setTimeout(function () {
                    axios.get('check-spots-api/' +  segment ).then(function (res) {
                        console.log(res.data);
                        store.dispatch('getSelSegment', self.selSegment);
                        store.dispatch('getProcessing', false);
                    }).catch(function (error) {
                        console.log(error);
                    });
                },3000);
            }
        },

        computed:{
            notification(){
                return store.getters.checkAvailableDate;
            },
            segmentDay(){
                return store.getters.segmentDay;
            },
            getSelectMedia(){
                return store.state.selMedia;
            },
            getRateCardTitle(){
                return store.getters.segmentTitle;
            },
            segData(){
                return store.getters.segmentsData;
            },
            getProcessStatus(){
                return  store.state.processing;
            },
        },

    }

</script>

