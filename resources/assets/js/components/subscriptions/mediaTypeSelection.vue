<template>
       <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Media house selection form</h4>
                            <span>Which media house do you want to <code>Publish to </code>, Select a media house  to get continue.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Select Media house</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Default select start -->
                    <div class="card">
                        <div class="card-header">
                            <!--<h5>Default Select</h5>-->
                            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->

                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div  v-for="(logos,index) in mediaHouses"  :key="index" class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <!--<h4 class="sub-title"> Select media type</h4>-->
                                    <label class="image-checkbox" :id="index">
                                        <img  class="img-responsive m-logo" v-bind:src="['/thumbnails/' + logos.logo]" @click="getSelMediaHouse(index)" :title="logos.media_house">
                                        <input type="checkbox"  :value="logos.media_house"  v-model="selMediaH" />
                                        <i class="fa fa-check hidden"></i>
                                    </label>
                                </div>
                                <div style="padding-left: 16px;">
                                    <router-link :to="select_media_house"  class="btn btn-mat btn-info" >Back</router-link>
                                    <router-link :to="file_upload" class="btn btn-mat btn-inverse ">Next</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Default select end -->

                </div>
            </div>
        </div>
       </div>

</template>

<script>
    import  store from  '../../vuex/store';
    import moment from 'moment';
    import createPrintAd from "./createPrintAd.vue";
    import createAdWeekdays from "./createAdWeekdays.vue";

    import fileSizeWarningModal from "./fileSizeWarningModal.vue";
    import Invoice from "./invoice.vue";
    import AdSummary from "./adSummary.vue";
    import ShowProcessing from "../payment/showProcess.vue";

    export default {
        components: {
            ShowProcessing,
            AdSummary,
            Invoice,
            createPrintAd,createAdWeekdays,fileSizeWarningModal},
        name: "createAd",
        data(){
            return{
//                se : 'sec',
//                route: "{{route('ad.store')}}",
//                disable : true,
//                media : [],
//                createAd : {
//                    spots : '',
//                    mediaHouse : '',
//                    medias   : '',
//                    publishDate : '',
//                    program : '',
//                    subDesc : '',
//                    subTitle : '',
//                    file: '',
//                    rate : '',
//                },
//                file_durations : '',
//                //image : [],
//                mediaHouses : [],
//                mediaProgram : [],
//                programDate : '',
//                rates :'',
//                spot : '',
//                allErrors : [],
//                success : 'Successfully created',
//                program : '',
//                spotsAndRates : {},
//                show : false,
//                data_list : [],
//                title : '',
//                //segment_titles : [],
//                segments_data : [],
//                wsegments_data : [],
//                segments_headings:[],
//                wsegments_headings : [],
//                mediaTypes : '',
//                selMedia : '',
//                print_segments : [],
//                enable_submit : true,
//                selAd : [],
//                file : '',
                r_animate : '',
                selMediaH:[],
                selMediaHouse : '',
                showBtn : true,
                file_upload : '/user-account/create-sub-file',
                select_media_house : '/user-account/create-sub-media-house'




            }
        },
        mounted(){

        },
        methods: {

            getSelMediaHouse(id){
                $('.' + id).toggleClass('selected-media');
                console.log(id);
            },
            showSubmitBtn(){
                if(this.selMediaH.length > 0){
                    return false;

                }
                else{
                    return true;
                }
            },

            createSup() {
                let self = this;
                let formData = new FormData();
                formData.append('subTitle', self.createAd.subTitle);
                formData.append('subDesc', self.createAd.subDesc);
                formData.append('spots', self.createAd.spots);
                formData.append('program', self.createAd.program);
                formData.append('publishDate', self.createAd.publishDate);
                formData.append('medias', self.createAd.medias);
                formData.append('mediaHouse', self.createAd.mediaHouse);
                formData.append('file', self.createAd.file);
                formData.append('rate', self.createAd.rate = self.rates);


                axios.post('ads-api/store', formData).then(function (res) {

                    if (res.data.success === true) {
                        window.location.replace("http://localhost:8000/user-account/subscriptions");
                        //  window.location.protocol+"//"+loc.hostname+"/user-account/subscriptions";
                    }
                }).catch(function (error) {
                    self.allErrors = error.response.data.errors;
                    console.log(self.allErrors.mediaHouse[0]);
                    //   self.allerros = error.response.data.errors;
                    //self.success = false;
                });

            },

            fetchMediaTypes(index){
                let self = this;
                axios.get('fetch-media-types-api').then(function (res) {
                    self.mediaTypes = res.data;

                });

            },
            fetchMediaHouse() {
                let self = this;
                store.dispatch('getProcessing', true);

                axios.get('media-houses-api/' + self.createAd.medias).then(function (res) {
                    setTimeout(function () {
                        self.mediaHouses = res.data;
                        store.dispatch('getSelMediaType',self.createAd.medias);
                        self.disable = false;
                        $('#myModal').modal('show');
                    },3000);


                });
            },
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
//                if (!files.length)
//                    return;
//                this.createImage(files[0]);
                store.dispatch('getFileName' ,files[0]);
                store.dispatch('getUploadFileName',files[0].name);
            },

            handleFileUpload() {
                this.file =  this.$refs.file.files[0];
                // console.log(this.file);
                store.dispatch('getFileName' ,this.$refs.file.files[0]);
                console.log('Checking uploaded file :');
                console.log(this.file.name);
            },

            getSegments() {
                let self = this;
                store.dispatch('getProcessing', true);
                axios.get('fetch-segments/' + self.getSelectMedia + '/' + self.title).then(function (res) {
                    setTimeout(function () {
                        console.log(res.data[0]);
                        self.selMedia = res.data[1];
                        let dat = res.data[0];

                        for (let key in dat) {
                            if (dat.hasOwnProperty(key)) {
                                //  console.log(dat[key].segments);
                                if(self.selMedia.toLowerCase() === 'print'){
                                    self.print_segments = dat[key].segments;
                                    console.log(self.print_segments);
                                }
                                else{
                                    store.dispatch('getSelMediaId',dat[key].client_id);
                                    self.segments_data = dat[key].segments;
                                    self.wsegments_data = dat[key].weekends_segments;
                                    self.segments_headings = JSON.parse(dat[key].durations);
                                    self.wsegments_headings = JSON.parse(dat[key].weekends_durations);

                                }

                            }
                        }
//                    if(self.segments_headings.sec1 < self.file_durations || self.segments_headings.sec2 < self.file_durations ||
//                        self.segments_headings.sec3 < self.file_durations || self.segments_headings.sec4 < self.file_durations ||
//                        self.segments_headings.sec5 < self.file_durations){
//                                          $('#ifFileUploadGreaterThanSegDuration').modal('show');
//                    }
//                    else{
//
//                           let durations  = [];
//                            durations.push(this.segments_headings.sec1,this.segments_headings.sec2,
//                            this.segments_headings.sec3,this.segments_headings.sec4,this.segments_headings.sec5);
//
//                                              let curr = durations[0];
//                                              let diff = Math.abs (self.file_durations - curr);
//                                              for (let val = 0; val < durations.length; val++) {
//                                                  let newdiff = Math.abs (10 - durations[val]);
//                                                  if (newdiff < diff) {
//                                                      diff = newdiff;
//                                                      curr = durations[val];
//                                                  }
//                                              }
//                                              console.log(curr);
//                                       self.show = true;
//                                      $('#mol').modal('show');
//                    }

                    },300);
                    if(self.selMedia.toLowerCase() !== 'print'){
                        self.show = true;
                        $('#mol').modal('show');
                    }
                    else{
                        self.show = true;
                        $('#mol2').modal('show');
                    }

                });
            },

//
            upLoadFile(){
                let objectUrl;
                let self = this;

                $("#audio").on("canplaythrough", function(e){
                    let seconds = e.currentTarget.duration;
                    let duration = moment.duration(seconds, "seconds");


                    let time = "";
                    let hours = duration.hours();
                    if (hours > 0) { time = hours + ":" ; }

                    time = time + duration.minutes() + ":" + duration.seconds();
                    $("#duration").text(time);
                    self.file_durations =  moment.duration(time).asSeconds();
                    console.log(self.file_durations);

                    URL.revokeObjectURL(objectUrl);
                });

                $("#file").change(function(e){
                    let file = e.currentTarget.files[0];
                    self.createAd.file = file.name;
                    //  store.dispatch('getFileName', self.createAd.file);



                    $("#filename").text(file.name);
                    $("#filetype").text(file.type);
                    $("#filesize").text(file.size);

                    objectUrl = URL.createObjectURL(file);
                    $("#audio").prop("src", objectUrl);

                });


            },
            loopAdData(test_array){

                let index = -1,
                    arr_length = test_array ? test_array.length : 0,
                    resIndex = -1,
                    result = [];

                while (++index < arr_length) {
                    let value = test_array[index];

                    if ( value.mSelRate1 !== '' ||  value.tSelRate1 !== '') {
                        result[++resIndex] = value;
                    }
                }

                console.log(result);
            },
            removeMediaHouse(){

            },
            resetAdCreate(){
                let i  = ''
                ;                store.dispatch('getMonSegments', i);
            }




        },
        computed:{
            totalAdCost(){
                if (this.rates * this.createAd.spots === 0){
                    return "0.00";
                }
                else {
                    return this.rates * this.createAd.spots;
                }

            },
            programSpot(){
                if(this.createAd.spots === ""){
                    return "0";
                }
                return this.createAd.spots;

            },
            getSelectMedia(){
                return store.state.selMedia;
            },
            segment_titles(){
                return store.state.segment_titles;
            },
            showSelMediaHouseTable(){
                if( this.getSelectMedia.length === 0){
                    return false;
                }
                else{
                    return true;
                }

            },
            getCreateAdData(){
                return store.state.create_ad_data;
            },
            wiz(){
                return  store.state.wizard
            },




        },

    }
    // jquery v2.2



</script>
