<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Rate Cards</h4>
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
                    <div>
                        <table  class="table  table-striped table-bordered nowrap">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Rate card ID</th>
                                <th>Media house</th>
                                <th>Rate Card</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!--</div>-->
                            <tr v-for="(cards,index) in rateCards">
                                <th scope="row" >{{index + 1}}</th>
                                <td>{{cards.rate_card_title_id}}</td>
                                <td>{{media_h}}</td>
                                <td>{{cards.rate_card_title}}</td>
                                <td>{{cards.created_at}}</td>
                                <td>{{cards.updated_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target=".bd-example-modal-lg1" @click="viewRateCard(cards.rate_card_title_id)"><i class="feather icon-eye"> </i></button>
<!--                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-edit"> </i> </button>-->
                                        <button type="button" class="btn btn-danger btn-sm"  @click="deleteRateCard(cards.rate_card_title_id)"><i class="fa fa-trash"> </i> </button>

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Page-header end -->
                            <!-- Page-body start -->
                            <div class="page-body">
                                <!-- Edit With Click card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Update LPMs Rate Card</h5>
<!--                                        <span>Click on the add row button to add new row.Insert your data from monday-friday</span>-->

                                    </div>


                                    <div class="card-block">

                                            <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{durations.mon}}</th>
                                                    <th>{{durations.tue}}</th>
                                                    <th>{{durations.wed}}</th>
                                                    <th>{{durations.thu}}</th>
                                                    <th>{{durations.fri}}</th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin"  v-model="durations.sec1" style="width: 50px !important;border: none">
                                                        <select  v-model="durations.time1" >
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select></th>
                                                    <th class="create-ad-tb-th"><input type="number"  class="spin" v-model="durations.sec2" style="width: 50px !important;border: none">
                                                        <select v-model="durations.time2">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin" v-model="durations.sec3" style="width: 50px !important;border: none" >
                                                        <select  v-model="durations.time3">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin"  v-model="durations.sec4" style="width: 50px !important;border: none" >
                                                        <select  v-model="durations.time4">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin" v-model="durations.sec5" style="width: 50px !important;border: none" >
                                                        <select  v-model="durations.time5">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>

                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr :class="r_animate"   style="border: none;background: transparent" v-for="(dtl, index) in data_list" :key="index">
                                                    <td>{{index + 1}}</td>
                                                    <td><input class="" type=time  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.mon_duration">
                                                        To <input class="" type="time"   style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.mon_b_duration">
                                                        <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>
                                                        <sinp style="border: none !important;background: transparent" v-model="dtl.mon_spots">
                                                            <span class="text-primary"><b>spots:</b></span>
                                                            <option  value="" disabled selected></option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </sinp>

                                                    </td>
                                                    <td><input type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.tue_duration">
                                                        To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.tue_b_duration">

                                                        <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>
                                                        <select style="border: none !important;background: transparent" v-model="dtl.tue_spots">
                                                            <option  value="" disabled selected></option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.wed_duration">
                                                        To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.wed_b_duration">

                                                        <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>
                                                        <select style="border: none !important;background: transparent" v-model="dtl.wed_spots">
                                                            <option  value="" disabled selected></option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.thu_duration">
                                                        To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.thu_b_duration">

                                                        <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>
                                                        <select style="border: none !important;background: transparent" v-model="dtl.thu_spots">
                                                            <option  value="" disabled selected></option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.fri_duration">
                                                        To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.fri_b_duration">
                                                        <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>
                                                        <select style="border: none !important;background: transparent" v-model="dtl.fri_spots">
                                                            <option  value="" disabled selected></option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" placeholder="eg : GHC 200" style="border: none" v-model="dtl.sec1_rate"> </td>
                                                    <td><input type="text"  style="border: none;" v-model="dtl.sec2_rate"> </td>
                                                    <td><input type="text"  style="border: none" v-model="dtl.sec3_rate"> </td>
                                                    <td><input type="text"  style="border: none;" v-model="dtl.sec4_rate"> </td>
                                                    <td><input type="text"  style="border: none" v-model="dtl.sec5_rate"> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" @click="delRow(index)"><i class="fa fa-trash"></i> </button>

                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>

<!--                                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light add" @click="addRow()">Add Row-->
<!--                                        </button>-->
                                    </div>
                                </div>


                                <!--weekend rate card  table-->

                                <div class="card">
                                    <div class="card-header">
                                        <h5>Saturdays-Sundays</h5>

                                    </div>
                                    <div class="card-block">
                                        <div>
                                            <table class="table table-striped table-bordered" id="example-2">
                                                <thead>
                                                <tr>
                                                    <th>{{wdurations.sat}}</th>
                                                    <th>{{wdurations.sun}}</th>

                                                    <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec1" style="width: 50px !important;border: none;">
                                                        <select  v-model="wdurations.time1">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select></th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec2" style="width: 50px !important;border: none">
                                                        <select v-model="wdurations.time2">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec3" style="width: 50px !important;border: none" >
                                                        <select  v-model="wdurations.time3">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin"  v-model="wdurations.sec4" style="width: 50px !important;border: none" >
                                                        <select  v-model="wdurations.time4">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>
                                                    <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec5" style="width: 50px !important;border: none" >
                                                        <select  v-model="wdurations.time5">
                                                            <option v-for="s in time">{{s.sec}}</option>
                                                            <option v-for=" min in time">{{min.min}}</option>
                                                            <option v-for="hr in time">{{hr.hr}}</option>
                                                        </select>
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(wdtl, index) in wdata_list" style="border: none;background: transparent">
                                                    <td>
                                                    <input type="time"  v-model="wdtl.sat_b_duration">
                                                    To

                                                    <input type="time"   v-model="wdtl.sat_duration">


                                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>
                                                    <select  v-model="wdtl.sat">
                                                        <option  value="" disabled selected></option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                    </select>
                                                    </td>
                                                    <td><input type="text"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="wdtl.sun_duration">
                                                        To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="wdtl.sun_b_duration">

                                                        <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>
                                                        <select style="border: none !important;background: transparent" v-model="wdtl.sun_spots">
                                                            <option  value="" disabled selected></option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </td>

                                                    <td><input type="text" placeholder="eg : GHC 200" style="border: none" v-model="wdtl.wsec1_rate"> </td>
                                                    <td><input type="text"  style="border: none;" v-model="wdtl.wsec2_rate"> </td>
                                                    <td><input type="text"  style="border: none" v-model="wdtl.wsec3_rate"> </td>
                                                    <td><input type="text"  style="border: none;" v-model="wdtl.wsec4_rate"> </td>
                                                    <td><input type="text"  style="border: none" v-model="wdtl.wsec5_rate"> </td>



                                                    <td>
                                                        <!--<button type="button" class="btn btn-info" @click="delwRow(index)"><i class="fa fa-minus-circle"></i> Delete row </button>-->
<!--                                                        <button type="button" class="btn btn-danger btn-sm" @click="delwRow(index)"><i class="fa fa-trash"></i> </button>-->

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
<!--                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light add" @click="addWrow()">Add Row-->
<!--                                        </button>-->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <button type="button" class="btn btn-danger waves-effect waves-light add pull-right">Update </button>

                                </div>

                            </div>

                        </div>




                    </div>
                </div>


            </div>
            <pagination></pagination>
        </div>


        <!--view rate cards -->
        <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header" v-show="processing">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline" v-for="title in rate_card_title">
                                            <h4 class="animated fadeIn"><strong class="text-danger">{{title.rate_card_title}}</strong> Rate Card <span v-show="media != 'Print'">for {{day}}</span></h4>
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
                    <div class="page-body">
                        <!-- Default Styling table start -->
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-">
                                <p v-show="loader"><img src="/images/loading.gif" style="height: 20px;width: 20px;"><strong>Loading... Please wait</strong></p>
                            </div>
                            <div class="col-md-5"></div>

                        </div>
                        <div class="card">

                            <div class="card-block table-border-style">
                               <view-print-rate-card v-show="media == 'Print'" :print_segments="print_segments" v-if="processing"></view-print-rate-card>
                                <div class="table-responsive" v-show="media != 'Print'">
                                    <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                        <thead>
                                        <tr class="table-primary animated fadeIn" v-show="weekdays">

                                            <th>#</th>
<!--                                            <th>Rate card ID</th>-->
                                            <th>{{days_of_week.mon}}</th>
                                            <th>{{days_of_week.tue}}</th>
                                            <th>{{days_of_week.wed}}</th>
                                            <th>{{days_of_week.thu}}</th>
                                            <th>{{days_of_week.fri}}</th>

                                            <th v-show="days_of_week.sec1 > 0">{{days_of_week.sec1 + days_of_week.time1}}</th>
                                            <th v-show="days_of_week.sec2 > 0">{{days_of_week.sec2 + days_of_week.time2}}</th>
                                            <th v-show="days_of_week.sec3 > 0">{{days_of_week.sec3 + days_of_week.time3}}</th>
                                            <th v-show="days_of_week.sec4 > 0">{{days_of_week.sec4 + days_of_week.time4}}</th>
                                            <th v-show="days_of_week.sec5 > 0">{{days_of_week.sec5 + days_of_week.time5}}</th>
                                        </tr>




                                        <!--show if  view weekends button is clicked-->
                                        <tr class="table-primary animated fadeIn" v-for="(card,index) in view_rate_card_w" v-show="weekends">

                                            <th>#</th>

                                            <th>{{days_of_weekend.sat}}</th>
                                            <th>{{days_of_weekend.sun}}</th>


                                            <th v-show="days_of_weekend.wsec1 > 0">{{days_of_weekend.wsec1 + days_of_weekend.time1}}</th>
                                            <th v-show="days_of_weekend.wsec2 > 0">{{days_of_weekend.wsec2 + days_of_weekend.time2}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                          <!--weekdays segments-->
                                        <tr class="animated fadeIn" v-for="(card,index) in view_rate_card" v-show="weekdays">
                                            <th scope="row" >{{index + 1}}</th>
<!--                                            <td>{{card.rate_card_id}}</td>-->
                                            <td>{{card.mon_duration.substr(0,2) + ':' + card.mon_b_duration}} - {{ card.mon_c_duration.substr(0,2) + ':'+ card.mon_d_duration + '' +  card.mon_c_duration.substr(2,3)}} <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.mon_spots}}</span></td>
                                            <td>{{card.tue_duration.substr(0,2) + ':' + card.tue_b_duration}} - {{ card.tue_c_duration.substr(0,2) + ':'+ card.tue_d_duration + '' +  card.tue_c_duration.substr(2,3)}}<span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.tue_spots}}</span></td>
                                            <td>{{card.wed_duration.substr(0,2) + ':' + card.wed_b_duration}} - {{ card.wed_c_duration.substr(0,2) + ':'+ card.wed_d_duration + '' +  card.wed_c_duration.substr(2,3)}}<span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.wed_spots}}</span></td>
                                            <td>{{card.thu_duration.substr(0,2) + ':' + card.thu_b_duration}} - {{ card.thu_c_duration.substr(0,2) + ':'+ card.thu_d_duration + '' +  card.thu_c_duration.substr(2,3)}}<span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.tue_spots}}</span></td>
                                            <td>{{card.fri_duration.substr(0,2) + ':' + card.fri_b_duration}} - {{ card.fri_c_duration.substr(0,2) + ':'+ card.fri_d_duration + '' +  card.fri_c_duration.substr(2,3)}}<span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.fri_spots}}</span></td>
                                            <td v-show="days_of_week.sec1 > 0">{{'GHS'+ card.sec1_rate}}</td>
                                            <td v-show="days_of_week.sec2 > 0">{{'GHS'+ card.sec2_rate}}</td>
                                            <td v-show="days_of_week.sec3 > 0">{{'GHS'+ card.sec3_rate}}</td>
                                            <td v-show="days_of_week.sec4 > 0">{{'GHS'+ card.sec4_rate}}</td>
                                            <td v-show="days_of_week.sec5 > 0">{{'GHS'+ card.sec5_rate}}</td>
                                        </tr>





                                        <!--view weekends-->
                                        <tr class="animated fadeIn" v-for="(card,index) in view_rate_card_w" v-show="weekends" v-if="card.wsec1_rate !== ''">
                                            <th scope="row" >{{index + 1}}</th>
                                            <!--                                            <td>{{card.rate_card_id}}</td>-->
                                            <td>{{card.sat_duration.substr(0,2) + ':' + card.sat_b_duration}} - {{ card.sat_c_duration.substr(0,2) + ':'+ card.sat_d_duration + '' +  card.sat_c_duration.substr(2,3)}} <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.sat_spots}}</span></td>
                                            <td>{{card.sun_duration.substr(0,2) + ':' + card.sun_b_duration}} - {{ card.sun_c_duration.substr(0,2) + ':'+ card.sun_d_duration + '' +  card.sun_c_duration.substr(2,3)}}<span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.sun_spots}}</span></td>
                                            <td v-show="days_of_weekend.wsec1 > 0 ">{{'GHS'+ card.wsec1_rate}}</td>
                                            <td v-show="days_of_weekend.wsec2 > 0">{{'GHS'+ card.wsec2_rate}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-show="media != 'Print'" class="btn btn-primary" @click="viewWeekendSegments">{{label}}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</template>

<script>
    import  store from  '../../vuex/store';
    import search from "../partials/search";
    import Pagination from "../partials/pagination";


    export default {
        name: "viewRateCard",
        props : ['message','media'],
        components :{Pagination,search},
        data(){
            return{
                durations:{ mon : "MON", tue : 'TUE', wed : 'WED', thu : 'THU', fri : 'FRI',
                    sec1:  15, sec2:  20 , sec3:  25, sec4 : 0, sec5 : 0,
                    time1 : '', time2 : '', time3 : '', time4 : '', time5 : '',

                },
                //weekend segment and durations
                wdurations:{
                    sat : "SAT", sun : 'SUN',
                    wsec1:  15, wsec2:  0, wsec3:  0, wsec4 : 0, wsec5 : 0,
                    time1 : '', time2 : '', time3 : '', time4 : '', time5 : '',

                },
                time : [{
                    'sec':'Sec','min':'Min','hr':'Hr'
                }],

                create_column : {
                    columns : ''
                },

                data_list: [],
                data_list2 : [],
                wdata_list :[],
                column_list : [],
                r_animate : '',
                title : [],
                rate_card_title : null,
                hrs : [],
                view_rate_card: [],
                view_rate_card_w : [],
                days_of_week : [],
                weekends : false,
                weekdays : true,
                days_of_weekend : [],
                label : 'View Weekends Segments',
                day : 'weekdays',
                media_h : '',
                print_segments : [],
                processing : false,
                loader : true,


            }
        },
        mounted(){
            store.dispatch('rateCardForloginMedia',this.pagi.current_page);
          //  this.fetchRateCards();
            this.confirmDeleteToUser(this.message);
            this.fetchMediaHouse();

        },
        methods:{
            addRow(){

                let elem = document.createElement('tr');
                this.data_list.push({

                    //segments
                    mon_duration : '',
                    tue_duration : '',
                    wed_duration : '',
                    thu_duration : '',
                    fri_duration : '',
                    mon_b_duration : '',
                    tue_b_duration : '',
                    wed_b_duration : '',
                    thu_b_duration : '',
                    fri_b_duration : '',
                    //spots
                    mon_spots : '',
                    tue_spots : '',
                    wed_spots : '',
                    thu_spots : '',
                    fri_spots : '',
                    //rate
                    sec1_rate : '',
                    sec2_rate : '',
                    sec3_rate : '',
                    sec4_rate : '',
                    sec5_rate : '',

                    //durations
                    dura : this.durations


                });

                this.r_animate = 'animated fadeIn';
            },
            addWrow(){
                let elem = document.createElement('tr');
                this.wdata_list.push({
                    sat_duration : '',
                    sun_duration : '',
                    sat_b_duration : '',
                    sun_b_duration : '',
                    wsec1_rate : '',
                    wsec2_rate : '',
                    wsec3_rate : '',
                    wsec4_rate : '',
                    wsec5_rate : '',
                    sat_spots : '',
                    sun_spots : '',
                    wdura : this.wdurations,

                });
                this.r_animate = 'animated fadeIn';

            },


            delRow(index){
                this.data_list.splice(index,1);
                //this.r_animate = 'animated fadeOut';
            },
            delwRow(index){
                this.wdata_list.splice(index,1);
                // this.r_animate = 'animated fadeOut';
            },
            getAdTitle(){
                return this.addName;
            },

            //fetch rate cards for login user
            viewRateCard(rateCardId) {
                let self = this;
                if(self.media == 'Print'){
                    axios.get('view-ratecard/api',{params : {'rateCardTitleId' :rateCardId}}).then(function (res) {
                        if (res.data) {
                            self.print_segments = res.data.rate_card;
                            self.loader = false;
                            self.processing = true;

                           // console.log(self.print_segments);

                            self.rate_card_title = res.data.rate_card_title;

                        }
                    });
                }
                else{
                    axios.get('view-ratecard/api',{params : {'rateCardTitleId' :rateCardId}}).then(function (res) {
                        if (res.data) {
                            self.view_rate_card =  res.data.segments;
                            self.view_rate_card_w = res.data.w_segments;
                            self.days_of_week  = JSON.parse(res.data.days_of_week);
                            self.days_of_weekend = JSON.parse(res.data.days_of_weekends);
                            self.rate_card_title = res.data.rate_card_title;
                            self.loader = false;
                            self.processing = true;
                        }
                    });
                }

            },
            deleteRateCard(rateCardId){
                let self = this;
                let formData = new FormData();
                formData.append('rateCardTitleId',rateCardId);

                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to delete this rate card?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Delete',
                    confirmButtonColor: '#fe8f9c',
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                },function(isConfirm) {

                    if (isConfirm) {
                        axios.post('delete-ratecard/api',formData).then(function (res) {

                            if (res.data === 'success') {
                                window.location = "view-rate-card";
                            }
                        }).
                        catch(function (error) {
                            console.log(error);
                        });
                    }
                });
            },
            confirmDeleteToUser(message){
                if(message !== ''){
                    // PNotify.desktop.permission();
                    (new PNotify( {
                            title:'Delete Desktop Notice', type:'danger', text:'Rate card deleted successfully.', desktop: {
                                desktop: true, icon: 'assets/images/pnotify/success.png'
                            }
                        }
                    ));
                }
            },
            viewWeekendSegments(){
                if (this.label == 'View Weekends Segments'){
                    this.label = 'View Weekdays Segments';
                    this.weekdays = false;
                    this.weekends  = true;
                    this.day = 'Weekends'
                }
                else{
                    this.label = 'View Weekends Segments';
                    this.weekdays = true;
                    this.weekends  = false;
                    this.day = 'Weekdays'

                }

            },
            fetchMediaHouse(){
                let self = this;
                axios.get('fetch-media/api').then(function (res) {
                    if (res.data) {
                        self.media_h =  res.data;
                    }
                }).
                catch(function (error) {
                    console.log(error);
                });
            }

        },
        computed:{
            rateCards(){
                return store.state.rateCards;
            },
            pagi(){
                return store.state.pagination;
            },
            getAdName(){
                return this.data_list;
            },
            getMediaType(){
                return store.state.media_type;
            },
            getRateCardId(){
                return store.getters.rateCardId;
            }
        }
    }
</script>

<style scoped>

</style>