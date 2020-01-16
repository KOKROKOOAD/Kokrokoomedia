<template>
    <div class="page-wrapper full-calender">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Segments</h4>
                        <span style="color: #9e1317 ">Click a date to create your ad.</span>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Segments</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h5>Segment Calender</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <!--<li><i class="feather icon-maximize full-card"></i></li>-->
                        <!--<li><i class="feather icon-minus minimize-card"></i></li>-->
                        <!--<li><i class="feather icon-trash-2 close-card"></i></li>-->
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="row">

                    <div class="col-xl-12 col-md-12">
                        <!--<div id='calendar'></div>-->
                        <full-calendar ref="calendar" :config="config" @day-click="daySelected" @event-drop="eventDrop"></full-calendar>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-error">
        <div class="card text-center">
            <div class="card-block">
                <div class="m-t-10">
                    <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                    <h4 class="f-w-600 m-t-25">Not supported</h4>
                    <p class="text-muted m-b-0">Full Calender not supported in this device</p>
                </div>
            </div>
        </div>
    </div>
        <div style="padding-top: 20px;">
            <router-link :to="{name:selSegment_url}"  class="btn btn-mat btn-info" >Back</router-link>
            <!--<router-link :to="invoice" class="btn btn-mat btn-secondary ">save</router-link>-->
            <!--<router-link :to="invoice" class="btn btn-mat btn-inverse ">Next</router-link>-->
            <!--<button @click="fetchSegments()">click me</button>-->
        </div>

        <segment-title></segment-title>
        <segments :saveSegment="saveSegmentData" :startDate="selectedStartTime" :endDate="selectedEndDate"></segments>
        <print-rate-card  :saveSegment="saveSegmentData" :startDate="selectedStartTime" :endDate="selectedEndDate" :submit="submit"></print-rate-card>
        <update-segment></update-segment>
        <ad-summary  v-show="showSummary" :saveSegment="saveSegmentData"></ad-summary>

    </div>

    <!-- Main-body end -->
</template>

<script>
    "use strict";
    import  store from  '../../vuex/store';
    import segmentTitle from "./segmentTitle";
    import PrintRateCard from "./printRateCare";

    export default {
        name: 'fullcalender',
        components: {PrintRateCard},
        data() {
            return {
                invoice: '/user-account/create-sub-invoice',
                segment_date: '/user-account/create-sub-date',
                selSegment_url: 'selectRateCard',
                day: '',
                selectedStartTime: null,
                selectedEndDate: null,
                myEvents: 'Pending',
                config: {
                    defaultDate: new Date(),
                    defaultView: 'month',
                    header: {
                        right: 'month'
                    },
                    views: {
                        agenda: {
                            eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
                        }
                    }
                },
                showSummary : false,

            }
        },
        mount(){

        },
        methods: {
            daySelected(date, jsEvent, view) {
                if (this.getSelectMedia === 'PRINT'){
                    $('#print').modal('show');
                    this.selectedStartTime = date.format("YYYY-MM-DD ");
                    this.selectedEndDate = date.format("YYYY-MM-DD ");

                }
                else if (this.getSelectMedia === 'RADIO' || this.getSelectMedia === 'TV'){
                    $('#mol').modal('show');
                    this.selectedStartTime = date.format("YYYY-MM-DD ");
                    this.selectedEndDate = date.format("YYYY-MM-DD ");
                }
                else{
                    alert('select a media type');
                }



            },
            submit(title){

                store.dispatch('getSegmentTitle', title);

                $('#mol').modal('hide');
                $('#print').modal('hide');
            },
            // create a subscription
            saveSegmentData(title,segments) {
                let self = this;
                let formData = new FormData();
                if(title !== ''){
                    store.dispatch('getSegmentTitle', title);
                    formData.append('title', self.segTitle);
                    formData.append('created_ad_data', JSON.stringify(self.schedAdsData));
                    formData.append('uploadedFile', self.file);
                    formData.append('rate_card_title', self.rateCard);
                    formData.append('media_house_id', self.mediaHouseId);

                    axios.post('ads-store', formData).then(function (response) {
                        if (response.data === 'success'){
                            self.$refs.calendar.$emit('refetch-events');

                            (new PNotify( {
                                    title:'Success Desktop Notice', type:'success', text:'New subscription successfully created.', desktop: {
                                        desktop: true, icon: 'assets/images/pnotify/success.png'
                                    }
                                }
                            ));
                        }
                        if (response.data === 'booked') {
                            (new PNotify( {
                                    title:'Error Desktop Notice', type:'error', text:'Segment already booked', desktop: {
                                        desktop: true, icon: 'assets/images/pnotify/success.png'
                                    }
                                }
                            ));
                        }

                        if(response.data === 'failed'){
                            (new PNotify( {
                                    title:'Info Desktop Notice', type:'info', text:'Kindly select a media type to create your subscription', desktop: {
                                        desktop: true, icon: 'assets/images/pnotify/success.png'
                                    }
                                }
                            ));
                        }

                    });
                    $('#mol').modal('hide');
                    $('#print').modal('hide');

                }

            },
            eventDrop: function(event, delta, revertFunc) {

                sweetAlert({
                    title: 'Warning',
                    text: 'Are you sure about this change?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Change',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,

                    showLoaderOnConfirm: true,
                },function(isConfirm){

                  let  s = event.start.format("YYYY-MM-DD ") + event.start.format('h:mm');

                    if(isConfirm){

                        let formData = new FormData();
                        formData.append('startDate', event.start.format("YYYY-MM-DD ") + event.start.format('h:mm'));


                        axios.post('check-sub/api', formData).then(function(response) {
                            console.log(response.data);
                            if(response.data === 'available'){

                                formData.append('endDate', event.end.format("YYYY-MM-DD " + event.end.format('h:mm')));
                                formData.append('id',event.id);

                                axios.post('sub-update-api', formData).then(function (response) {
                                    //self.$refs.calendar.$emit('refetch-events');
                                    if(response){
                                       // PNotify.desktop.permission();
                                        (new PNotify( {
                                                title:'Update Desktop Notice', type:'info', text:'Subscription date updated successfully.', desktop: {
                                                    desktop: true, icon: 'assets/images/pnotify/success.png'
                                                }
                                            }
                                        ));
                                    }

                                });
                            }
                            else{
                                revertFunc();
                                (new PNotify( {
                                        title:'Failure Desktop Notice', type:'error', text:'Please this segment is already booked.Try another segment', desktop: {
                                            desktop: true, icon: 'assets/images/pnotify/success.png'
                                        }
                                    }
                                ));
                            }

                        });
                    }
                    else{
                        revertFunc();
                    }

                });
            },
            eventClick: function(calEvent, jsEvent, view) {

                alert('Event: ' + calEvent.title);
                alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                alert('View: ' + view.name);

                // change the border color just for fun
                $(this).css('border-color', 'red');

            },
//  select date to create subscription
            getSelDay(date) {
                let days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                // let selDay =  $('.sub_date').val();
                //segment date
                store.dispatch('getSegmentDate', date);
                // this.sub_date = dat.split("/").join("-");
                let d = new Date(date);
                this.day = days[d.getDay() - 1];
                console.log(this.day);
                //selected segment day
                store.dispatch('getSelSegmentDay', this.day);
            },

        },

        computed: {
// get subscription title
            segTitle() {
                return store.getters.segTitle;
            },
            // fetch and display subscriptions
            eventSources() {
                return [
                    {
                        events(start, end, timezone, callback) {
                            axios.get('fetch-ads/api').then(function (res) {
                                callback(res.data);
                            });

                        },
                        color: 'red',
                        textColor: 'white',
                    }
                ]
            },
            // get selected file
            file(){
                return  store.getters.file;
            },
            // get seleceted media house id
            mediaHouseId(){
                return store.state.mediaHouseId;
            },
            //get selected rate card title
            rateCard(){
                return store.state.rate_card_title;
            },
           // get subscription start time
            startTimes(){
                return store.getters.startTime;
            },//get subscription end time
            endTimes(){
                return store.getters.endTime;
            },
            schedAdsData(){
              return  store.getters.subData;
            },
            getSelectMedia(){
                return store.state.selMedia;
            },

        }
    }

</script>




