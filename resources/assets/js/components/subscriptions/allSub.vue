<template>
  <div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Subscriptions</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="page-header-breadcrumb"></div>
        </div>
      </div>
    </div>
    <!-- Page-header end -->

    <!-- Page-body start -->
    <div class="page-body">
      <div class="card">
        <search :segmentData="segments_data"></search>
        <div class="card-block table-border-style" v-show="showTable1">
          <div class="table-responsive">
            <table id class="table table-striped table-bordered nowrap">
              <thead>
                <tr class="table-primary">
                  <th>#</th>
                  <th>Subscription ID</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Spots</th>
                  <th>Subscription title</th>
                  <th>Segment</th>
                  <th>Duration</th>
                  <th>Rate card</th>
                  <th>Status</th>
                  <th>Created date</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(sub,index) in allSubs" :key="index">
                  <th scope="row">{{index + 1 }}</th>
                  <td>{{sub.subscription_id}}</td>
                  <td>{{sub.created_ad_data[0].startDate}}</td>
                  <td>{{sub.created_ad_data[0].endDate}}</td>
                  <td>{{sub.created_ad_data[0].spot}}</td>
                  <td>{{sub.title}}</td>
                  <td>{{sub.created_ad_data[0].startTime}}-{{sub.created_ad_data[0].endTime}}</td>
                  <td>{{sub.created_ad_data[0].durations}} sec</td>
                  <td>{{sub.created_ad_data[0].rate_card}}</td>
                  <td v-show="show">{{sub_status = sub.status}}</td>
                  <td class="text-info" style="font-weight: bolder">{{sub_status}}</td>
                  <td>{{sub.created_at}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <pagination></pagination>
  </div>
</template>

<script>
import store from "../../vuex/store";
import Pagination from "../partials/pagination";
import search from "../partials/search";

export default {
  name: "allSub",
  components: { Pagination, search },
  data() {
    return {
      segments_data: [],
      sub_status: "",
      show: false,
      url: "fetch-all-subs/api"
    };
  },
  mounted() {
    // this.fetchAllSub();
    store.dispatch("fetchAllSubs", this.pagi.current_page);
  },
  methods: {
    fetchAllSub() {
      let self = this;
      axios.get("fetch-all-subs/api").then(function(res) {
        console.log(res.data);
        self.segments_data = res.data;
      });
    }
  },
  computed: {
    allSubs() {
      return store.state.allSubs;
    },
    pagi() {
      return store.state.pagination;
    },
    showTable1() {
      return store.state.table1;
    }
  }
};
</script>
