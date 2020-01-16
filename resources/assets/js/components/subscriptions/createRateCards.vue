<!--<template>-->
<!--    <div class="page-wrapper">-->
<!--        &lt;!&ndash; Page-header start &ndash;&gt;-->
<!--        <div class="page-header">-->
<!--            <div class="row align-items-end">-->
<!--                <div class="col-lg-8">-->
<!--                    <div class="page-header-title">-->
<!--                        <div class="d-inline">-->
<!--                            <h4>Create rate card</h4>-->
<!--                            &lt;!&ndash;<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>&ndash;&gt;-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4">-->
<!--                    <div class="page-header-breadcrumb">-->
<!--                        <ul class="breadcrumb-title">-->
<!--                            <li class="breadcrumb-item">-->
<!--                                <a href="index.html"> <i class="feather icon-home"></i> </a>-->
<!--                            </li>-->
<!--                            <li class="breadcrumb-item"><a href="#!">{{getRateCardTitle}}</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        &lt;!&ndash; Page-header end &ndash;&gt;-->

<!--        &lt;!&ndash; Page-body start &ndash;&gt;-->
<!--        <div class="page-body">-->
<!--            &lt;!&ndash; Edit With Click card start &ndash;&gt;-->
<!--            <div class="card">-->
<!--                <div class="card-header">-->
<!--                    <h5>Mondays-Fridays</h5>-->
<!--                    <span>Click on the add row button to add new row.Insert your data from monday-friday</span>-->

<!--                </div>-->
<!--                <div class="card-block">-->
<!--                    <div class="table-responsive">-->
<!--                        <table class="table table-striped table-bordered" id="example-1">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th>#</th>-->
<!--                                <th>{{durations.mon}}</th>-->
<!--                                <th>{{durations.tue}}</th>-->
<!--                                <th>{{durations.wed}}</th>-->
<!--                                <th>{{durations.thu}}</th>-->
<!--                                <th>{{durations.fri}}</th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin"  v-model="durations.sec1" style="width: 50px !important;border: none">-->
<!--                                    <select  v-model="durations.time1">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select></th>-->
<!--                                <th class="create-ad-tb-th"><input type="number"  class="spin" v-model="durations.sec2" style="width: 50px !important;border: none">-->
<!--                                    <select v-model="durations.time2">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin" v-model="durations.sec3" style="width: 50px !important;border: none" >-->
<!--                                    <select  v-model="durations.time3">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin"  v-model="durations.sec4" style="width: 50px !important;border: none" >-->
<!--                                    <select  v-model="durations.time4">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin" v-model="durations.sec5" style="width: 50px !important;border: none" >-->
<!--                                    <select  v-model="durations.time5">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->

<!--                                <th>-->
<!--                                    Action-->
<!--                                </th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            <tr :class="r_animate"   style="border: none;background: transparent" v-for="(dtl, index) in data_list" :key="index">-->
<!--                              <td>{{index + 1}}</td>-->
<!--                                <td><input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.mon_duration">-->
<!--                                    To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.mon_b_duration">-->
<!--                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>-->
<!--                                    <select style="border: none !important;background: transparent" v-model="dtl.mon_spots">-->
<!--                                        <span class="text-primary"><b>spots:</b></span>-->
<!--                                        <option  value="" disabled selected></option>-->
<!--                                        <option>1</option>-->
<!--                                        <option>2</option>-->
<!--                                        <option>3</option>-->
<!--                                        <option>4</option>-->
<!--                                        <option>5</option>-->
<!--                                        <option>6</option>-->
<!--                                        <option>7</option>-->
<!--                                        <option>8</option>-->
<!--                                        <option>9</option>-->
<!--                                        <option>10</option>-->
<!--                                    </select>-->

<!--                                </td>-->
<!--                                <td><input type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.tue_duration">-->
<!--                                    To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.tue_b_duration">-->

<!--                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>-->
<!--                                    <select style="border: none !important;background: transparent" v-model="dtl.tue_spots">-->
<!--                                        <option  value="" disabled selected></option>-->
<!--                                        <option>1</option>-->
<!--                                        <option>2</option>-->
<!--                                        <option>3</option>-->
<!--                                        <option>4</option>-->
<!--                                        <option>5</option>-->
<!--                                        <option>6</option>-->
<!--                                        <option>7</option>-->
<!--                                        <option>8</option>-->
<!--                                        <option>9</option>-->
<!--                                        <option>10</option>-->
<!--                                    </select>-->
<!--                                </td>-->
<!--                                <td><input type="text"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.wed_duration">-->
<!--                                    To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.wed_b_duration">-->

<!--                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>-->
<!--                                    <select style="border: none !important;background: transparent" v-model="dtl.wed_spots">-->
<!--                                        <option  value="" disabled selected></option>-->
<!--                                        <option>1</option>-->
<!--                                        <option>2</option>-->
<!--                                        <option>3</option>-->
<!--                                        <option>4</option>-->
<!--                                        <option>5</option>-->
<!--                                        <option>6</option>-->
<!--                                        <option>7</option>-->
<!--                                        <option>8</option>-->
<!--                                        <option>9</option>-->
<!--                                        <option>10</option>-->
<!--                                    </select>-->
<!--                                </td>-->
<!--                                <td><input type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.thu_duration">-->
<!--                                    To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.thu_b_duration">-->

<!--                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>-->
<!--                                    <select style="border: none !important;background: transparent" v-model="dtl.thu_spots">-->
<!--                                        <option  value="" disabled selected></option>-->
<!--                                        <option>1</option>-->
<!--                                        <option>2</option>-->
<!--                                        <option>3</option>-->
<!--                                        <option>4</option>-->
<!--                                        <option>5</option>-->
<!--                                        <option>6</option>-->
<!--                                        <option>7</option>-->
<!--                                        <option>8</option>-->
<!--                                        <option>9</option>-->
<!--                                        <option>10</option>-->
<!--                                    </select>-->
<!--                                </td>-->
<!--                                <td><input type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="dtl.fri_duration">-->
<!--                                    To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="dtl.fri_b_duration">-->
<!--                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>-->
<!--                                    <select style="border: none !important;background: transparent" v-model="dtl.fri_spots">-->
<!--                                        <option  value="" disabled selected></option>-->
<!--                                        <option>1</option>-->
<!--                                        <option>2</option>-->
<!--                                        <option>3</option>-->
<!--                                        <option>4</option>-->
<!--                                        <option>5</option>-->
<!--                                        <option>6</option>-->
<!--                                        <option>7</option>-->
<!--                                        <option>8</option>-->
<!--                                        <option>9</option>-->
<!--                                        <option>10</option>-->
<!--                                    </select>-->
<!--                                </td>-->
<!--                                <td><input type="text" placeholder="eg : GHC 200" style="border: none" v-model="dtl.sec1_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none;" v-model="dtl.sec2_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none" v-model="dtl.sec3_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none;" v-model="dtl.sec4_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none" v-model="dtl.sec5_rate"> </td>-->
<!--                                <td>-->
<!--                                    <button type="button" class="btn btn-danger btn-sm" @click="delRow(index)"><i class="fa fa-trash"></i> </button>-->

<!--                                </td>-->

<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                    <button type="button" class="btn btn-primary waves-effect waves-light add" @click="addRow()">Add Row-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->


<!--            &lt;!&ndash;weekend rate card  table&ndash;&gt;-->

<!--            <div class="card">-->
<!--                <div class="card-header">-->
<!--                    <h5>Saturdays-Sundays</h5>-->
<!--                    <span>Click on the add row button to add new row.Insert your data from saturdays-sundays and submit</span>-->

<!--                </div>-->
<!--                <div class="card-block">-->
<!--                    <div class="table-responsive">-->
<!--                        <table class="table table-striped table-bordered" id="example-1">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th>{{wdurations.sat}}</th>-->
<!--                                <th>{{wdurations.sun}}</th>-->

<!--                                <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec1" style="width: 50px !important;border: none;">-->
<!--                                    <select  v-model="wdurations.time1">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select></th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec2" style="width: 50px !important;border: none">-->
<!--                                    <select v-model="wdurations.time2">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec3" style="width: 50px !important;border: none" >-->
<!--                                    <select  v-model="wdurations.time3">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin"  v-model="wdurations.sec4" style="width: 50px !important;border: none" >-->
<!--                                    <select  v-model="wdurations.time4">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->
<!--                                <th class="create-ad-tb-th"><input type="number" class="spin" v-model="wdurations.wsec5" style="width: 50px !important;border: none" >-->
<!--                                    <select  v-model="wdurations.time5">-->
<!--                                        <option v-for="s in time">{{s.sec}}</option>-->
<!--                                        <option v-for=" min in time">{{min.min}}</option>-->
<!--                                        <option v-for="hr in time">{{hr.hr}}</option>-->
<!--                                    </select>-->
<!--                                </th>-->
<!--                                <th>-->
<!--                                    Action-->
<!--                                </th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            <tr v-for="(wdtl, index) in wdata_list" style="border: none;background: transparent">-->


<!--                                <td><input type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="wdtl.sat_duration">-->
<!--                                    To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="wdtl.sat_b_duration">-->

<!--                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>-->
<!--                                    <select  v-model="wdtl.sat">-->
<!--                                        <option  value="" disabled selected></option>-->
<!--                                        <option>1</option>-->
<!--                                        <option>2</option>-->
<!--                                        <option>3</option>-->
<!--                                        <option>4</option>-->
<!--                                        <option>5</option>-->
<!--                                        <option>6</option>-->
<!--                                        <option>7</option>-->
<!--                                        <option>8</option>-->
<!--                                        <option>9</option>-->
<!--                                        <option>10</option>-->
<!--                                    </select>-->
<!--                                </td>-->
<!--                                <td><input type="text"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;" v-model="wdtl.sun_duration">-->
<!--                                    To <input class="" type="time"  style="border: none;width: 85px;font-size: 12px;font-weight: bold;background: #F8F8F8;"  v-model="wdtl.sun_b_duration">-->

<!--                                    <span class="text-primary"><b><i class="fa fa-list-ol text-primary"></i> </b></span>-->
<!--                                    <select style="border: none !important;background: transparent" v-model="wdtl.sun_spots">-->
<!--                                        <option  value="" disabled selected></option>-->
<!--                                        <option>1</option>-->
<!--                                        <option>2</option>-->
<!--                                        <option>3</option>-->
<!--                                        <option>4</option>-->
<!--                                        <option>5</option>-->
<!--                                        <option>6</option>-->
<!--                                        <option>7</option>-->
<!--                                        <option>8</option>-->
<!--                                        <option>9</option>-->
<!--                                        <option>10</option>-->
<!--                                    </select>-->
<!--                                </td>-->

<!--                                <td><input type="text" placeholder="eg : GHC 200" style="border: none" v-model="wdtl.wsec1_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none;" v-model="wdtl.wsec2_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none" v-model="wdtl.wsec3_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none;" v-model="wdtl.wsec4_rate"> </td>-->
<!--                                <td><input type="text"  style="border: none" v-model="wdtl.wsec5_rate"> </td>-->



<!--                                <td>-->
<!--                                    &lt;!&ndash;<button type="button" class="btn btn-info" @click="delwRow(index)"><i class="fa fa-minus-circle"></i> Delete row </button>&ndash;&gt;-->
<!--                                    <button type="button" class="btn btn-danger btn-sm" @click="delwRow(index)"><i class="fa fa-trash"></i> </button>-->

<!--                                </td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                    <button type="button" class="btn btn-secondary waves-effect waves-light add" @click="addWrow()">Add Row-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <button type="button" class="btn btn-danger waves-effect waves-light add pull-right" @click="addWrow()">Submit </button>-->

<!--        </div>-->
<!--    </div>-->

<!--</template>-->

<!--<script>-->
<!--    import  store from  '../../vuex/store';-->

<!--    export default {-->
<!--        name: "createRateCards",-->
<!--        mounted(){-->
<!--          this.fetchRateCardTitle();-->

<!--        },-->
<!--        data(){-->
<!--            return {-->
<!--                durations:{ mon : "MON", tue : 'TUE', wed : 'WED', thu : 'THU', fri : 'FRI',-->
<!--                    sec1:  15, sec2:  20 , sec3:  25, sec4 : 0, sec5 : 0,-->
<!--                    time1 : '', time2 : '', time3 : '', time4 : '', time5 : '',-->

<!--                },-->
<!--                //weekend segment and durations-->
<!--                wdurations:{-->
<!--                    sat : "SAT", sun : 'SUN',-->
<!--                    wsec1:  15, wsec2:  0, wsec3:  0, wsec4 : 0, wsec5 : 0,-->
<!--                    time1 : '', time2 : '', time3 : '', time4 : '', time5 : '',-->

<!--                },-->
<!--                time : [{-->
<!--                    'sec':'Sec','min':'Min','hr':'Hr'-->
<!--                }],-->

<!--                create_column : {-->
<!--                    columns : ''-->
<!--                },-->

<!--                data_list: [],-->
<!--                data_list2 : [],-->
<!--                wdata_list :[],-->
<!--                column_list : [],-->
<!--                r_animate : '',-->
<!--                title : ''-->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            addRow(){-->

<!--                let elem = document.createElement('tr');-->
<!--                this.data_list.push({-->

<!--                    //segments-->
<!--                    mon_duration : '',-->
<!--                    tue_duration : '',-->
<!--                    wed_duration : '',-->
<!--                    thu_duration : '',-->
<!--                    fri_duration : '',-->
<!--                    mon_b_duration : '',-->
<!--                    tue_b_duration : '',-->
<!--                    wed_b_duration : '',-->
<!--                    thu_b_duration : '',-->
<!--                    fri_b_duration : '',-->
<!--                    //spots-->
<!--                    mon_spots : '',-->
<!--                    tue_spots : '',-->
<!--                    wed_spots : '',-->
<!--                    thu_spots : '',-->
<!--                    fri_spots : '',-->
<!--                    //rate-->
<!--                    sec1_rate : '',-->
<!--                    sec2_rate : '',-->
<!--                    sec3_rate : '',-->
<!--                    sec4_rate : '',-->
<!--                    sec5_rate : '',-->

<!--                    //durations-->
<!--                    dura : this.durations-->


<!--                });-->

<!--                this.r_animate = 'animated fadeIn';-->
<!--            },-->
<!--            addWrow(){-->
<!--                let elem = document.createElement('tr');-->
<!--                this.wdata_list.push({-->
<!--                    sat_duration : '',-->
<!--                    sun_duration : '',-->
<!--                    sat_b_duration : '',-->
<!--                    sun_b_duration : '',-->
<!--                    wsec1_rate : '',-->
<!--                    wsec2_rate : '',-->
<!--                    wsec3_rate : '',-->
<!--                    wsec4_rate : '',-->
<!--                    wsec5_rate : '',-->
<!--                    sat_spots : '',-->
<!--                    sun_spots : '',-->
<!--                    wdura : this.wdurations,-->

<!--                });-->
<!--                this.r_animate = 'animated fadeIn';-->
<!--            },-->


<!--            delRow(index){-->
<!--                this.data_list.splice(index,1);-->
<!--                //this.r_animate = 'animated fadeOut';-->
<!--            },-->
<!--            delwRow(index){-->
<!--                this.wdata_list.splice(index,1);-->
<!--                // this.r_animate = 'animated fadeOut';-->
<!--            },-->
<!--            getAdTitle(){-->
<!--                return this.addName;-->
<!--            },-->
<!--            insertResults(){-->
<!--                let self = this;-->
<!--               let formData = new FormData();-->
<!--               formData.append('dataList', self.data_list);-->
<!--                formData.append('wdataList', self.wdata_list);-->


<!--                axios.post('adType/store', formData).then(function(res){-->
<!--                    console.log(res.data);-->
<!--                    if(res.data){-->
<!--                        // window.location = "show-segments";-->
<!--                    }-->
<!--                });-->

<!--            },-->
<!--            fetchRateCardTitle(){-->
<!--                let self = this;-->
<!--                axios.get('ratecard-title/api', + self.getRateCardId).then(function(res){-->
<!--                    console.log(res.data);-->
<!--                    if(res.data){-->

<!--                        alert(res.data);-->
<!--                    }-->
<!--                });-->

<!--            },-->

<!--        },-->
<!--        computed:{-->
<!--            getAdName(){-->
<!--                return this.data_list;-->
<!--            },-->
<!--            getMediaType(){-->
<!--                return store.state.media_type;-->
<!--            },-->
<!--            getRateCardId(){-->
<!--                return store.getters.rateCardId;-->
<!--            }-->


<!--        },-->

<!--    }-->
<!--</script>-->

