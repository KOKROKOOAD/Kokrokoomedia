<template>
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <nav class="pcoded-navbar">
                <div class="pcoded-inner-navbar main-menu">
                    <div class="pcoded-navigatio-lavel">Navigation</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu active pcoded-trigger">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="active">
                                    <router-link :to="{name : 'home'}">
                                        <span class="pcoded-mtext">home</span>
                                    </router-link>
                                </li>
                                <!--<li class=" ">-->
                                    <!--<a href="dashboard-analytics.html">-->
                                        <!--<span class="pcoded-mtext">Analytics</span>-->
                                        <!--<span class="pcoded-badge label label-info ">NEW</span>-->
                                    <!--</a>-->
                                <!--</li>-->
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu active pcoded-trigger">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
                                <span class="pcoded-mtext">Subscriptions</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li>
                                    <router-link :to="{name : 'selectMedia'}">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Create Subscription</span>
                                    </router-link>
                                </li>
                                <li class="">
                                    <router-link :to="{name : 'subs'}">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">My Subscriptions</span>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class=" ">
                            <router-link :to="{name : 'transactions'}">
                                <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                                <span class="pcoded-mtext" >Transactions</span>
                                <!--<span class="pcoded-badge label label-warning">NEW</span>-->
                            </router-link>
                        </li>
                        <!--<li class=" ">-->
                            <!--<router-link :to="{name : 'profile'}">-->
                                <!--<span class="pcoded-micon"><i class="feather icon-user"></i></span>-->
                                <!--<span class="pcoded-mtext" >User profile</span>-->
                            <!--</router-link>-->
                        <!--</li>-->
                    </ul>
                </div>
            </nav>

            <!-- main content starts here -->
            <div class="pcoded-content">

                <div class="pcoded-inner-content">
                    <div class="main-body">

                        <!--{{&#45;&#45;page content goes here&#45;&#45;}}-->
                        <!--@yield('dashboard')-->
                        <router-view></router-view>


                        <div id="styleSelector">

                        </div>
                    </div>
                </div>
            </div>

            <!--main content ends here -->
        </div>
    </div>
</template>

<script>
    export  default {
        name:'sidebar',
        data(){
            return{

            }

        },
        mounted(){

        },
        created(){

        },
        methods:{
            routeUrl(){

                if(window.location !== 'localhost:8000/user-account/dashboard'){
                    return false;
                }
            }

        },
        computed :{

        }
    }
</script>