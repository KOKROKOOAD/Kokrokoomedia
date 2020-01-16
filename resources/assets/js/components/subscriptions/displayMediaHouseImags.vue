<template>

    <div class="page-wrapper">
        <pre-loader v-show="getProcessStatus"></pre-loader>

        <!-- Page-header start -->
        <div v-show="loading" class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Media house selection form</h4>
                            <span>Which media house do you want to <code>Publish to </code>, Select and click a  media house  to continue.</span>
                            <!--{{getSelectMedia}}-->

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Select Media house</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--<h5 class="m-b-20">Gallery with description</h5>-->
            <!--<div v-show="getProcessStatus" class="default-grid row">-->
              <!--<show-processing></show-processing>-->
            <!--</div>-->
                <div v-show="loading"  class="default-grid row" :class="fadeIn">
            <div class="row lightboxgallery-popup">
                <div  class="col-lg-3 col-md-6 default-grid-item"  v-for="(logos,index) in mediaHouse"  :key="index">
                    <div class="card gallery-desc" >
                        <div class="masonry-media">
                            <a class="media-middle" href="#!">
                                <!--<img class="img-fluid" src="https://colorlib.com//polygon/adminty/files/assets/images/gallery-grid/masonry-1.jpg" alt="masonary">-->
                                <label class="image-checkbox" :id="index" >
                                <img  class="img-fluid" v-bind:src="['/thumbnails/' + logos.logo]" @click="getSelMediaHouseId(logos.client_id)" width="600" height="515">
                                <input type="radio"  :value="logos.media_house"  v-model="selMediaH" />
                                <i class="fa fa-check hidden"></i>
                                </label>

                            </a>
                        </div>
                        <div class="card-block">
                            <!--<h6 class="job-card-desc">Media house Details</h6><hr>-->
                            <!--<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                            <!--<div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>-->
                            <!--<div class="job-meta-data"><i class="icofont icofont-university"></i><b>{{ getSelectMedia}}</b></div>-->

                            <div class="job-meta-data"><i class="fa fa-recycle"></i><b class="text-danger">{{logos.media_house}}</b></div>
                            <div v-show="getSelectMedia === 'RADIO'" class="job-meta-data"><i class="fa fa-signal"></i><b class="text-info">104.3fm</b></div>

                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-left: 16px;">

            </div>

        </div>
        <div v-show="loading"  class="animated fadeIn">
            <router-link :to="{name : selectMedia}"  class="btn btn-mat btn-info" >Back</router-link>
            <router-link :to="file_upload" class="btn btn-mat btn-inverse animated fadeIn" v-show="selMediaH" @click.native="fetchSegmentTitles()">Next</router-link>
        </div>

    </div>




</template>

<script>
    import  store from  '../../vuex/store';
    import PreLoader from "../preloader/preLoader.vue";
    import ShowProcessing from "../payment/showProcess.vue";

    export default {
        //props :['media'],
        components: {
            ShowProcessing,
            PreLoader},
        name : 'displayMediaHouseImags',

        mounted(){
            this.fetchMediaHouse();


        },
        created(){
        },
        data(){
            return {
                r_animate : '',
                selMediaH: '',
                selMediaHouse : '',
                 showBtn : true,
                file_upload : '/user-account/create-sub-file',
                selectMedia : 'selectMedia',
                media : this.$route.params.media,
                mediaHouseId : null,
                loading : false,
            }
        },
        methods: {
            fetchSegmentTitles(){
                let self = this;
                store.dispatch('getProcessing', true);

                setTimeout(function () {
                    store.dispatch('getProcessing', false);


                    store.dispatch('fetchSegmentTitles', self.mediaHouseId);
                   store.dispatch('getSelMediaHouse', self.selMediaH);
                   // store.dispatch('changeStateShowSelMediaHouseTable', true);
                },3000);

            },
            fetchMediaHouse() {
                let self = this;
                store.dispatch('getProcessing', true);

                axios.get('media-houses-api/' + self.getSelectMedia).then(function (res) {

                    setTimeout(function () {

                        if(res &&  res !== ''){
                            store.dispatch('getMediaHouses', res.data);
                           // store.dispatch('getSelMediaType',self.getSelectMedia);
                            store.dispatch('getProcessing', false);
                            self.loading = true;
                            store.dispatch('getFadeIn', 'animated fadeIn');
                            store.dispatch('getShowMediaForm', true);
                        }

                    },3000);


                });
            },
            getSelMediaHouseId(id){

              this.mediaHouseId = id;
               store.dispatch('getMediaHouseId', this.mediaHouseId);
            },
            showSubmitBtn(){
                if(this.selMediaH.length > 0){
                    return false;

                }
                else{
                    return true;
                }
            }
        },

        computed:{
           mediaHouse(){
               return store.getters.mediaHouses;
           },
            getSelectMedia(){
                return store.state.selMedia;
            },
            fadeIn(){
                return store.getters.fadeInn;
            },
            showMedia(){
                return store.state.showMediaForm;
            },
            getProcessStatus(){
                return  store.state.processing;
            },
            mediaHousesss(){
               return store.state.selMediaHouse;
            }
        },

    }

</script>

