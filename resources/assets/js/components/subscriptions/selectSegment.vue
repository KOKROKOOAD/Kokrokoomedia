<template>
    <!--<div class="page-wrapper">-->
        <!--&lt;!&ndash; Page-header start &ndash;&gt;-->
        <!--<div class="page-header">-->
            <!--<div class="row align-items-end">-->
                <!--<div class="col-lg-8">-->
                    <!--<div class="page-header-title">-->
                        <!--<div class="d-inline">-->
                            <!--<h4>Segment selection form</h4>-->
                            <!--<span>Which segments do you want to <code>Publish  </code>, Select segments  to get continue.</span>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-4">-->
                    <!--<div class="page-header-breadcrumb">-->
                        <!--<ul class="breadcrumb-title">-->
                            <!--<li class="breadcrumb-item">-->
                                <!--<a href="index.html"> <i class="feather icon-home"></i> </a>-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item"><a href="#!">Select segments</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!--&lt;!&ndash; Page-header end &ndash;&gt;-->

        <!--&lt;!&ndash;<button class="btn btn-inverse waves-effect" data-type="inverse" data-from="top" data-align="right" data-icon="fa fa-check">Inverse</button>&ndash;&gt;-->
        <!--<div v-show="getProcessStatus" class="default-grid row">-->
            <!--<show-processing></show-processing>-->
        <!--</div>-->


        <!--&lt;!&ndash; Page body start &ndash;&gt;-->
        <!--<div class="page-body">-->
            <!--<div class="row">-->

                <!--<div class=" col-md-12 col-sm-12">-->
                    <!--&lt;!&ndash; Default select start &ndash;&gt;-->
                    <!--<div class="card">-->
                        <!--<div class="card-header">-->
                            <!--&lt;!&ndash;<h5>Default Select</h5>&ndash;&gt;-->
                            <!--&lt;!&ndash;<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>&ndash;&gt;-->

                        <!--</div>-->
                        <!--<div class="card-block">-->
                            <!--<div class="row">-->
                                <!--&lt;!&ndash;segments goes here&ndash;&gt;-->
                                <!--<div class="col-md-2"></div>-->

                                <!--<div class=" col-md-8">-->
                                    <!--<h4 class="sub-title">Select segment</h4>-->
                                    <!--&lt;!&ndash;<p>Add <code>id="#dropper-animation"</code></p>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<input id="dropper-animation"  class="form-control sub_date" type="text" placeholder="Click to select subscription date"/>&ndash;&gt;-->
                                    <!--<select name="select" class="form-control form-control-primary" v-model="selSegment">-->
                                        <!--<option disabled value="" selected>Select a segment</option>-->
                                        <!--&lt;!&ndash;<option v-for="segments in segments_data" :value="segments.segment">{{segments in segments_data}}</option>&ndash;&gt;-->

                                    <!--</select>-->
                                    <!--<div style="padding-top: 20px;">-->
                                        <!--<router-link :to="segment_date"  class="btn btn-mat btn-info" >Back</router-link>-->
                                        <!--<router-link :to="invoice" class="btn btn-mat btn-inverse ">Next</router-link>-->
                                        <!--&lt;!&ndash;<button @click="checkSubAvailabilty()">click me</button>&ndash;&gt;-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->

                        <!--</div>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; Default select end &ndash;&gt;-->
                <!--</div>-->
                <!--<div class="col-md-2"></div>-->

            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name : 'selectSegments',

        mounted(){
            this.fetchSegments();

        },
        data(){
            return {
                invoice : '/user-account/create-sub-invoice',
                segment_date : '/user-account/create-sub-date',
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

                setTimeout(function () {
                    axios.get('test-api/').then(function (res) {
                        console.log(res.data);
                    });

                    store.dispatch('getProcessing', false);
                },3000);
                //  store.dispatch('getProcessing', true);
            },
        },

        computed:{
//            notification(){
//                return store.getters.checkAvailableDate;
//            },
//            segmentDay(){
//                return store.getters.segmentDay;
//            },
//            getSelectMedia(){
//                return store.state.selMedia;
//            },
//            getRateCardTitle(){
//                return store.getters.segmentTitle;
//            },
////            segData(){
////                return store.getters.segmentsData;
////            },
//            getProcessStatus(){
//                return  store.state.processing;
//            },
        },

    }

</script>

