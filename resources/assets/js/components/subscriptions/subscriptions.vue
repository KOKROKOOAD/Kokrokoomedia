<template>
    <div class="page-wrapper full-calender">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Subscriptions</h4>
                            <!--<span style="color: #9e1317 ">Click a date to create your ad.</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                            </li>
                            <router-link :to="{name:selectMedia}" class="breadcrumb-item">Create Subscription </router-link>
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
                        <!--<div class="col-xl-2 col-md-12">-->
                            <!--<div id="external-events">-->
                                <!--<h6 class="m-b-30 m-t-20">Subscriptions</h6>-->
                                <!--<div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>-->
                                <!--<div class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>-->
                                <!--<div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>-->
                                <!--<div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>-->
                                <!--<div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>-->
                                <!--<div class="checkbox-fade fade-in-primary m-t-10">-->
                                    <!--<label>-->
                                        <!--<input type="checkbox" value="">-->
                                        <!--<span class="cr">-->
                                                                        <!--<i class="cr-icon icofont icofont-ui-check txt-primary"></i>-->
                                                                    <!--</span>-->
                                        <!--<span>Remove After Drop</span>-->
                                    <!--</label>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <div class="col-xl-12 col-md-12">
                            <full-calendar ref="calendar" :config="config" :event-sources="eventSources" @event-render="eventRender" @event-drop="eventDrop"></full-calendar>
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
        <!--<div style="padding-top: 20px;">-->
            <!--<router-link :to="selSegment_url"  class="btn btn-mat btn-info" >Back</router-link>-->
            <!--<router-link :to="invoice" class="btn btn-mat btn-inverse ">Next</router-link>-->
            <!--&lt;!&ndash;<button @click="fetchSegments()">click me</button>&ndash;&gt;-->
        <!--</div>-->
    </div>

    <!-- Main-body end -->
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name : 'subscriptions',

        mounted(){
         let self = this;
        },
        created(){

        },
        data(){
            return {
                invoice : '/user-account/create-sub-invoice',
                segment_date : '/user-account/create-sub-date',
                selSegment_url : '/user-account/select-segment',
                segments_data : [],
                selSegment : '',
                selMedia : '',
                print_segments : [],
                title : '',
                start : '',
                end : '',
                sub : '/user-account/subscriptions',
                config: {
                    defaultDate: new Date(),
                    defaultView: 'month',
                    droppable : true,
                    editable : true,
                    displayEventEnd : true,
                    eventLimit : 2,
                    eventLimitText : 'click to view more ads',
                    header: {
                        right: 'month,agendaWeek,agendaDay,listMonth',
                    }
                },
                subs : [],
                selectMedia: 'selectMedia',
            }
        },
        methods: {
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


                        axios.post('sub-update-api', formData).then(function(response) {
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
            eventRender: function( event, element, view ) {
                 element.find('.fc-time').after('<span class="glyphicon glyphicon-time"></span><br> ');
                if(event.status === 'pending'){
                    element.find('.fc-title').after("<br><span class='text-info fa fa-comment' style='font-weight: bolder'> " +event.status+"</span>");

                }
                else if(event.status === 'review'){
                    element.find('.fc-title').after("<br><span class=' fa fa-comment' style='font-weight: bolder;color: #ffffff '> "+event.status+"</span>");

                }
                else if(event.status === 'inactive'){
                    element.find('.fc-title').after("<br><span class=' fa fa-comment' style='font-weight: bolder;color: #7b0c32;'> "+event.status+"</span>");

                }
                else if(event.status === 'active'){
                    element.find('.fc-title').after("<br><span class='text-success fa fa-comment' style='font-weight: bolder'> "+event.status+"</span>");

                }
                else if(event.status === 'completed'){
                    element.find('.fc-title').after("<br><span class='text-success fa fa-comment' style='font-weight: bolder'> "+event.status+"</span>");

                }
                else if(event.status === 'rejected'){
                    element.find('.fc-title').after("<br><span class='text-danger fa fa-comment' style='font-weight: bolder'> "+event.status+"</span>");

                }
                else if(event.status === 'accepted'){
                    element.find('.fc-title').after("<br><span class=' fa fa-comment' style='font-weight: bolder;color: #0f3e68'> "+event.status+"</span>");

                }

            }

        },

        computed:{
            eventSources() {
                let self = this;
                return [
                    {
                        events(start, end, timezone, callback) {
                            axios.get('fetch-ads/api').then(function (res) {
                                self.sub = res.data;
                                callback(res.data);
                            });

                        },
                        color: '#6f6fbf',
                        textColor: 'white',
                    }
                ]
            },

        },


    }

</script>

