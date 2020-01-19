<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Transactions</h4>
                            <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <!--<ul class="breadcrumb-title">-->
                            <!--<li class="breadcrumb-item">-->
                                <!--<a href="index.html"> <i class="feather icon-home"></i> </a>-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item"><a href="#!">Styling Table</a>-->
                            <!--</li>-->
                        <!--</ul>-->
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
<!--                <div class="card-header">-->
<!--                    &lt;!&ndash;<h5>Default Styling</h5>&ndash;&gt;-->
<!--                    &lt;!&ndash;<span>use class <code>table table-styling</code> inside table element</span>&ndash;&gt;-->

<!--                </div>-->
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table   class="table  table-striped table-bordered nowrap">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Transaction Date</th>
                                <th>Transaction id</th>
<!--                                <th>Subscription id</th>-->
                                <th>Payment source</th>
                                <th>Amount Paid(GHC)</th>
                                <th>Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(trans,index) in transactions">
                                <th scope="row">{{index + 1}}.</th>
                                <td>{{trans.created_at}}</td>
                                <td>{{trans.transaction_id}}</td>
                                <td>{{trans.service}}</td>
                                <td>{{trans.payment_source}}</td>
                                <td>{{trans.amount}}</td>
<!--                                <td></td>-->

                            </tr>
                            </tbody>
                        </table>
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
        name: "transactions",
        data(){
            return{
                transactions : [],
            }
        },
        mounted(){
            this.fetchTransactions();
        },
        methods:{
            fetchTransactions(){
                let self = this;

                axios.get('fetch-transac/api').then(function (res) {
                       console.log(res.data);
                        self.transactions = res.data;
                });
            }
        },
        computed:{

        }
    }
</script>

<style scoped>

</style>