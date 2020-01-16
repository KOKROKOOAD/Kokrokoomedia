<template>
    <!--<div class="page-wrapper">-->
        <!-- Page-header start -->
        <!--<div class="page-header">-->
            <!--<div class="row align-items-end">-->
                <!--<div class="col-lg-8">-->
                    <!--<div class="page-header-title">-->
                        <!--<div class="d-inline">-->
                            <!--<h4>Rate selection form</h4>-->
                            <!--<span>Which segments do you want to <code>Publish  </code>, Select rate  to get continue.</span>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-4">-->
                    <!--<div class="page-header-breadcrumb">-->
                        <!--<ul class="breadcrumb-title">-->
                            <!--<li class="breadcrumb-item">-->
                                <!--{{getSelectMedia}}-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item" style="color: #9e1317">-->
                                <!--{{getRateCardTitle}}-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item">-->
                                <!--{{segmentDay}} - {{segDate}}-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item" style="color: #9e1317">-->
                                <!--{{selSegments}}-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!-- Page-header end -->

        <!--<button class="btn btn-inverse waves-effect" data-type="inverse" data-from="top" data-align="right" data-icon="fa fa-check">Inverse</button>-->
        <!--<div v-show="getProcessStatus" class="default-grid row">-->
            <!--<show-processing></show-processing>-->
        <!--</div>-->

        <!-- Page body start -->
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
                                <!--&lt;!&ndash;<div class="col-md-2"></div>&ndash;&gt;-->

                                <!--<div class=" col-md-12 col-sm-12">-->
                                    <!--<h4 class="sub-title">Select Rate</h4>-->
                                    <!--<div class="card-block table-border-style">-->
                                        <!--<div class="table-responsive">-->
                                            <!--<table class="table table-bordered">-->
                                                <!--<thead>-->
                                                <!--<tr style="background: #36475F;color: #ffffff;">-->
                                                    <!--<th>#</th>-->
                                                    <!--<th>Day</th>-->
                                                    <!--<th>Segment</th>-->
                                                    <!--<th>Spots</th>-->
                                                    <!--<th>15sec</th>-->
                                                    <!--<th>25sec</th>-->
                                                    <!--<th>30sec</th>-->
                                                    <!--<th>35sec</th>-->
                                                    <!--<th>40sec</th>-->
                                                <!--</tr>-->
                                                <!--</thead>-->
                                                <!--<tbody>-->
                                                <!--<tr>-->
                                                    <!--<th scope="row">1</th>-->
                                                    <!--<td>{{segmentDay}}</td>-->
                                                    <!--<td>{{selSegments}}</td>-->
                                                   <!--<td> <select name="select" class="form-control form-control-primary" v-model="selSegment">-->
                                                        <!--<option disabled value="" selected>1</option>-->
                                                        <!--<option>2</option>-->
                                                   <!--</select></td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 400 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 700 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 1200 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 1400 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 1700 </td>-->



                                                <!--</tr>-->
                                                <!--</tbody>-->
                                            <!--</table>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div style="padding-top: 20px;">-->
                                        <!--&lt;!&ndash;<router-link :to="selSegment_url"  class="btn btn-mat btn-info" >Back</router-link>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<router-link :to="invoice" class="btn btn-mat btn-inverse ">Next</router-link>&ndash;&gt;-->
                                        <!--<button class="btn btn-primary">Create subscription</button>-->
                                        <!--&lt;!&ndash;<button @click="fetchSegments()">click me</button>&ndash;&gt;-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->

                        <!--</div>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; Default select end &ndash;&gt;-->
                <!--</div>-->
                <!--&lt;!&ndash;<div class="col-md-2"></div>&ndash;&gt;-->

            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <!--<div v-show="selMedia.toLowerCase() !== 'print' " class="modal fade"  id="mol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">-->
        <!-- Modal large-->
        <!--<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#Modal-overflow">Overflow</button>-->
        <!-- Modal -->
        <!--<div v-show="selMedia.toLowerCase() !== 'print' " class="modal fade modal-flex" id="mol" tabindex="-1" role="dialog" style="margin-left: 220px;">-->
            <div  class="modal fade" id="mol" tabindex="-1" role="dialog" style="margin-left: 220px;">
                <div class="modal-dialog modal-lg" role="document">
                    <form  @submit.prevent="" id="segment-form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b class="text-danger">{{getMediaHouse}}</b>- {{getTitle}} rate card</h4>
                            <span>Your file : <b class="text-info">{{fileName}}</b><i style="margin-left: 20px;">File size :</i> <b>{{fileSize}}bytes</b></span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--<ul v-show="event_time" v-for="sig in seg_data">-->
                            <!--<li>{{start = sig.startTime}}</li>-->
                            <!--<li>{{end = sig.endTime}}</li>-->
                        <!--</ul>-->

                                 <!--{{seg_data}}-->
                        <div class="modal-body">

                            <div class="form-group">
                                <input class="form-control" required="required" name="title" type="text" v-model="title"  placeholder="Enter segment title  eg:short video  on  history of gold coast">

                            </div>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                            <tr style="background: #36475F;color: #ffffff;">
                            <th>#</th>
                            <th>Segment</th>
                            <th>Spots</th>
                            <th v-if="segments_headings.sec1 !== null">{{segments_headings.sec1}} sec</th>
                            <th v-if="segments_headings.sec2 !== null">{{segments_headings.sec2}} sec</th>
                            <th v-if="segments_headings.sec3 !== null">{{segments_headings.sec3}} sec</th>
                            <th v-if="segments_headings.sec4 !== null">{{segments_headings.sec4}} sec</th>
                            <th v-if="segments_headings.sec5 !== null">{{segments_headings.sec5}} sec</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(segment,index) in segments_data">
                            <th scope="row">{{index + 1}}</th>
                                <td>{{segment.mon_seg_start}}-{{segment.mon_seg_end}}</td>
                                <td> <select name="select" v-model="spots[index]">
                                    <option disabled value="" selected></option>
                                    <option v-for=" s in spot_avail(spots_available)" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                </select></td>

                                <td v-if="segment.sec1_rate  !== null "><input type="radio"   :name="'seA' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start,'endTime' :segment.mon_seg_end,durations : segments_headings.sec1,'rate':segment.sec1_rate,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec1_rate}} GHC</td>
                                <td v-if="segment.sec2_rate  !== null "><input type="radio"   :name="'seB' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start,'endTime' :segment.mon_seg_end,durations : segments_headings.sec2,'rate':segment.sec2_rate,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec2_rate}} GHC</td>
                                <td v-if="segment.sec3_rate  !== null "><input type="radio"   :name="'seC' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start, 'endTime' :segment.mon_seg_end,durations : segments_headings.sec3,'rate':segment.sec3_rate,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec3_rate}} GHC</td>
                                <td v-if="segment.sec4_rate  !== null "><input type="radio"   :name="'seD' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start, 'endTime' :segment.mon_seg_end,durations : segments_headings.sec4,'rate':segment.sec4_rate,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec4_rate}} GHC</td>
                                <td v-if="segment.sec5_rate  !== null "><input type="radio"   :name="'seE' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start, 'endTime' :segment.mon_seg_end,durations : segments_headings.sec5,'rate':segment.sec5_rate,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec5_rate}} GHC</td>

                            </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                            <!--<button class="btn btn-mat btn-secondary ">save</button>-->
                            <router-link :to="{name : 'invoice'}"   :disabled="seg_data.length === 0" class="btn btn-primary waves-effect waves-light " @click.native="submit(title)" >Schedule</router-link>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        props :['saveSegment','startDate','endDate'],
        name : 'selectSegments',

        mounted(){
        // this.eventTime();
        },
        created(){

        },
        data(){
            return {
                //invoice: '/user-account/create-sub-invoice',
                segment_date: '/user-account/create-sub-date',
                selSegment_url: '/user-account/select-segment',
                segments_data:
                    [{"mon_seg_start": "07:00","mon_seg_end": "08:00","mon_spots": "3",
                        "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "08:00","mon_seg_end": "09:00","mon_spots": "3",
                        "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "09:00","mon_seg_end": "10:00","mon_spots": "3",
                        "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "10:00","mon_seg_end": "11:00","mon_spots": "3",
                        "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "11:00","mon_seg_end": "12:00","mon_spots": "3",
                        "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "13:00","mon_seg_end": "14:00","mon_spots": "3",
                        "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "14:00","mon_seg_end": "15:00","mon_spots": "3",
                        "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null}]
                ,
                segments_headings : {"sec1": 15, "sec2": 20, "sec3": 25, "sec4": 30, "sec5": null},
                spots_available : 10,
                selSegment: '',
                selMedia: '',
                seg_data : [],
                spots : [],
                print_segments: [{

                }],
                title : '',
                rate : '',
                day: 'Monday',
                invoice : 'invoice',
                start : '',
                end : '',
                event_time : false,
                startDates : [],
                endDates : []

            }
        },
        methods: {
            submit(title){
                store.dispatch('getSegmentTitle', title);
                this.eventTime();

                $('#mol').modal('hide');
                $('#print').modal('hide');
            },

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
            eventTime(){

                    store.dispatch('getSubData',this.seg_data);
            },
            spot_avail(spot){
                let s = parseInt(spot);
                let results = [];
                for (let i = 1; i < s + 1; i++){
                    results.push(i);
                }
                return results;
            },
            checkSpots(segment){
                let self = this;
                store.dispatch('getProcessing', true);
                setTimeout(function () {
                    axios.get('check-spots-api/' +  segment ).then(function (res) {
                        console.log(res.data);
                        store.dispatch('getProcessing', false);
                    }).catch(function (error) {
                        console.log(error);
                    });
                },3000);
            },
            save(){
                 store.dispatch('getSegmentTitle', this.title);
                $('#mol').modal('hide');
            },
        },

        computed:{
            notification(){
                return store.getters.checkAvailableDate;
            },
            segmentDay(){
                return store.getters.segmentDay;
            },
            getMediaHouse(){
                return store.getters.selectedMediaHouse;
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
            segDate(){
                return store.getters.segmentDate;
            },
            selSegments(){
                return store.getters.selectedSegment;
            },
            segTitle(){
                return store.getters.segTitle;
            },
            startTimes(){
                return store.getters.startTime;
            },
            endTimes(){
                return store.getters.endTime;
            },
            getTitle(){
                return store.state.rate_card_title;
            },
            fileName(){
                return store.getters.fileName;
            },
            fileSize(){
                return store.getters.fileSize;
            },
            startDat(){
                return this.startDate;
            },
            schedAdsData(){
                return  store.getters.subData;
            },
        },

    }

</script>

