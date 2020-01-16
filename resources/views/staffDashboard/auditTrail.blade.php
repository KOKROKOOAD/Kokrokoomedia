
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-yellow update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h6 class="text-white m-b-0"> Admin Activities</h6>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
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
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
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
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-lite-green update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{totalExpSubs}}</h4>
                                    <h6 class="text-white m-b-0">Expired Subscriptions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-4" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
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
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-simple-c-yellow update-card">
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
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-simple-c-black update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><i class="fa fa-file-archive-o"> </i> {{totalRevSubs}}</h4>
                                    <h6 class="text-white m-b-0">Transactions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-2" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                        </div>
                    </div>
                </div>



                <!--  sale analytics start -->
                <div class="col-xl-6 col-md-9">
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
                            <canvas id="myChart" style="height: 165px;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-3">
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
                            <canvas id="piechart" style="height: 165px;"></canvas>
                        </div>
                    </div>
                </div>
               
<!--                <div class="col-xl-2 col-md-12">-->
<!--                    <div class="card user-card2">-->
<!--                        <div class="card-block text-center">-->

<!--                        </div>-->
<!--                        <button class="btn btn-warning btn-block p-t-15 p-b-15">Download Overall Report</button>-->
<!--                    </div>-->
<!--                </div>-->
                <!--  sale analytics end -->

                <div class="col-xl-12 col-md-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Admin Activities</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
<!--                                    <li><i class="feather icon-maximize full-card"></i></li>-->
<!--                                    <li><i class="feather icon-minus minimize-card"></i></li>-->
<!--                                    <li><i class="feather icon-trash-2 close-card"></i></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="chk-option">
                                                <div class="checkbox-fade fade-in-primary">
<!--                                                    <label class="check-task">-->
<!--                                                        <input type="checkbox" value="">-->
<!--                                                        <span class="cr">-->
<!--                                                            <i class="cr-icon feather icon-check txt-default"></i>-->
<!--                                                        </span>-->
<!--                                                    </label>-->
                                                </div>
                                            </div>
                                            <th>Date</th>
                                        <th>Role</th>
                                        <th>Login attempts</th>
                                        <th>Last login</th>
                                        <th>Activities</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            <div class="chk-option">-->
<!--                                                <div class="checkbox-fade fade-in-primary">-->
<!--                                                    <label class="check-task">-->
<!--                                                        <input type="checkbox" value="">-->
<!--                                                        <span class="cr">-->
<!--                                                            <i class="cr-icon feather icon-check txt-default"></i>-->
<!--                                                        </span>-->
<!--                                                    </label>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="d-inline-block align-middle">-->
<!--                                                <h6>Able Pro</h6>-->
<!--                                                <p class="text-muted m-b-0">Powerful Admin Theme</p>-->
<!--                                            </div>-->
<!--                                        </td>-->
<!--                                        <td>16,300</td>-->
<!--                                        <td><canvas id="app-sale1" height="50" width="100"></canvas></td>-->
<!--                                        <td>$53</td>-->
<!--                                        <td class="text-c-blue">$15,652</td>-->
<!--                                    </tr>-->
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="col-xl-4 col-md-12">-->
<!--                    <div class="card user-activity-card">-->
<!--                        <div class="card-header">-->
<!--                            <h5>User Activity</h5>-->
<!--                        </div>-->
<!--                        <div class="card-block">-->
<!--                            <div class="row m-b-25">-->
<!--                                <div class="col-auto p-r-0">-->
<!--                                    <div class="u-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/breadcrumb-bg.jpg" alt="user image" class="img-radius cover-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="user image" class="img-radius profile-img">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <h6 class="m-b-5">John Deo</h6>-->
<!--                                    <p class="text-muted m-b-0">Lorem Ipsum is simply dummy text.</p>-->
<!--                                    <p class="text-muted m-b-0"><i class="feather icon-clock m-r-10"></i>2 min ago</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row m-b-25">-->
<!--                                <div class="col-auto p-r-0">-->
<!--                                    <div class="u-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/breadcrumb-bg.jpg" alt="user image" class="img-radius cover-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="user image" class="img-radius profile-img">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <h6 class="m-b-5">John Deo</h6>-->
<!--                                    <p class="text-muted m-b-0">Lorem Ipsum is simply dummy text.</p>-->
<!--                                    <p class="text-muted m-b-0"><i class="feather icon-clock m-r-10"></i>2 min ago</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row m-b-25">-->
<!--                                <div class="col-auto p-r-0">-->
<!--                                    <div class="u-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/breadcrumb-bg.jpg" alt="user image" class="img-radius cover-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="user image" class="img-radius profile-img">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <h6 class="m-b-5">John Deo</h6>-->
<!--                                    <p class="text-muted m-b-0">Lorem Ipsum is simply dummy text.</p>-->
<!--                                    <p class="text-muted m-b-0"><i class="feather icon-clock m-r-10"></i>2 min ago</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row m-b-5">-->
<!--                                <div class="col-auto p-r-0">-->
<!--                                    <div class="u-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/breadcrumb-bg.jpg" alt="user image" class="img-radius cover-img">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="user image" class="img-radius profile-img">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <h6 class="m-b-5">John Deo</h6>-->
<!--                                    <p class="text-muted m-b-0">Lorem Ipsum is simply dummy text.</p>-->
<!--                                    <p class="text-muted m-b-0"><i class="feather icon-clock m-r-10"></i>2 min ago</p>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="text-center">-->
<!--                                <a href="#!" class="b-b-primary text-primary">View all Projects</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                &lt;!&ndash; wather user &ndash;&gt;-->
<!--                <div class="col-xl-6 col-md-12">-->
<!--                    <div class="card latest-update-card">-->
<!--                        <div class="card-header">-->
<!--                            <h5>Latest Updates</h5>-->
<!--                            <div class="card-header-right">-->
<!--                                <ul class="list-unstyled card-option">-->
<!--                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>-->
<!--                                    <li><i class="fa fa-window-maximize full-card"></i></li>-->
<!--                                    <li><i class="fa fa-minus minimize-card"></i></li>-->
<!--                                    <li><i class="fa fa-refresh reload-card"></i></li>-->
<!--                                    <li><i class="fa fa-trash close-card"></i></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="card-block">-->
<!--                            <div class="latest-update-box">-->
<!--                                <div class="row p-b-15">-->
<!--                                    <div class="col-auto text-right update-meta">-->
<!--                                        <p class="text-muted m-b-0 d-inline">4 hrs ago</p>-->
<!--                                        <i class="feather icon-briefcase bg-simple-c-pink update-icon"></i>-->
<!--                                    </div>-->
<!--                                    <div class="col">-->
<!--                                        <h6>+ 5 New Products were added!</h6>-->
<!--                                        <p class="text-muted m-b-0">Congratulations!</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="row p-b-15">-->
<!--                                    <div class="col-auto text-right update-meta">-->
<!--                                        <p class="text-muted m-b-0 d-inline">1 day ago</p>-->
<!--                                        <i class="feather icon-check bg-simple-c-yellow  update-icon"></i>-->
<!--                                    </div>-->
<!--                                    <div class="col">-->
<!--                                        <h6>Database backup completed!</h6>-->
<!--                                        <p class="text-muted m-b-0">Download the <span class="text-c-blue">latest backup</span>.</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="row p-b-0">-->
<!--                                    <div class="col-auto text-right update-meta">-->
<!--                                        <p class="text-muted m-b-0 d-inline">2 day ago</p>-->
<!--                                        <i class="feather icon-facebook bg-simple-c-green update-icon"></i>-->
<!--                                    </div>-->
<!--                                    <div class="col">-->
<!--                                        <h6>+1 Friend Requests</h6>-->
<!--                                        <p class="text-muted m-b-10">This is great, keep it up!</p>-->
<!--                                        <div class="table-responsive">-->
<!--                                            <table class="table table-hover m-b-0">-->
<!--                                                <tbody>-->
<!--                                                <tr>-->
<!--                                                    <td class="b-none">-->
<!--                                                        <a href="#!" class="align-middle">-->
<!--                                                            <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">-->
<!--                                                            <div class="d-inline-block">-->
<!--                                                                <h6>Jeny William</h6>-->
<!--                                                                <p class="text-muted m-b-0">Graphic Designer</p>-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </td>-->
<!--                                                </tr>-->
<!--                                                </tbody>-->
<!--                                            </table>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="text-center">-->
<!--                                <a href="#!" class="b-b-primary text-primary">View all Projects</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="col-xl-6 col-md-12">-->
<!--                    <div class="card user-card-full">-->
<!--                        <div class="row m-l-0 m-r-0">-->
<!--                            <div class="col-sm-4 bg-c-lite-green user-profile">-->
<!--                                <div class="card-block text-center text-white">-->
<!--                                    <div class="m-b-25">-->
<!--                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">-->
<!--                                    </div>-->
<!--                                    <h6 class="f-w-600">Jeny William</h6>-->
<!--                                    <p>Web Designer</p>-->
<!--                                    <i class="feather icon-edit m-t-10 f-16"></i>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-8">-->
<!--                                <div class="card-block">-->
<!--                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-sm-6">-->
<!--                                            <p class="m-b-10 f-w-600">Email</p>-->
<!--                                            <h6 class="text-muted f-w-400"><a href="https://colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="670d02091e27000a060e0b4904080a">[email&#160;protected]</a></h6>-->
<!--                                        </div>-->
<!--                                        <div class="col-sm-6">-->
<!--                                            <p class="m-b-10 f-w-600">Phone</p>-->
<!--                                            <h6 class="text-muted f-w-400">0023-333-526136</h6>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-sm-6">-->
<!--                                            <p class="m-b-10 f-w-600">Recent</p>-->
<!--                                            <h6 class="text-muted f-w-400">Guruable Admin</h6>-->
<!--                                        </div>-->
<!--                                        <div class="col-sm-6">-->
<!--                                            <p class="m-b-10 f-w-600">Most Viewed</p>-->
<!--                                            <h6 class="text-muted f-w-400">Able Pro Admin</h6>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <ul class="social-link list-unstyled m-t-40 m-b-10">-->
<!--                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook"><i class="feather icon-facebook facebook" aria-hidden="true"></i></a></li>-->
<!--                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter"><i class="feather icon-twitter twitter" aria-hidden="true"></i></a></li>-->
<!--                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram"><i class="feather icon-instagram instagram" aria-hidden="true"></i></a></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- wather user -->

                <!-- social download  start -->
<!--                <div class="col-xl-4 col-md-6">-->
<!--                    <div class="card social-card bg-simple-c-blue">-->
<!--                        <div class="card-block">-->
<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-auto">-->
<!--                                    <i class="feather icon-mail f-34 text-c-blue social-icon"></i>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <h6 class="m-b-0">Mail</h6>-->
<!--                                    <p>231.2w downloads</p>-->
<!--                                    <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <a href="#!" class="download-icon"><i class="feather icon-arrow-down"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xl-4 col-md-6">-->
<!--                    <div class="card social-card bg-simple-c-pink">-->
<!--                        <div class="card-block">-->
<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-auto">-->
<!--                                    <i class="feather icon-twitter f-34 text-c-pink social-icon"></i>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <h6 class="m-b-0">twitter</h6>-->
<!--                                    <p>231.2w downloads</p>-->
<!--                                    <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <a href="#!" class="download-icon"><i class="feather icon-arrow-down"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xl-4 col-md-12">-->
<!--                    <div class="card social-card bg-simple-c-green">-->
<!--                        <div class="card-block">-->
<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-auto">-->
<!--                                    <i class="feather icon-instagram f-34 text-c-green social-icon"></i>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <h6 class="m-b-0">Instagram</h6>-->
<!--                                    <p>231.2w downloads</p>-->
<!--                                    <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <a href="#!" class="download-icon"><i class="feather icon-arrow-down"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- social download  end -->
            

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
                test : '',
                days : [],
                datas :[],
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
                        console.log(res.data.days);
                        self.totalSubs  = res.data.totalSubs;
                        self.totalAcceptSubs  = res.data.totalAcceptSub;
                        self.totalRejSubs = res.data.totalRejSub;
                        self.totalExpSubs = res.data.totalExpSub;
                        self.totalPenSubs = res.data.totalPenSub;
                        self.totalRevSubs = res.data.totalRevSub;
                        self.days = [res.data.days[0].date,res.data.days[1].date,res.data.days[2].date,res.data.days[3].date,res.data.days[4].date,res.data.days[5].date,res.data.days[6].date];

                       self.charts(res.data.days[0].count,res.data.days[1].count,res.data.days[2].count,res.data.days[3].count,res.data.days[4].count,res.data.days[5].count,res.data.days[6].count);
/*                         self.donutsChart();
 */                        self.statusChart(res.data.days[0].count,res.data.days[1].count,res.data.days[2].count,res.data.days[3].count,res.data.days[4].count,res.data.days[5].count,res.data.days[6].count);

                    }
                    else{
                        console.log('no res')
                    }
                });
            },
            fetchWeekData(){
             axios.get('week-data').then(function(){
                 alert(res.data);
             });
            },
            charts(s,m,t,w,th,fr,sa){
                let self  = this;
                let myChart = document.getElementById('myChart').getContext('2d');
                Chart.defaults.global.defaultFontFamily = 'Verdana';
              //  Chart.defaults.global.defaultFontSize = '11px';
                Chart.defaults.global.defaultFontWeight =  400;
                Chart.defaults.global.defaultFontColor = 'rgb(53, 60, 78)';
                Chart.defaults.global.legend.display = false;
              
                let chart = new Chart(myChart,{
                    type: 'bar',
                    data : {
                        labels : this.days,
                        datasets : [{
                            label : 'Total sub',
                            data : [s,m,t,w,th,fr,sa],
                             backgroundColor : '#FE9156',
                            hoverBorderWidth : 4,
                            
                        },
                            {
                            label : 'pending',
                            data : [23,45,34,12,45,67,98],
                            backgroundColor : '#00ACAE',
                           
                        },
                          {
                            label : 'Accepted',
                            data : [67,98,32,15,65,37,78],
                            backgroundColor : '#00E18E',
                        },
                        {
                            label : 'Active',
                            data : [20,19,22,55,35,17,75],
                            backgroundColor : '#6fdbd9',
                        },
                        {
                            label : 'Rejected',
                            data : [45,18,36,45,55,31,90],
                            backgroundColor : '#FF3C64',
                        },
                         {
                            label : 'Expired',
                            data : [48,19,16,41,85,41,10],
                            backgroundColor : '#727272',
                            barThickness : 3,
                        }
                        ],
                    },
                    options: {
                        title : {
                            display :  true,
                            text : 'Total Subscriptions for the week',
                            fontSize : 16,

                        },
                        tooltips:{
                          //  backgroundColor : 'transparent',
                          //  borderWidth  : 2,
                           // borderColor : '#00ACAE',
                            //titleFontColor : '#000',
                            titleFontSize : 19,
                            mode : 'index',
                            displayColors : false,
                            labelTextColor : 'red',
                            lineHeight : '10px',
                           // bodyFontColor : 'black',
                            bodyFontSize : 16,
                            bodySpacing : 3,
                            displayColors : true,
                            multiKeyBackground : 'black',
                            caretSize : 6,
                            caretPadding : 10,
                            titleMarginBottom : 8
                            
                            
                        },
                        lengend:{
                            display : true,
                         labels:{
                             fontColor : '#001'
                         }
                        },
                        responsive : true,
                        scales: {
                         xAxes: [{
                         display : true,
                             scaleLabel:{
                              display : true,
                              labelString : 'Date',
                             }, 
                            // stacked : true,
                             
                           // barPercentage: 0.4,
                           // barThickness : 45,
                            gridLines :{
                                display : false,
                            },
                               categoryPercentage: 0.7,
                               barPercentage: 0.8
                              
                              }],

                         yAxes:[{
                             display : true,
                             scaleLabel:{
                              display : true,
                              labelString : 'Values',
                             },
                            // stacked : true,
                             /* gridLines: {
                                 display : false
                             }, */
                         ticks: {
                       //  max: 500,
                       //  min: 0,
                       //  stepSize: 100,
                         beginAtZero: true,
                         padding: 10,
                     },
                        }]
                          },     
                    }
                });
            },
              statusChart(s,m,t,w,th,fr,sa){
                let self  = this;
                let myPie = document.getElementById('piechart').getContext('2d');
                Chart.defaults.global.defaultFontFamily = 'Verdana';
              //  Chart.defaults.global.defaultFontSize = '11px';
                Chart.defaults.global.defaultFontWeight =  400;
                Chart.defaults.global.defaultFontColor = 'rgb(53, 60, 78)';
                Chart.defaults.global.legend.display = false;
              
                let chartPie = new Chart(myPie,{
                
                      type: 'bar',
                    data : {
                        labels : this.days,
                        datasets : [{
                            label : 'Amount(GHC)',
                            data : [300,800,3000,500,4000,8000,400],
                             backgroundColor : '#00ACAE',
                            hoverBorderWidth : 4,
                            
                        },
                        ],
                    },
                    options: {
                        title : {
                            display :  true,
                            text : 'Transactions for the week',
                            fontSize : 16,

                        },
                        tooltips:{
                          //  backgroundColor : 'transparent',
                          //  borderWidth  : 2,
                           // borderColor : '#00ACAE',
                            //titleFontColor : '#000',
                            titleFontSize : 19,
                            //mode : 'index',
                            displayColors : false,
                            labelTextColor : 'red',
                            lineHeight : '10px',
                           // bodyFontColor : 'black',
                            bodyFontSize : 16,
                            bodySpacing : 3,
                            displayColors : true,
                            multiKeyBackground : 'black',
                            caretSize : 6,
                            caretPadding : 10,
                            titleMarginBottom : 8
                            
                            
                        },
                        lengend:{
                            display : true,
                         labels:{
                             fontColor : '#001'
                         }
                        },
                        responsive : true,
                        scales: {
                         xAxes: [{
                         display : true,
                             scaleLabel:{
                              display : true,
                              labelString : 'Date',
                             }, 
                            // stacked : true,
                             
                           // barPercentage: 0.4,
                           // barThickness : 45,
                            gridLines :{
                                display : false,
                            },
                               categoryPercentage: 0.7,
                               barPercentage: 0.8
                              
                              }],

                         yAxes:[{
                             display : true,
                             scaleLabel:{
                              display : true,
                              labelString : 'Values',
                             },
                            // stacked : true,
                             /* gridLines: {
                                 display : false
                             }, */
                         ticks: {
                       //  max: 500,
                       //  min: 0,
                       //  stepSize: 100,
                         beginAtZero: true,
                         padding: 10,
                     },
                        }]
                          },     
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