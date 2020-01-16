<template>
    <div class="content" style="bonder:none !important">
        <div class="row">
            <div class="col-lg-10 col-md-6 col-sm-10"></div>
            <div class="col-lg-2 col-md-6 col-sm-2">
                <a :href="createSupLink" class="title btn btn-info pull-right">Create Subscription</a>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="card card-stats" style="border:none !important;background:transparent">
                    <div class="card-body ">
                        <h4 class="title">My Subscriptions</h4><hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6" v-for="(sub,key) in subs">
                                <div class="card card-stats">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-5 col-md-4">

                                                <span class="pull-left" style="font-weight: 800">{{sub.media}}</span>
                                                <div class="icon-big text-center icon-warning">

                                                    <i v-if="sub.media == 'Radio'" class="nc-icon nc-globe text-warning"></i>
                                                    <i v-else-if="sub.media == 'TV'" class="nc-icon nc-tv-2 text-warning"></i>
                                                    <i v-else="sub.media == 'Print'" class="nc-icon nc-album-2 text-warning"></i>

                                                </div>

                                            </div>
                                            <div class="col-7 col-md-8">

                                                <div class="numbers">
                                                    <p class="card-category text-danger" style="font-weight: 800">Media house</p>
                                                    <p class="card-title">{{sub.media_house}}
                                                    </p>
                                                   <!--<span style="font-size: small">pending</span>-->
                                                    <!--<span  style="font-weight: 800;color: #0a6ebd;font-size: small">{{sub.status}}</span>-->

                                                </div>
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="row" >
                                            <!--<div class="col-md-1"></div>-->
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <img class="thumbnail" :src="/thumbnails/ + sub.file_name"/>

                                            </div>
                                            <!--<div class="col-md-1"></div>-->

                                        </div>
                                    </div>
                                    <div class="card-footer ">

                                        <!--<div class="stats">-->
                                            <!--<strong> created</strong>-->
                                            <!--<span class="text-muted pull-right" style="font-weight: 400;font-size: 15px;color:  rgb(17, 17, 17);font-family:'Amazon Ember', Arial, sans-serif">{{sub.created_at}}</span><hr>-->
                                        <!--</div>-->
                                        <div class="stats text-center">
                                            <!--<strong>Title</strong>-->


                                            <a href="#" class="text-dark"  style="font-weight: 500;font-size: 18px;font-family: Helvetica, Arial, sans-serif;line-height: 40px;"> {{sub.ad_title}}</a>
                                        </div>
                                        <div class="stats text-center">
                                            <!--<strong class="text-dark">Publishing </strong>-->
                                            <span class="text-muted" style="font-weight: 400;font-size: 15px;color:  rgb(17, 17, 17);font-family:'Amazon Ember', Arial, sans-serif"> <li class="fa fa-life-ring text-success"> </li> {{sub.created_at}}</span><hr>
                                        </div>
                                        <!--<hr>-->

                                        <div class="stats">
                                            <!--<strong>Title</strong>-->
                                            <span class="text-dark"  style="font-weight: 500;font-size: 18px;font-family: Helvetica, Arial, sans-serif;line-height: 40px;"><i class="fa fa-newspaper-o" style="font-weight: 800;color: #F1CF00"> </i> {{sub.spots}}</span>

                                            <span v-if="sub.status === 'pending'" class="pull-right"  style="font-weight: 500;font-size: 18px;font-family: Helvetica, Arial, sans-serif;line-height: 40px;color: #0a6ebd">{{sub.status}}</span>
                                            <span v-else-if="sub.status === 'approved'" class="pull-right"   style="font-weight: 500;font-size: 18px;font-family: Helvetica, Arial, sans-serif;line-height: 40px;color: #8a6d3b">{{sub.status}}</span>
                                            <span v-if="sub.status === 'active'" class="pull-right text-success"  style="font-weight: 500;font-size: 18px;font-family: Helvetica, Arial, sans-serif;line-height: 40px;">{{sub.status}}</span>
                                            <span v-if="sub.status === 'inactive'" class="pull-right text-danger"  style="font-weight: 500;font-size: 18px;font-family: Helvetica, Arial, sans-serif;line-height: 40px;">{{sub.status}}</span>
                                        </div>
                                        <!--<hr>-->
                                        <!--<div class="stats">-->
                                             <!--&lt;!&ndash;<strong>Description</strong><br>&ndash;&gt;-->
                                            <!--<p class="text-dark">{{sub.ad_description}}</p>-->
                                        <!--</div>-->
                                        <!--<hr>-->

                                        <div class="stats">
                                            <!--<i class="fa fa-steam"></i> Status-->

                                            <strong class="text-dark" style="font-weight: 500;font-size: 16px;font-family: Roboto">GHC {{sub.rate}}</strong>
                                            <div v-show="sub.status === 'approved' " class="pull-right text-danger">

                                                <i  class="fa fa-long-arrow-right"></i> <a href= ""  data-toggle="modal" data-target="#demo-modal-3"  class="text-danger" >check out</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">

                                    <span class="text-center text-info" v-show=" subs == ''  " style="text-align: center">No subscription created yet</span>

                            </div>

                        </div>

                    </div>
                    <div class="card-footer ">

                    </div>
                </div>
            </div>


        </div>

        <!--payment component-->
        <payment></payment>



    </div>

</template>

<script>
    import payment from '../subscriptions/payment'
    export default {
        name: "mySub",
        mounted(){
            this.fetchSubs();
        },
        data(){
            return{
                createSupLink : "create-subscription",
                subs : [],
            }
        },
        methods:{
            fetchSubs(){
                let self = this;
                axios.get('ads/api').then(res => {
                     self.subs = res.data;
                    console.log(res.data);
                }).catch(function (res) {
                    console.log(res);
                });
            }
        },
        comments:{
            name : ['payment']
        }

    }
</script>

<style scoped>

</style>