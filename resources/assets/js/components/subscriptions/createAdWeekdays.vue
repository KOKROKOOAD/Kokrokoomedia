<template>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"> Weekdays</h4>
                                            </div>
                                            <div class="card-body">
                                                <div>


                                                    <!--monday-->

                                                    <div class="pull-right">
                                                    <button @click="resetAdCreate()"  class="btn btn-default btn-sm " :title="scheduled_ad"><i class="glyphicon glyphicon-credit-card"></i> </button>

                                                        <button v-show="sche" class="btn btn-primary btn-xs" @click="schedules()" title="schedule ad"><i class="glyphicon glyphicon-plus"></i></button>
                                                        <button v-show="placeAd" class="btn btn-secondary btn-sm" @click="placeAds()" title="place ad"><i class="glyphicon glyphicon-plus-sign"></i></button>

                                                        <div class="pull-right">
                                                           <button @click="showSchedule()" class="btn btn-primary btn-sm"  :title="scheduled_ad">
                                                               <i class="glyphicon glyphicon-calendar"></i>
                                                           </button>
                                                           <span v-show="getTotalScheduledAds > 0" class="badge badge-notify">{{getTotalScheduledAds}}</span>
                                                       </div>


                                                    <!--<button @click="showSchedule()"   class="btn btn-primary btn-xs " :title="scheduled_ad"><i class="glyphicon glyphicon-calendar"></i> <span class="badge badge-notify">3</span></button>-->

                                                    </div>
                                                    <table  class="table">
                                                        <thead class=" text-primary">
                                                        <tr class="animated fadeIn " style='background: #36475F;color:#ffffff;font-family: "Roboto", sans-serif;font-weight: 500;font-size: 13px;text-align: center !important'>
                                                            <th>{{segments_headings.mon}}</th>
                                                            <th v-show="avSpots" class="animated fadeIn">Spots avai.</th>
                                                            <th>spots</th>
                                                            <th v-if="segments_headings.sec1 > 0">{{segments_headings.sec1}} {{segments_headings.time1}}</th>
                                                            <th v-if="segments_headings.sec2 > 0">{{segments_headings.sec2}} {{segments_headings.time2}}</th>
                                                            <th v-if="segments_headings.sec3 > 0">{{segments_headings.sec3}} {{segments_headings.time3}}</th>
                                                            <th v-if="segments_headings.sec4 > 0">{{segments_headings.sec4}} {{segments_headings.time4}}</th>
                                                            <th v-if="segments_headings.sec5 > 0">{{segments_headings.sec5}} {{segments_headings.time5}}</th>


                                                            <th v-show="schedule">
                                                                Schedule date
                                                            </th>
                                                        </tr>

                                                        </thead>
                                                        <tbody>
                                                        <!--<p> selected date is : {{myDate}}</p>-->
                                                        <tr v-for=" (segment,index) in segments_data" :key="index" style='font-weight: 100;font-family: "Lato", sans-serif;font-size:12.5px;background: #EAEAEA;color:#0c0c0c;text-align:center'>

                                                            <!--<td>-->
                                                                <!--<input class="form-control"  type="file" style="width: 200px;"/>-->
                                                            <!--</td>-->


                                                            <td>{{segment.mon_duration}}<span style="padding-left: 2px;padding-right: 2px;">-</span>{{segment.mon_b_duration}}</td>
                                                            <td v-show="avSpots">{{segment.mon_spots}}</td>
                                                            <td>

                                                                <select :disabled="mon_sel_date[index] === ''" class="form-control" v-model="spots[index]">
                                                                    <option  :selected="selected" value="" disabled>spots</option>
                                                                    <option v-for=" (s) in spot(segment.mon_spots)" :name="'seA' + (index)"   :value="s" >{{s}}</option>
                                                                </select>


                                                            </td>
                                                            <td v-if="segment.sec1_rate  !== null "><input type="radio" :name="'seA' + (index)" :value="{'segment':segment.mon_duration + '-' + segment.mon_b_duration,'day' : segments_headings.mon,sec : segments_headings.sec1,'rate':segment.sec1_rate, 'date': mon_sel_date[index],'spot':spots[index],'media':getSelMediaHouse,'file':getFileName}" v-model="mSelRate[index]"/>{{segment.sec1_rate}} GHC</td>
                                                            <td v-if="segment.sec2_rate  !== null "><input type="radio" :name="'seB' + (index)" :value="{'segment':segment.mon_duration + '-' + segment.mon_b_duration,'day' : segments_headings.mon,sec : segments_headings.sec2,'rate':segment.sec2_rate, 'date': mon_sel_date[index],'spot':spots[index],'media':getSelMediaHouse,'file':getFileName}" v-model="mSelRate[index]"/>{{segment.sec2_rate}} GHC</td>
                                                            <td v-if="segment.sec3_rate  !== null "><input type="radio" :name="'seC' + (index)" :value="{'segment':segment.mon_duration + '-' + segment.mon_b_duration,'day' : segments_headings.mon,sec : segments_headings.sec3,'rate':segment.sec3_rate, 'date': mon_sel_date[index],'spot':spots[index],'media':getSelMediaHouse,'file':getFileName}" v-model="mSelRate[index]"/>{{segment.sec3_rate}} GHC</td>
                                                            <td v-if="segment.sec4_rate  !== null "><input type="radio" :name="'seD' + (index)" :value="{'segment':segment.mon_duration + '-' + segment.mon_b_duration,'day' : segments_headings.mon,sec : segments_headings.sec4,'rate':segment.sec4_rate, 'date': mon_sel_date[index],'spot':spots[index],'media':getSelMediaHouse,'file':getFileName}" v-model="mSelRate[index]"/>{{segment.sec4_rate}} GHC</td>
                                                            <td v-if="segment.sec5_rate  !== null "><input type="radio" :name="'seF' + (index)" :value="{'segment':segment.mon_duration + '-' + segment.mon_b_duration,'day' : segments_headings.mon,sec : segments_headings.sec5,'rate':segment.sec5_rate, 'date': mon_sel_date[index],'spot':spots[index],'media':getSelMediaHouse,'file':getFileName}" v-model="mSelRate[index]"/>{{segment.sec5_rate}} GHC</td>
                                                            <td v-show="schedule">
                                                                <div class="form-group">
                                                                    <div class="input-group date form_dat col-md-2"   data-link-format="yyyy-mm-dd">
                                                                        <input class="form-control"   type="date" placeholder="select date"    v-model="mon_sel_date[index]">
                                                                        <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>-->
                                                                        <span   class="input-group-addon"> <button   class="btn btn-primary btn-xs notif  " style="height: 20px;" @click="storeDates(index,monSegments)"><span aria-disabled="true" class="glyphicon glyphicon-save" title="save"  ></span></button></span>
                                                                        <!--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" @click="tim"></span></span>-->
                                                                    </div>



                                                                    <!--<input type="hidden" class="dtp_input2" v-model="myDate[index]" />-->
                                                                </div>
                                                                <!--<input type="date" class="animate fadeIn" v-model="myDate[index]" />-->

                                                                <!--<span v-show="schedule">-->
                                                                <!--<button   class="btn btn-primary btn-xs" @click="storeDates(index)" style="border:none">-->
                                                                <!--<i class="fa fa-save"></i></button>-->
                                                                <!--</span>-->

                                                                <!--<select style="width: 100px; !important;" v-model="schedule_d[index]">-->
                                                                <!--<option value="" disabled selected>schedule date</option>-->
                                                                <!--<option v-for="(d,i) in schedule_date" :value="d.date" :key="i">{{d.date}}</option>-->
                                                                <!--</select>-->

                                                            </td>




                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>

                                                </div>
                                                <div>
                                                    <table class="table">
                                                        <!--tuesday-->
                                                        <thead class=" text-primary">
                                                        <tr class="animated fadeIn" style='background: #36475F;color:#ffffff;font-family: "Roboto", sans-serif;font-weight: 500;font-size: 13px;'>
                                                            <th>{{segments_headings.tue}}</th>
                                                            <th v-show="avSpots" class="animated fadeIn">Spots avai.</th>
                                                            <th>spots</th>
                                                            <th v-if="segments_headings.sec1 > 0">{{segments_headings.sec1}} {{segments_headings.time1}}</th>
                                                            <th v-if="segments_headings.sec2 > 0">{{segments_headings.sec2}} {{segments_headings.time2}}</th>
                                                            <th v-if="segments_headings.sec3 > 0">{{segments_headings.sec3}} {{segments_headings.time3}}</th>
                                                            <th v-if="segments_headings.sec4 > 0">{{segments_headings.sec4}} {{segments_headings.time4}}</th>
                                                            <th v-if="segments_headings.sec5 > 0">{{segments_headings.sec5}} {{segments_headings.time5}}</th>

                                                            <th v-show="schedule">Date</th>
                                                        </tr>

                                                        </thead>
                                                        <tbody>
                                                        <tr v-for=" (segment,index) in segments_data" :key="index" style='font-weight: 100;font-family: "Lato", sans-serif;font-size:12.5px;background: #EAEAEA;color:#0c0c0c;text-align:center'>

                                                            <td>{{segment.tue_duration}}<span style="padding-left: 2px;padding-right: 2px;">-</span>{{segment.tue_b_duration}}</td>
                                                            <td v-show="avSpots">{{segment.tue_spots}}</td>
                                                            <td>
                                                                <select v-model="spots[index]">
                                                                    <option v-for=" (s,i) in spot(segment.mon_spots)" name="sel" selected="1" :value="s" :key="i">{{s}}</option>
                                                                </select>
                                                            </td>

                                                            <td v-if="segment.sec1_rate  !== null "><input type="radio" :name="'sea' + (index)" :value="{'segment':segment.tue_duration + '-' + segment.tue_b_duration,'day' : segments_headings.tue,sec : segments_headings.sec1,'rate':segment.sec1_rate, 'date': schedule_date,'spot':spots[index]}" v-model="tSelRate[index]"/>{{segment.sec1_rate}} GHC</td>
                                                            <td v-if="segment.sec2_rate  !== null "><input type="radio" :name="'seb' + (index)" :value="{'segment':segment.tue_duration + '-' + segment.tue_b_duration,'day' : segments_headings.tue,sec : segments_headings.sec2,'rate':segment.sec2_rate, 'date': schedule_date,'spot':spots[index]}" v-model="tSelRate[index]"/>{{segment.sec2_rate}} GHC</td>
                                                            <td v-if="segment.sec3_rate  !== null "><input type="radio" :name="'sec' + (index)" :value="{'segment':segment.tue_duration + '-' + segment.tue_b_duration,'day' : segments_headings.tue,sec : segments_headings.sec3,'rate':segment.sec3_rate, 'date': schedule_date,'spot':spots[index]}" v-model="tSelRate[index]"/>{{segment.sec3_rate}} GHC</td>
                                                            <td v-if="segment.sec4_rate  !== null "><input type="radio" :name="'sed' + (index)" :value="{'segment':segment.tue_duration + '-' + segment.tue_b_duration,'day' : segments_headings.tue,sec : segments_headings.sec4,'rate':segment.sec4_rate, 'date': schedule_date,'spot':spots[index]}" v-model="tSelRate[index]"/>{{segment.sec4_rate}} GHC</td>
                                                            <td v-if="segment.sec5_rate  !== null "><input type="radio" :name="'sef' + (index)" :value="{'segment':segment.tue_duration + '-' + segment.tue_b_duration,'day' : segments_headings.tue,sec : segments_headings.sec5,'rate':segment.sec5_rate, 'date': schedule_date,'spot':spots[index]}" v-model="tSelRate[index]"/>{{segment.sec5_rate}} GHC</td>

                                                            <td v-show="schedule">
                                                                <!--<div class="form-group" style="height: 20px;">-->
                                                                <!--<div class="input-group date form_date col-md-2"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
                                                                <!--<input class="form-control" size="28" :name="'seG' + (index)" style="width: 140px;" type="text"  readonly  v-model="myDate">-->
                                                                <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
                                                                <!--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" @click="tim"></span></span>-->
                                                                <!--</div>-->
                                                                <!--<input type="hidden" class="dtp_input2" />-->
                                                                <!--</div>-->
                                                                <input type="date" class="animate fadeIn" v-model="myDate[index]" />

                                                                <span v-show="schedule">
                                                               <button   class="btn btn-primary btn-xs" @click="storeDates(index)" style="border:none">
                                                                   <i class="fa fa-save"></i></button>
                                                               </span>

                                                                <select style="width: 100px; !important;" v-model="schedule_d[index]">
                                                                    <option value="" disabled selected>schedule date</option>
                                                                    <option v-for="(d,i) in schedule_date" :value="d.date" :key="i">{{d.date}}</option>
                                                                </select>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                </div>
                                                    <!--wednesday-->
                                                    <div>

                                                        <table class="table">
                                                            <thead class=" text-primary">
                                                            <tr class="animated fadeIn" style='background: #36475F;color:#ffffff;font-family: "Roboto", sans-serif;font-weight: 500;font-size: 13px;'>
                                                                <th>{{segments_headings.wed}}</th>
                                                                <th v-show="avSpots" class="animated fadeIn">Spots avai.</th>
                                                                <th>spots</th>
                                                                <th v-if="segments_headings.sec1 > 0">{{segments_headings.sec1}} {{segments_headings.time1}}</th>
                                                                <th v-if="segments_headings.sec2 > 0">{{segments_headings.sec2}} {{segments_headings.time2}}</th>
                                                                <th v-if="segments_headings.sec3 > 0">{{segments_headings.sec3}} {{segments_headings.time3}}</th>
                                                                <th v-if="segments_headings.sec4 > 0">{{segments_headings.sec4}} {{segments_headings.time4}}</th>
                                                                <th v-if="segments_headings.sec5 > 0">{{segments_headings.sec5}} {{segments_headings.time5}}</th>

                                                                <th v-show="schedule">Date</th>
                                                            </tr>

                                                            </thead>
                                                            <tbody>

                                                            <tr v-for=" (segment,index) in segments_data"  :key="index" style='font-weight: 100;font-family: "Lato", sans-serif;font-size:12.5px;background: #EAEAEA;color:#0c0c0c'>

                                                                <td>{{segment.wed_duration}}<span style="padding-left: 2px;padding-right: 2px;">-</span>{{segment.wed_b_duration}}</td>
                                                                <td v-show="avSpots">{{segment.wed_spots}}</td>
                                                                <td>
                                                                    <select v-model="spots[index]">
                                                                        <option v-for=" (s,i) in spot(segment.wed_spots)" name="sel" selected="1" :value="s" :key="i">{{s}}</option>
                                                                    </select>
                                                                </td>

                                                                <td v-if="segment.sec1_rate  !== null "><input type="radio" :name="'sea1' + (index)" :value="{'segment':segment.wed_duration + '-' + segment.wed_b_duration,'day' : segments_headings.wed,sec : segments_headings.sec1,'rate':segment.sec1_rate, 'date': schedule_date,'spot':spots[index]}" v-model="wSelRate[index]"/>{{segment.sec1_rate}} GHC</td>
                                                                <td v-if="segment.sec2_rate  !== null "><input type="radio" :name="'seb2' + (index)" :value="{'segment':segment.wed_duration + '-' + segment.wed_b_duration,'day' : segments_headings.wed,sec : segments_headings.sec2,'rate':segment.sec2_rate, 'date': schedule_date,'spot':spots[index]}" v-model="wSelRate[index]"/>{{segment.sec2_rate}} GHC</td>
                                                                <td v-if="segment.sec3_rate  !== null "><input type="radio" :name="'sec3' + (index)" :value="{'segment':segment.wed_duration + '-' + segment.wed_b_duration,'day' : segments_headings.wed,sec : segments_headings.sec3,'rate':segment.sec3_rate, 'date': schedule_date,'spot':spots[index]}" v-model="wSelRate[index]"/>{{segment.sec3_rate}} GHC</td>
                                                                <td v-if="segment.sec4_rate  !== null "><input type="radio" :name="'sed4' + (index)" :value="{'segment':segment.wed_duration + '-' + segment.wed_b_duration,'day' : segments_headings.wed,sec : segments_headings.sec4,'rate':segment.sec4_rate, 'date': schedule_date,'spot':spots[index]}" v-model="wSelRate[index]"/>{{segment.sec4_rate}} GHC</td>
                                                                <td v-if="segment.sec5_rate  !== null "><input type="radio" :name="'sef5' + (index)" :value="{'segment':segment.wed_duration + '-' + segment.wed_b_duration,'day' : segments_headings.wed,sec : segments_headings.sec5,'rate':segment.sec5_rate, 'date': schedule_date,'spot':spots[index]}" v-model="wSelRate[index]"/>{{segment.sec5_rate}} GHC</td>

                                                                <td v-show="schedule">
                                                                    <!--<div class="form-group" style="height: 20px;">-->
                                                                    <!--<div class="input-group date form_date col-md-2"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
                                                                    <!--<input class="form-control" size="28" :name="'seG' + (index)" style="width: 140px;" type="text"  readonly  v-model="myDate">-->
                                                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
                                                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" @click="tim"></span></span>-->
                                                                    <!--</div>-->
                                                                    <!--<input type="hidden" class="dtp_input2" />-->
                                                                    <!--</div>-->
                                                                    <input type="date" class="animate fadeIn" v-model="myDate[index]" />

                                                                    <span v-show="schedule">
                                                               <button   class="btn btn-primary btn-xs" @click="storeDates(index)" style="border:none">
                                                                   <i class="fa fa-save"></i></button>
                                                               </span>

                                                                    <select style="width: 100px; !important;" v-model="schedule_d[index]">
                                                                        <option value="" disabled selected>schedule date</option>
                                                                        <option v-for="(d,i) in schedule_date" :value="d.date" :key="i">{{d.date}}</option>
                                                                    </select>

                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>

                                                    </div>
                                                    <!--thursday-->
                                                    <div>
                                                        <table class="table">
                                                            <thead class=" text-primary">
                                                            <tr class="animated fadeIn" style='background: #36475F;color:#ffffff;font-family: "Roboto", sans-serif;font-weight: 500;font-size: 13px;'>
                                                                <th>{{segments_headings.thu}}</th>
                                                                <th v-show="avSpots" class="animated fadeIn">Spots avai.</th>
                                                                <th>spots</th>
                                                                <th v-if="segments_headings.sec1 > 0">{{segments_headings.sec1}} {{segments_headings.time1}}</th>
                                                                <th v-if="segments_headings.sec2 > 0">{{segments_headings.sec2}} {{segments_headings.time2}}</th>
                                                                <th v-if="segments_headings.sec3 > 0">{{segments_headings.sec3}} {{segments_headings.time3}}</th>
                                                                <th v-if="segments_headings.sec4 > 0">{{segments_headings.sec4}} {{segments_headings.time4}}</th>
                                                                <th v-if="segments_headings.sec5 > 0">{{segments_headings.sec5}} {{segments_headings.time5}}</th>

                                                                <th v-show="schedule">Date</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr v-for=" (segment,index) in segments_data"  :key="index" style='font-weight: 100;font-family: "Lato", sans-serif;font-size:12.5px;background: #EAEAEA;color:#0c0c0c'>

                                                                <td>{{segment.thu_duration}}<span style="padding-left: 2px;padding-right: 2px;">-</span>{{segment.thu_b_duration}}</td>
                                                                <td v-show="avSpots">{{segment.thu_spots}}</td>
                                                                <td>
                                                                    <select v-model="spots[index]">
                                                                        <option v-for=" (s,i) in spot(segment.thu_spots)" name="sel" selected="1" :value="s" :key="i">{{s}}</option>
                                                                    </select>
                                                                </td>

                                                                <td v-if="segment.sec1_rate  !== null "><input type="radio" :name="'sea' + (index)" :value="{'segment':segment.thu_duration + '-' + segment.thu_b_duration,'day' : segments_headings.thu,sec : segments_headings.sec1,'rate':segment.sec1_rate, 'date': schedule_date,'spot':spots[index]}" v-model="thSelRate[index]"/>{{segment.sec1_rate}} GHC</td>
                                                                <td v-if="segment.sec2_rate  !== null "><input type="radio" :name="'seb67' + (index)" :value="{'segment':segment.thu_duration + '-' + segment.thu_b_duration,'day' : segments_headings.thu,sec : segments_headings.sec2,'rate':segment.sec2_rate, 'date': schedule_date,'spot':spots[index]}" v-model="thSelRate[index]"/>{{segment.sec2_rate}} GHC</td>
                                                                <td v-if="segment.sec3_rate  !== null "><input type="radio" :name="'sec8' + (index)" :value="{'segment':segment.thu_duration + '-' + segment.thu_b_duration,'day' : segments_headings.thu,sec : segments_headings.sec3,'rate':segment.sec3_rate, 'date': schedule_date,'spot':spots[index]}" v-model="thSelRate[index]"/>{{segment.sec3_rate}} GHC</td>
                                                                <td v-if="segment.sec4_rate  !== null "><input type="radio" :name="'sed9' + (index)" :value="{'segment':segment.thu_duration + '-' + segment.thu_b_duration,'day' : segments_headings.thu,sec : segments_headings.sec4,'rate':segment.sec4_rate, 'date': schedule_date,'spot':spots[index]}" v-model="thSelRate[index]"/>{{segment.sec4_rate}} GHC</td>
                                                                <td v-if="segment.sec5_rate  !== null "><input type="radio" :name="'sef10' + (index)" :value="{'segment':segment.thu_duration + '-' + segment.thu_b_duration,'day' : segments_headings.thu,sec : segments_headings.sec5,'rate':segment.sec5_rate, 'date': schedule_date,'spot':spots[index]}" v-model="thSelRate[index]"/>{{segment.sec5_rate}} GHC</td>

                                                                <td v-show="schedule">
                                                                    <!--<div class="form-group" style="height: 20px;">-->
                                                                    <!--<div class="input-group date form_date col-md-2"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
                                                                    <!--<input class="form-control" size="28" :name="'seG' + (index)" style="width: 140px;" type="text"  readonly  v-model="myDate">-->
                                                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
                                                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" @click="tim"></span></span>-->
                                                                    <!--</div>-->
                                                                    <!--<input type="hidden" class="dtp_input2" />-->
                                                                    <!--</div>-->
                                                                    <input type="date" class="animate fadeIn" v-model="myDate[index]" />

                                                                    <span v-show="schedule">
                                                               <button   class="btn btn-primary btn-xs" @click="storeDates(index)" style="border:none">
                                                                   <i class="fa fa-save"></i></button>
                                                               </span>

                                                                    <select style="width: 100px; !important;" v-model="schedule_d[index]">
                                                                        <option value="" disabled selected>schedule date</option>
                                                                        <option v-for="(d,i) in schedule_date" :value="d.date" :key="i">{{d.date}}</option>
                                                                    </select>


                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <!--friday-->
                                                    <div class="table-responsive">
                                                        <!--monday-->
                                                        <table class="table">
                                                            <thead class=" text-primary">
                                                            <tr class="animated fadeIn" style='background: #36475F;color:#ffffff;font-family: "Roboto", sans-serif;font-weight: 500;font-size: 13px;'>
                                                                <th>{{segments_headings.fri}}</th>
                                                                <th v-show="avSpots" class="animated fadeIn">Spots avai.</th>
                                                                <th>spots</th>
                                                                <th v-if="segments_headings.sec1 > 0">{{segments_headings.sec1}} {{segments_headings.time1}}</th>
                                                                <th v-if="segments_headings.sec2 > 0">{{segments_headings.sec2}} {{segments_headings.time2}}</th>
                                                                <th v-if="segments_headings.sec3 > 0">{{segments_headings.sec3}} {{segments_headings.time3}}</th>
                                                                <th v-if="segments_headings.sec4 > 0">{{segments_headings.sec4}} {{segments_headings.time4}}</th>
                                                                <th v-if="segments_headings.sec5 > 0">{{segments_headings.sec5}} {{segments_headings.time5}}</th>

                                                                <th v-show="schedule">Date</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr v-for=" (segment,index) in segments_data"  :key="index" style='font-weight: 100;font-family: "Lato", sans-serif;font-size:12.5px;background: #EAEAEA;color:#0c0c0c'>

                                                                <td>{{segment.fri_duration}}<span style="padding-left: 2px;padding-right: 2px;">-</span>{{segment.thu_b_duration}}</td>
                                                                <td v-show="avSpots">{{segment.fri_spots}}</td>
                                                                <td>
                                                                    <select v-model="spots[index]">
                                                                        <option v-for=" (s,i) in spot(segment.thu_spots)" name="sel" selected="1" :value="s" :key="i">{{s}}</option>
                                                                    </select>
                                                                </td>

                                                                <td v-if="segment.sec1_rate  !== null "><input type="radio" :name="'sea' + (index)" :value="{'segment':segment.fri_duration + '-' +  segment.fri_b_duration,'day' : segments_headings.fri,sec : segments_headings.sec1,'rate':segment.sec1_rate, 'date': schedule_date,'spot':spots[index]}" v-model="fSelRate[index]"/>{{segment.sec1_rate}} GHC</td>
                                                                <td v-if="segment.sec2_rate  !== null "><input type="radio" :name="'seb67' + (index)" :value="{'segment':segment.fri_duration + '-' + segment.fri_b_duration,'day' : segments_headings.fri,sec : segments_headings.sec2,'rate':segment.sec2_rate, 'date': schedule_date,'spot':spots[index]}" v-model="fSelRate[index]"/>{{segment.sec2_rate}} GHC</td>
                                                                <td v-if="segment.sec3_rate  !== null "><input type="radio" :name="'sec8' + (index)" :value="{'segment':segment.fri_duration + '-' +  segment.fri_b_duration,'day' : segments_headings.fri,sec : segments_headings.sec3,'rate':segment.sec3_rate, 'date': schedule_date,'spot':spots[index]}" v-model="fSelRate[index]"/>{{segment.sec3_rate}} GHC</td>
                                                                <td v-if="segment.sec4_rate  !== null "><input type="radio" :name="'sed9' + (index)" :value="{'segment':segment.fri_duration + '-' +  segment.fri_b_duration,'day' : segments_headings.fri,sec : segments_headings.sec4,'rate':segment.sec4_rate, 'date': schedule_date,'spot':spots[index]}" v-model="fSelRate[index]"/>{{segment.sec4_rate}} GHC</td>
                                                                <td v-if="segment.sec5_rate  !== null "><input type="radio" :name="'sef10' + (index)" :value="{'segment':segment.fri_duration + '-' + segment.fri_b_duration,'day' : segments_headings.fri,sec : segments_headings.sec5,'rate':segment.sec5_rate, 'date': schedule_date,'spot':spots[index]}" v-model="fSelRate[index]"/>{{segment.sec5_rate}} GHC</td>

                                                                <td v-show="schedule">
                                                                    <!--<div class="form-group" style="height: 20px;">-->
                                                                    <!--<div class="input-group date form_date col-md-2"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
                                                                    <!--<input class="form-control" size="28" :name="'seG' + (index)" style="width: 140px;" type="text"  readonly  v-model="myDate">-->
                                                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
                                                                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" @click="tim"></span></span>-->
                                                                    <!--</div>-->
                                                                    <!--<input type="hidden" class="dtp_input2" />-->
                                                                    <!--</div>-->
                                                                    <input type="date" class="animate fadeIn" v-model="myDate[index]" />

                                                                    <span v-show="schedule">
                                                               <button   class="btn btn-primary btn-xs" @click="storeDates(index)" style="border:none">
                                                                   <i class="fa fa-save"></i></button>
                                                               </span>
                                                                    <select style="width: 100px; !important;" v-model="schedule_d[index]">
                                                                        <option value="" disabled selected>schedule date</option>
                                                                        <option v-for="(d,i) in schedule_date" :value="d.date" :key="i">{{d.date}}</option>
                                                                    </select>


                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                    </div>

                                                 </div> <!--  big container -->

                                            </div>
                                           <div class="modal-footer" style="border: none;">
                                            <button v-show="sche" class="btn btn-info pull-right" @click="manag()">Submit</button>
                                            <!--<button v-show="placeAd" class="btn btn-info pull-right" @click="storeDates()" style="margin-right:20px;">Schedule</button>-->
                                            <button v-show="placeAd"   @click="showSchedule()"   class="btn btn-secondary pull-right ">Summary</button>

                                        </div>

                                    </div>
                                    </div>



</template>

<script>
    import moment from 'moment'
    import createPrintAd from "./createPrintAd.vue";
    import  store from  '../../vuex/store';
    export default {
        props : ['segments_headings','segments_data'],
        components: {createPrintAd},
        name: "createAdWeekdays",

        data(){
            return {
                mSelRate : [],
                     m_schedule_date : [],
                     mSelRate1 : '',
                     spots : [],
                     myDate : [],
                     mon_sel_date : [],
                     tSelRate : [],
                     wSelRate : [],
                     thSelRate : [],
                     fSelRate : [],
                      schedule : false,
                      placeAd : false,
                      avSpots : true,
                      createAd:[],
                      schedule_date : [],
                      sche : true,
                     schedule_d : [],
                      show_sched : false,
                      animated : '',
                      scheduled_ad : 'scheduled ads',
                      ad_sched : false,


                picked : '',
                tes : ''

            }

        },
        mounted(){
           store.dispatch('getMonSegments',this.mSelRate);
        },
        methods: {
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

                    $("#filename").text(file.name);
                    $("#filetype").text(file.type);
                    $("#filesize").text(file.size);

                    objectUrl = URL.createObjectURL(file);
                    $("#audio").prop("src", objectUrl);

                });


            },
            test(){
                let self = this;
                let dat =  self.createAd;
                for (let key in dat) {
                    if (dat.hasOwnProperty(key)) {
                         // console.log(dat[key]);
                        if( typeof dat.hasOwnProperty(key).tSelRate1 === 'undefined'){
                               delete dat.hasOwnProperty(key.tSelRate1);
                            console.log(dat);
                        }
                        else{
                            dat = dat.filter(function( element ) {
                                return element !== undefined;
                            });

                            console.log(dat);
                        }
                    }
                }
            },
            manag(){
              for (let i = 0; i < this.monSegments.length; i++){
                     this.createAd.push(this.monSegments[i]);
              }
                for (let i = 0; i < this.tSelRate.length; i++){
                    this.createAd.push(this.tSelRate[i]);
                }
                for (let i = 0; i < this.wSelRate.length; i++){
                    this.createAd.push(this.wSelRate[i]);
                }
                for (let i = 0; i < this.thSelRate.length; i++){
                    this.createAd.push(this.thSelRate[i]);
                }
                for (let i = 0; i < this.fSelRate.length; i++){
                    this.createAd.push(this.fSelRate[i]);
                }
                console.log(this.createAd);
                store.dispatch('getCreatedAdData', this.createAd);
                // modal
                 $('#mol').modal('hide');
            },
            tim(){
                $('.form_date').datetimepicker({
                    language:  'en',
                    weekStart: 1,
                    todayBtn:  1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    minView: 2,
                    forceParse: 0
                });
                console.log('clicked');
            },
            schedules(){
             this.schedule  = true;
             this.avSpots = false;
             this.sche = false;
             this.placeAd = true;

            },
            placeAds(){
                this.schedule  = false;
                this.avSpots = true;
                this.sche = true;
                this.placeAd = false;
            },
            spot(spot){
                let s = parseInt(spot);
                let results = [];

                for (let i = 1; i < s + 1; i++){
                    results.push(i);
                }

                     return results;

            },
            storeDates(index,segments){
             console.log(this.getSelFile);
                this.createAd.push(segments[index]);
//                store.dispatch('getCreatedAdData', this.createAd);
                store.dispatch('getScheduleAd',this.createAd);
                this.mSelRate[index] = '';
                this.mon_sel_date[index] = '';
                 let listItem = $( "#notify" );
               // alert( "Index: " + $( "button" ).index( listItem ) );

                $('.notif').each(function (index,obj) {
                    $('.notif').notify(
                        "ad successfully added to scheduled list",
                        {  elementPosition: 'bottom right',
                            autoHideDelay: 3000,
                            className : 'success'
                        }
                    );
                });



            },
            showSaveBtn(segRate,selDate,index){
                if(segRate[index] === [] || selDate[index] === []){
                    return true;
                }
                else{
                    return false;
                }
            },
            remSchedule(index){

                    let self = this;
                    sweetAlert({
                        title: 'Warning',
                        text: 'You are about to remove this ad.Do you want to continue',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Remove',
                        confirmButtonColor: '#FFB800',
                        closeOnConfirm: true,
                        showLoaderOnConfirm: true,
                    },function(){
                        self.createAd.splice(index,1);

                    });
                },
            showSchedule(){
//                for (let i = 0; i < this.monSegments.length; i++){
//                    this.createAd.push(this.monSegments[i]);
//                }
////                for (let i = 0; i < this.tSelRate.length; i++){
////                    this.createAd.push(this.tSelRate[i]);
////                }
////                for (let i = 0; i < this.wSelRate.length; i++){
////                    this.createAd.push(this.wSelRate[i]);
////                }
////                for (let i = 0; i < this.thSelRate.length; i++){
////                    this.createAd.push(this.thSelRate[i]);
////                }
////                for (let i = 0; i < this.fSelRate.length; i++){
////                    this.createAd.push(this.fSelRate[i]);
////                }
//                store.dispatch('getCreatedAdData', this.createAd);
                store.dispatch('getShowSched',true);
                this.animate = 'animated slideUp';
                $('#mol').modal('hide');
                store.dispatch('getWizard',false);
                store.dispatch('getShowSched', true);

            },

            hideSched(){
                this.show_sched = false;
            },
            resetAdCreate(){
                this.mSelRate = [];
                this.mon_sel_date = [];
                this.createAd.length = 0;
//                store.dispatch('getCreatedAdData', []);
                store.dispatch('getScheduleAd', []);



            }

        },
        computed:{

        getCreatedAd() {
            return store.state.create_ad_data;
        },
            getSelMedia(){
                return  store.state.media;
            },
            monSegments(){
                return store.state.mon_segments;
            },
            getSelMediaHouse(){
                return  store.state.selMedia[0];
            },
            getTotalScheduledAds(){
                return store.state.schedule_ad_data.length;
            },
            getSelFile(){
                return store.state.file;
            },
            getFileName(){
                return store.state.fileName;
            },



        },

    }
    // jquery v2.2



</script>