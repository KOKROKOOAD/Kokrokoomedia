
<!--  services start -->
<section id="services">
    <!--  service-1 start -->
    <div id="service-1" class="big-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center wow slideInDown">
                    <div class="section-top-heading">
                        <h5>What We Do</h5>
                        <h2>Our Services</h2>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-7 wow slideInLeft">
                    <div class="outer-bound">
                        <div class="left-section">
                            <img src="images/site-logo.png" class="img-responsive" alt="laptop">
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="right-section wow slideInRight">
                        <div class="feature">
                            <div class="row">

                                <div class="col-sm-2">
                                    <h2 class="icon">
                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                        <span class="sr-only">icon</span>
                                    </h2>

                                </div>
                                <div class="col-sm-10">

                                    {{--<h5>Feature 01</h5>--}}
                                    <h4>Radio Advertisement</h4>
                                    <p>You can have all your audio ads played
                                        seamlessly by your preferred  radio stations</p>

                                </div>
                            </div>
                        </div>
                        <div class="feature middle">
                            <div class="row">

                                <div class="col-sm-2 ">
                                    <h2 class="icon">
                                        <i class="fa fa-television" aria-hidden="true"></i>
                                        <span class="sr-only">icon</span>
                                    </h2>

                                </div>
                                <div class="col-sm-10">

                                    {{--<h5>Feature 02</h5>--}}
                                    <h4>Television Advertisement</h4>
                                    <p>At your own comfort, we will link you to all
                                        our TV station partners  for publishing your ads
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="row">

                                <div class="col-sm-2 ">
                                    <h2 class="icon">
                                        <i class="fa fa-print" aria-hidden="true"></i>
                                        <span class="sr-only">icon</span>
                                    </h2>

                                </div>
                                <div class="col-sm-10" style="margin-bottom: 50px;">

                                    {{--<h5>Feature 03</h5>--}}
                                    <h4>Print media advertisement</h4>
                                    <p>
                                        Newspapers, magazines, etc will be easier for our clients to push their ads since
                                        they can easily send image files to various print media houses for advertisements.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="row">

                                <div class="col-sm-2 ">
                                    <h2 class="icon">
                                        <i class="fa fa-map-signs" aria-hidden="true"></i>
                                        <span class="sr-only">icon</span>
                                    </h2>

                                </div>
                                <div class="col-sm-10" style="margin-bottom: 50px;">

                                    {{--<h5>Feature 03</h5>--}}
                                    <h4>BillBoard advertisement</h4>
                                    <p>Digital billboard advertisement subscription with ease</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="feature">
                        <div class="row">

                            {{--<div class="col-sm-2 ">--}}
                                {{--<h2 class="icon">--}}
                                    {{--<i class="fa fa-user-times" aria-hidden="true"></i>--}}
                                    {{--<span class="sr-only">icon</span>--}}
                                {{--</h2>--}}

                            {{--</div>--}}
                            {{--<div class="col-sm-10">--}}

                                {{--<h5>Feature 03</h5>--}}
                                {{--<h4>Online Live Support</h4>--}}
                                {{--<p>Contact us directly</p>--}}

                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  service-1 end -->

    <!--  service-2 start -->
    <div id="service-2" class="mid-level-padding">
        <div id="responsiveTabsDemo">
            <ul class="text-center">
                <li><a href="#tab-1">Radio</a></li>
                <li><a href="#tab-2">Print Media</a></li>
                <li><a href="#tab-3">Billboard</a></li>
                <li><a href="#tab-4">Television</a></li>
            </ul>

            <div id="tab-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="images/radio3.jpg" width="542" height="470" alt="pineapple" class="element-center">
                        </div>
                        <div class="col-md-6">
                            <div class="tabs-bg">
                                {{--<h2>01</h2>--}}
                                <h3>Online radio advertising solutions.
                                    .</h3>
                                <p>
                                    Kokrokoo enables customers to place ads easily to radio stations. From the menu of airtime play offered by the stations,
                                    one can easily select a particular time play for their advertisement. Once payment is done, the customer is notified
                                    when selected ad starts rolling.</p>
                                @include('includes.pages.partials.buttons.get-in-touch')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="images/print.jpg" width="542" height="470" alt="pineapple" class="element-center">
                        </div>
                        <div class="col-md-6">
                            <div class="tabs-bg">
                                {{--<h2>02</h2>--}}
                                <h3>Advertise through online print media with ease.
                                    </h3>
                                <p>Send your clear, crisp image files to newspapers,magazines and other print media for advertisements. It is easier and faster to
                                    upload your ads now with no stress!</p>
                                 @include('includes.pages.partials.buttons.get-in-touch')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="images/billboard.jpg" width="542" height="470" alt="pineapple" class="element-center">
                        </div>
                        <div class="col-md-6">
                            <div class="tabs-bg">
                                {{--<h2>03</h2>--}}
                                <h3>Hustle free billboard advertising
                                    .</h3>
                                <p>Aiming at sending direct messages to specific customers over a wide territory through billboards,
                                    kokrokoo offers the perfect platform for this. All is required of you is to select the
                                    agency that offers the particular billboard and location prefered. It gets as simple as that.</p>
                                 @include('includes.pages.partials.buttons.get-in-touch')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="images/tv.jpg" width="542" height="470" alt="pineapple" class="element-center">
                        </div>
                        <div class="col-md-6">
                            <div class="tabs-bg">
                                <h2>04</h2>
                                <h3>Grow your business faster through television ads
                                    </h3>
                                <p>Do you aim at targeting larger audiences from all the subscribers of the TV Stations. Our software which hosts all TV
                                    stations allows you to convey ads to these media houses for advertisement. All that is required is to select the particular station
                                    needed and forward the video file for live play.</p>
                                  @include('includes.pages.partials.buttons.get-in-touch')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--  service-2 end -->

    <!-- service-2 start -->
    <div id="service-3" class="mid-level-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 wow slideInLeft">
                    <div class="top-section vertical-heading">
                        <span>fun facts</span>
                        <h2>
                            We Expect<br>
                            <strong>Excellence</strong> Services
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp" data-wow-duration="2s">
                <div class="col-sm-12">
                    <div class="bottom-section text-center">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="left-section section">
                                    <h2><i class="fa fa-users" aria-hidden="true"></i><span class="sr-only">icon</span>
                                    </h2>
                                    <h3>125</h3>
                                    <p>Happy Clients</p>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="left-section section">
                                    <h2><i class="fa fa-codepen" aria-hidden="true"></i><span
                                                class="sr-only">icon</span></h2>
                                    <h3>9102</h3>
                                    <p>Media houses</p>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="section">
                                    <h2><i class="fa fa-trophy" aria-hidden="true"></i><span class="sr-only">icon</span>
                                    </h2>
                                    <h3>06</h3>
                                    <p>Advertising partners</p>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="section">
                                    <h2><i class="fa fa-bar-chart" aria-hidden="true"></i><span
                                                class="sr-only">icon</span></h2>
                                    <h3>06</h3>
                                    <p>Awards Received</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- service-2 end -->

</section>
<!--  services end-->
