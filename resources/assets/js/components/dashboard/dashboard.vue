<template>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-yellow update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><i class="fa fa-star-o"> </i> {{totalSubs}}</h4>
                                    <h6 class="text-white m-b-0"> Subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-green update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><i class="fa fa-file-archive-o"> </i> {{totalAcceptSubs}}</h4>
                                    <h6 class="text-white m-b-0">Accepted Subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-pink update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{totalRejSubs}}</h4>
                                    <h6 class="text-white m-b-0"> Rejected subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-3" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-lite-green update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{totalExpSubs}}</h4>
                                    <h6 class="text-white m-b-0">Completed Subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-4" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>
                <!-- task, page, download counter  end -->

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-simple-c-blue update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><i class="fa fa-star-o"> </i> {{totalPenSubs}}</h4>
                                    <h6 class="text-white m-b-0"> Pending Subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-simple-c-blue update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><i class="fa fa-file-archive-o"> </i> {{totalRevSubs}}</h4>
                                    <h6 class="text-white m-b-0">Active Subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-2" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-simple-c-yellow update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><i class="fa fa-file-archive-o"> </i> {{totalLiveSubs}}</h4>
                                    <h6 class="text-white m-b-0">Live subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-2" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>

                 <div class="col-xl-3 col-md-6">
                    <div class="card bg-simple-c-green update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><i class="fa fa-file-archive-o"> </i> {{totalTrans}}</h4>
                                    <h6 class="text-white m-b-0">Transactions</h6>
                                </div>
                                <!-- <div class="col-4 text-right">
                                    <canvas id="update-chart-2" height="50"></canvas>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-footer">
<!--                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>-->
                        </div>
                    </div>
                </div>



                <!--  sale analytics start -->
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
<!--                             <h5>Subscriptions Analytics</h5>
 --><!--                            <span class="text-muted">For more details about usage, please refer <a href="https://www.amcharts.com/online-store/" target="_blank">amCharts</a> licences.</span>-->
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
<!--                                    <li><i class="feather icon-maximize full-card"></i></li>-->
<!--                                    <li><i class="feather icon-minus minimize-card"></i></li>-->
<!--                                    <li><i class="feather icon-trash-2 close-card"></i></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <canvas id="myChart" style="height: 100px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-xl-6 col-md-3">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <canvas id="trans" style="height: 165px;"></canvas>
                        </div>
                    </div>
                </div> -->



                <!-- <div class="col-xl-12 col-md-12">

                    </div> -->
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "dashboard",
        data(){
            return{
                totalSubs : null,
                totalAcceptSubs : null,
                totalRejSubs : null,
                totalExpSubs : null,
                totalPenSubs : null,
                totalRevSubs : null,
                totalLiveSubs : null,
                totalTrans : null,
                test : '',
                xlabels : [],
                ylabels :[],
                txlabels : [],
                tylables : [],
            }
        },
        mounted(){
            this.fetchTotalAds();
        },
        methods:{
            fetchTotalAds(){
                let self = this;
                axios.get("fetch-total-ads/api").then(function(res){
                    if(res){
                        self.totalSubs  = res.data.totalSubs;
                        self.totalAcceptSubs  = res.data.totalAcceptSub;
                        self.totalRejSubs = res.data.totalRejSub;
                        self.totalExpSubs = res.data.totalExpSub;
                        self.totalPenSubs = res.data.totalPenSub;
                        self.totalRevSubs = res.data.totalRevSub;
                        self.totalLiveSubs = res.data.totalLiveSubs;
                        self.totalTrans = res.data.totalTrans;
                      // self.days = [res.data.days[0].date,res.data.days[1].date,res.data.days[2].date,res.data.days[3].date,res.data.days[4].date,res.data.days[5].date,res.data.days[6].date];
                         self.xlabels  =  res.data.dates;
                         self.txlabels = res.data.transDates;
                         self.tylables = res.data.transCounts;
                         self.ylabels = res.data.counts;

                      self.charts();
                      self.transCharts();

                     //  self.charts(res.data.days[0].count,res.data.days[1].count,res.data.days[2].count,res.data.days[3].count,res.data.days[4].count,res.data.days[5].count,res.data.days[6].count);
/*                         self.donutsChart();
 */                     //   self.statusChart(res.data.days[0].count,res.data.days[1].count,res.data.days[2].count,res.data.days[3].count,res.data.days[4].count,res.data.days[5].count,res.data.days[6].count);

                    }
                    else{
                    }
                });
            },
            fetchWeekData(){
             axios.get('week-data').then(function(){
             });
            },
            charts(counts){
                let self  = this;
                let myChart = document.getElementById('myChart').getContext('2d');
                Chart.defaults.global.defaultFontFamily = 'Verdana';
              //  Chart.defaults.global.defaultFontSize = '16px';
                Chart.defaults.global.defaultFontWeight =  400;
                Chart.defaults.global.defaultFontColor = 'rgb(53, 60, 78)';
               // Chart.defaults.global.legend.display = true;
                let start = new Date();
                let end = new Date();
                start.setDate(start.getDate() - 7);
                start.setHours(0,0,0,0);

                let chart = new Chart(myChart,{
                    type: 'bar',
                    data : {
                        labels : self.xlabels,
                        datasets : [{
                            label : 'Subscriptions',
                            data : self.ylabels,
                             backgroundColor :[
                              '#FE9156',
                              '#FC7888',
                              '#22CCD0',
                              '#44D08B',
                              '#FEAE8A'
                             ] ,
                             hoverBorderWidth : 2,
                             barThickness : 5,
                        }, 
                        ],
                    },
                    options: {
                        title : {
                            display :  true,
                            text : 'Total Subscriptions for the week',
                            fontSize : 16,
                        },
                        scales:{
                          xAxes: [{
                          type: "time",
                          time: {
                          min: start,
                          max: end,
                          unit: "day"
                         },
                         
                         display : true,
                             scaleLabel:{
                              display : true,
                              labelString : 'Date',
                             },
                             gridLines :{
                                display : false,
                            },
                               categoryPercentage: 0.7,
                               barPercentage: 0.4
                        }],
                        yAxes : [{
                            scaleLabel : {
                                display : true,
                                labelString : 'Subscriptions', 
                            },
                             ticks: {
                                 max: 100,
                                 min: 0,
                                stepSize: 10,
                         beginAtZero: true,
                         padding: 10,
                     },
                        }]
                        },
                        tooltips:{
                          //  backgroundColor : 'transparent',
                          //  borderWidth  : 2,
                           // borderColor : '#00ACAE',
                            //titleFontColor : '#000',
                            titleFontSize : 12,
                            mode : 'index',
                            displayColors : false,
                            labelTextColor : 'red',
                            lineHeight : '10px',
                           // bodyFontColor : 'black',
                            bodyFontSize : 12,
                            bodySpacing : 3,
                            displayColors : true,
                            multiKeyBackground : 'black',
                            caretSize : 6,
                            caretPadding : 3,
                            titleMarginBottom : 4


                        },
                        lengend:{
                            display : false,
                         labels:{
                             fontColor : '#001'
                         }
                        },
                        responsive : true,
                    }
                });
            },
            
                transCharts(){
                let self  = this;
                let myChart = document.getElementById('trans').getContext('2d');
                Chart.defaults.global.defaultFontFamily = 'Verdana';
              //  Chart.defaults.global.defaultFontSize = '16px';
                Chart.defaults.global.defaultFontWeight =  400;
                Chart.defaults.global.defaultFontColor = 'rgb(53, 60, 78)';
               // Chart.defaults.global.legend.display = true;
                let start = new Date();
                let end = new Date();
                start.setDate(start.getDate() - 7);
                start.setHours(0,0,0,0);

                let chart = new Chart(myChart,{
                    type: 'bar',
                    data : {
                        labels : self.txlabels,
                        datasets : [{
                            label : 'Trasactions',
                            data : self.tylabels,
                             backgroundColor :[
                                '#FC7888',

                              '#FE9156',
                              '#22CCD0',
                              '#44D08B',
                              '#FEAE8A'
                             ] ,
                             hoverBorderWidth : 2,
                             barThickness : 5,
                        }, 
                        ],
                    },
                    options: {
                        title : {
                            display :  true,
                            text : 'Total Transactions for the week',
                            fontSize : 16,
                        },
                        scales:{
                          xAxes: [{
                          type: "time",
                          time: {
                          min: start,
                          max: end,
                          unit: "day"
                         },
                         
                         display : true,
                             scaleLabel:{
                              display : true,
                              labelString : 'Date',
                             },
                             gridLines :{
                                display : false,
                            },
                               categoryPercentage: 0.7,
                               barPercentage: 0.4
                        }],
                        yAxes : [{
                            scaleLabel : {
                                display : true,
                                labelString : 'Transactions (GHC)', 
                            },
                             ticks: {
                                 max: 100,
                                 min: 0,
                                stepSize: 10,
                         beginAtZero: true,
                         padding: 10,
                     },
                        }]
                        },
                        tooltips:{
                          //  backgroundColor : 'transparent',
                          //  borderWidth  : 2,
                           // borderColor : '#00ACAE',
                            //titleFontColor : '#000',
                            titleFontSize : 12,
                            mode : 'index',
                            displayColors : false,
                            labelTextColor : 'red',
                            lineHeight : '10px',
                           // bodyFontColor : 'black',
                            bodyFontSize : 12,
                            bodySpacing : 3,
                            displayColors : true,
                            multiKeyBackground : 'black',
                            caretSize : 6,
                            caretPadding : 3,
                            titleMarginBottom : 4


                        },
                        lengend:{
                            display : false,
                         labels:{
                             fontColor : '#001'
                         }
                        },
                        responsive : true,
                    }
                });
            },

        },
        computed:{

        }
    }
</script>

<style scoped>

</style>