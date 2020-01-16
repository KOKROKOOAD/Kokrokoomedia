<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Downloadable Subscriptions</h4>
                            <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
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
                        <table id="simpletable" class="table  table-striped table-bordered nowrap">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Subscription Date</th>
                                <th>Subscription Title</th>
                                <th>Segment</th>
                                <th>File type</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(downloads,index) in segments_data">
                                <th scope="row">{{index + 1}}</th>
                                <td>{{downloads.created_at}}</td>
                                <td>{{downloads.title}}</td>
                                <td>{{downloads.start.substring(10)}} - {{downloads.end.substring(10)}}</td>
                                <td>{{downloads.file_type}}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="download-sub" type="button" class="btn btn-default"><i class="fa fa-download"> </i></a>
<!--                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-edit"> </i> </button>-->
                                    </div>
                                </td>
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
    export default {
        name: "subscriptions",
        data(){
            return{
             segments_data : [],
            }
        },
        mounted(){
            this.fetchDownloadableSub();
        },
        methods:{
            fetchDownloadableSub(){
                let self = this;
                axios.get('fetch-downloadable-subs/api').then(function (res) {
                    console.log(res.data);
                    self.segments_data = res.data.data;
                });
            },
            downloadFile(sub_id){
                let self = this;
                axios.get('download-sub/' + sub_id).then(function (res) {
                        console.log(res.data);
                });
            }
        },
        computed:{
            acceptedSubs(){
                return store.state.acceptedSubs;
            },
            pagi(){
                return store.state.pagination;
            },
        }
    }
</script>

<style scoped>

</style>