<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>File upload form</h4>
                            <span>What type of file do you want to <code>Publish</code>, Select a file to get continue.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">File upload</a>
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

                    <!-- File upload card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>File Upload</h5>
                            <!--<div class="card-header-right">-->
                                <!--<ul class="list-unstyled card-option">-->
                                    <!--<li><i class="feather icon-maximize full-card"></i></li>-->
                                    <!--<li><i class="feather icon-minus minimize-card"></i></li>-->
                                    <!--<li><i class="feather icon-trash-2 close-card"></i></li>-->
                                <!--</ul>-->
                            <!--</div>-->
                        </div>
                        <div class="card-block">
                            <!--<div class="sub-title">Example 1</div>-->
                            <input  type="file" name="files" id="filer_input1" ref="file" accept=".xlsx,.xls,.pdf,.odt,.docx,.mp3,.wav,.jpeg,.png,.jpg,.mp4,.avi," v-on:change="onFileChange($event)">
                            <!--<input v-show="getSelectMedia === 'TV'" type="file" name="files" id="filer_input2" ref="file" accept=".xlsx,.xls,.pdf,.odt,.docx,.mp3,.wav,.mp4,.avi,.jpeg,.png,.jpg" v-on:change="onFileChange($event)">-->
                            <!--<input v-show="getSelectMedia === 'PRINT'" type="file" name="files" id="filer_input3" ref="file" accept=".xlsx,.xls,.pdf,.odt,.docx,.jpeg,.png,.jpg" v-on:change="onFileChange($event)">-->

                            <div style="padding-top: 16px;">
                                <router-link :to="select_media_house" role="button" type="button" class="btn btn-mat btn-inverse " >Back</router-link>
                                <router-link :to="select_rate_card" v-show="file" role="button" type="button" class="btn btn-mat btn-info animated fadeIn" >Next</router-link>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  store from  '../../vuex/store';
    import moment from 'moment';



    export default {

        name: "fileUpload",
        data(){
            return{
                select_media_house : '/user-account/create-sub-media-house',
                select_rate_card : '/user-account/create-sub-rate-card',
                calender_url : '/user-account/select-calender',
                files : '',
                radio_ext : ["xlsx","xls","pdf","odt","docx","mp3","wav","jpeg","jpg","png"],
                tv_ext : ["xlsx","xls","pdf","odt","docx","mp3","wav","mp4","avi","jpeg","png","jpg"],
                print_ext : ["xlsx","xls","pdf","odt","docx","jpeg","png","jpg" ],
                ext : '',
                file_size : '',
                audio_video_ext : ['.mp3','.wav','mp4','avi'],
                file_durations : ''
            }
        },
        mounted(){

        },
        methods: {

            onFileChange(e) {

                let files = e.target.files || e.dataTransfer.files;
                 this.ext  =  files[0].name.split('.').pop();
                 this.file_size = files[0].size;

                if (this.getSelectMedia === 'RADIO'){
                        if(this.radio_ext.includes(this.ext)){
                            store.dispatch('getFile' ,files[0]);
                            store.dispatch('getUploadFileName',files[0].name);
                            store.dispatch('getFileSize', this.file_size);
                            console.log(this.ext);

                        }
                        else{
                            store.dispatch('getFile' , '');
                            store.dispatch('getUploadFileName', '');

                            console.log('Invalid file selected');
                            console.log(this.ext);

                        }
                }


                 if (this.getSelectMedia === 'TV') {
                     if (this.tv_ext.includes(this.ext)) {
                         store.dispatch('getFile', files[0]);
                         store.dispatch('getUploadFileName', files[0].name);
                         store.dispatch('getFileSize', this.file_size);

                     }
                     else{
                         store.dispatch('getFile' , '');
                         store.dispatch('getUploadFileName', '');

                         console.log('Invalid file selected');
                         console.log(this.ext);

                     }
                 }


                    if (this.getSelectMedia === 'PRINT'){
                        if(this.print_ext.includes(this.ext)){
                            store.dispatch('getFile' ,files[0]);
                            store.dispatch('getUploadFileName',files[0].name);
                            store.dispatch('getFileSize', this.file_size);

                        }
                    else{
                        store.dispatch('getFile' , '');
                        store.dispatch('getUploadFileName', '');

                        console.log('Invalid file selected');

                    }
                }


                    if(this.audio_video_ext.includes(this.ext)){
                        let seconds = e.currentTarget.duration;
                        let duration = moment.duration(seconds, "seconds");


                        let time = "";
                        let hours = duration.hours();
                        if (hours > 0) { time = hours + ":" ; }

                        time = time + duration.minutes() + ":" + duration.seconds();
                       // $("#duration").text(time);
                        self.file_durations =  moment.duration(time).asSeconds();
                        console.log(self.file_durations);
                    }




            },

            // handleFileUpload() {
            //     this.file =  this.$refs.file.files[0];
            //     // console.log(this.file);
            //     store.dispatch('getFile' ,this.$refs.file.files[0]);
            //     console.log('Checking uploaded file :');
            //     console.log(this.file.name);
            // },

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

        },
        computed:{
            segData(){
                return store.getters.segmentsData;
            },
            getSelectMedia(){
                return store.state.selMedia;
            },
            file(){
                return store.state.file;
            }


            },


    }
    // jquery v2.2



</script>
