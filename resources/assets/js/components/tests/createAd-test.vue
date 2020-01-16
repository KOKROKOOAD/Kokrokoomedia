<div  class="container">
    <!--<button id="notify">click me</button>-->
    <!--<p>fetching file....{{createAd.file}}</p>-->
    <!--      Wizard container
         -->
    <!--<show-processing></show-processing>-->
    <!--<payment-type></payment-type>-->


    <div v-show="wiz" class="row">
        <!--<p v-for="t in getCreateAdData">-->
        <!--{{t}}-->
        <!--</p>-->



        <div class=" col-lg-10 col-md-10 col-sm-10">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="green" id="wizard">
                    <form  enctype="multipart/form-data" @submit.prevent="createSup">
                        <!--        You can switch " data-color="green" "  with one of the next bright colors: "blue", "azure", "orange", "red"       -->

                        <div class="wizard-header">
                            <!--<h3 class="wizard-title">Create Subscription</h3>-->
                            <p class="category">Please provide valid Subcription information.</p>
                        </div>
                        <div class="wizard-navigation">
                            <div class="progress-with-circle">
                                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#location" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-map"></i>
                                        </div>
                                        <span>Media</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#type" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-direction-alt"></i>
                                        </div>
                                        File upload
                                    </a>
                                </li>
                                <li>
                                    <a href="#facilities" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-panel"></i>
                                        </div>
                                        Segments
                                    </a>
                                </li>
                                <li>
                                    <a href="#description" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-comments"></i>
                                        </div>
                                        Summary
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="location">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="info-text" style="color: rgb(246, 139, 30)">Please select media type and media house</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div :class="['form-group', allErrors.medias ? 'has-error' : ''] ">
                                            <label class="control-label text-dark">Media</label><br>
                                            <select  name="medias"  class="form-control" v-model="createAd.medias"  @click="fetchMediaHouse()">
                                                <option value="" disabled selected>- Select Media -</option>
                                                <option v-for="mTypes in mediaTypes" :value="mTypes.mediaType"><p class="media-list">{{mTypes.mediaType}}</p></option> <h5 class="info-text">What type of location do you have?</h5>
                                            </select>

                                            <div   v-if="allErrors.medias">
                                        <span class="text-danger" role="alert">
                                        <strong>
                                        {{allErrors.medias[0]}}
                                        </strong>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--selected media house shows here-->
                                <del-selected-media-house v-show="showSelMediaHouseTable"></del-selected-media-house>

                            </div>

                            <div class="tab-pane" id="type">

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="col-sm-12">
                                            <h5 class="info-text" style="color: rgb(246, 139, 30)">Please upload your file</h5>
                                        </div>
                                        <div :class="['input-group', allErrors.file ? 'has-error' : ''] ">
                                            <div class="picture-container">
                                                <div>
                                                    <!--<img src="assets/img/default-avatar.jpg" class="picture-src" id="wizardPicturePreview" title="" />-->
                                                    <input type="file"  class="custom-file-input" name="file"   ref="file" v-on:change="onFileChange($event)">
                                                    <!--<label class="custom-file-label" for="upload"><i class="ion-android-cloud-outline"></i>Choose file</label>-->

                                                    <!--<p>Select a .mp3 file</p>-->
                                                    <!--<input type="file" id="file" />-->

                                                    <audio id="audio"></audio>

                                                    <!--<p>-->
                                                    <!--<label>File Name:</label>-->
                                                    <!--<span id="filename"></span>-->
                                                    <!--</p>-->

                                                    <p>
                                                        <label>File Type:</label>
                                                        <span id="filetype"></span>
                                                    </p>

                                                    <p>
                                                        <label>File Size:</label>
                                                        <span id="filesize"></span>
                                                    </p>

                                                    <p>
                                                        <label>Duration:</label>
                                                        <span id="duration"></span>
                                                    </p>


                                                </div>

                                            </div>
                                            <div   v-if="allErrors.file">
                                                <span class="text-danger" role="alert">
                                                            <strong>
                                                                {{allErrors.file[0]}}
                                                            </strong>
                                                      </span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane" id="facilities">
                                <div class="row">

                                    <div class="col-sm-12">

                                    </div>

                                    <div class="col-sm-12">
                                        <div :class="['form-group', allErrors.segment ? 'has-error' : ''] ">
                                            <label class="control-label text-dark">Select a segment</label><br>
                                            <select  class="form-control" type="text" name="segment" @click="getSegments()" v-model="title">
                                                <option value="" disabled selected>-Select a segment-</option>
                                                <option v-for="titles in segment_titles" :value="titles.adTitle">{{titles.adTitle}}</option>
                                            </select>
                                            <div   v-if="allErrors.segment">
                                            <span class="text-danger" role="alert">
                                                <strong>
                                                {{allErrors.segment[0]}}
                                                </strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="description">
                                <div class="row">

                                    <div class="col-sm-12">

                                    </div>

                                    <div class="col-sm-12">
                                        <!--user ad creation summary-->
                                        <invoice></invoice>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                                <!--<input role="button"  class='btn btn-finish btn-fill btn-info btn-wd' name='cost'  value='view my bill' @click="fetchMediaHouse">-->
                                <input role="button" type='submit' class='btn btn-finish btn-primary btn-wd' name='finish' value='Submit'/>
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div>

        </div>


    </div> <!-- wizard container -->


    <!--file size warning modal-->
    <file-size-warning-modal :segment_headings="segments_headings" :file_durations="file_durations"></file-size-warning-modal>



    <!--display media house  modal-->
    <display-media-houses :mediaHouses="mediaHouses"></display-media-houses>
    <!-- Large modal -->

    <div v-show="selMedia.toLowerCase() !== 'print' " class="modal fade"  id="mol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

        <p>created ad :{{getCreateAdData}}</p>   <br>

        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" @click="resetAdCreate()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="molLabel1"><span class="text-danger"> {{getSelectMedia[0]}}</span> - {{title}} Rate Card</h4>
                </div>
                <div class="modal-body">

                    <!--display segment for the week-->
                    <p v-for="s in selAd">
                        {{s[0]}}
                    </p>

                    <create-ad-weekdays :segments_headings="segments_headings" :segments_data="segments_data"></create-ad-weekdays>


                </div>
            </div>
        </div>
    </div>

    <!--print rates cards-->
    <create-print-rate-cards :segments_data="print_segments" :title="title" :media="getSelectMedia" :enable_submit="enable_submit"></create-print-rate-cards>


</div> <!--  big container -->


<script>
    axios.get('fetch-segments/' + self.getSelectMedia + '/' + self.getRateCardTitle).then(function (res) {
        console.log(res.data);
//                        self.selMedia = res.data[1];
//                        let dat = res.data[0];

//                        for (let key in dat) {
//                            if (dat.hasOwnProperty(key)) {
//                                //  console.log(dat[key].segments);
//                                if(self.selMedia.toLowerCase() === 'print'){
//                                    self.print_segments = dat[key].segments;
//                                    console.log(self.print_segments);
//                                }
//                                else{
//                                  //  store.dispatch('getSelMediaId',dat[key].client_id);
//                                  //  self.segments_data = dat[key].segments;
//                                  //  self.wsegments_data = dat[key].weekends_segments;
//                                      self.segments_data = dat[key].durations;
//                                      console.log(self.segments_data);
//                                   // self.wsegments_headings = JSON.parse(dat[key].weekends_durations);
//
//                                }
//                            }
//                        }

//                    if(self.selMedia.toLowerCase() !== 'print'){
//                        self.show = true;
//                        $('#mol').modal('show');
//                    }
//                    else{
//                        self.show = true;
//                        $('#mol2').modal('show');
//                    }

    }).catch(function (error) {
        console.log(error);
    });
</script>