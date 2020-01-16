<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Rejected Segments</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">

                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Default Styling table start -->
            <div class="card">
                <search></search>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table  class="table  table-striped table-bordered nowrap">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Subscription ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Spots</th>
                                <th>Subscription title</th>
                                <th>Segment</th>
                                <th>Duration</th>
                                <th>Rate card</th>
                                <th>Status</th>
                                <th>Created date</th>
                                <!--<th>Actions</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <!--<div  v-if="segments_data.length === 0" class="row" style="text-align: center">-->
                            <!--<span style="margin-left: 100px;">No pending subscriptions</span>-->


                            <!--</div>-->
                            <tr  v-for="(sub,index) in rejectedSubs">
                                <th scope="row">{{index + 1 }}</th>
                                <td>{{sub.subscription_id}}</td>
                                <td>{{sub.created_ad_data[0].startDate}}</td>
                                <td>{{sub.created_ad_data[0].endDate}}</td>
                                <td>{{sub.created_ad_data[0].spot}}</td>
                                <td>{{sub.title}}</td>
                                <td>{{sub.created_ad_data[0].startTime}}-{{sub.created_ad_data[0].endTime}}</td>
                                <td>{{sub.created_ad_data[0].durations}} sec</td>
                                <td>{{sub.created_ad_data[0].rate_card}}</td>
                                <td v-show="show">{{sub_status = sub.status}}</td>
                                <td class="text-info" style="font-weight: bolder">{{sub_status}}</td>
                                <td>{{sub.created_at}}</td>
                                <!--<td>-->
                                <!--<div class="btn-group" role="group" aria-label="Basic example">-->
                                <!--<button type="button" class="btn btn-default" @click="approvedSub(sub.client_id, sub.subscription_id)"><i class="feather icon-eye"> </i></button>-->
                                <!--<button type="button" class="btn btn-info"><i class="fa fa-times"> </i> </button>-->
                                <!--&lt;!&ndash;<button type="button" class="btn btn-secondary">Right</button>&ndash;&gt;-->
                                <!--</div>-->
                                <!--</td>-->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <pagination></pagination>
    </div>

</template>

<script>
    import  store from  '../../vuex/store';
    import Pagination from "../partials/pagination";
    import search from "../partials/search";
    export default {
        name: "rejected",
        components:{Pagination,search},
        data(){
            return{
                segments_data : [],
                sub_status : '',
                show : false
            }
        },
        mounted(){
            //this.fetchRejectedSub();
            store.dispatch('rejectedSubs',this.pagi.current_page)

        },
        methods:{
            fetchRejectedSub(){
                let self = this;
                axios.get('fetch-rejected-subs/api').then(function (res) {
                    console.log(res.data);
                    self.segments_data = res.data;
                });
            },
        },
        computed:{
            rejectedSubs(){
                return store.state.rejectedSubs;
            },
            pagi(){
                return store.state.pagination;
            },
        }
    }
</script>

<style scoped>

</style>