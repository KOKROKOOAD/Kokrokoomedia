<template>
  <div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <!--<ul v-for="s in segments_data">-->
            <!--<li>{{s.created_ad_data[0]}}</li>-->
            <!--</ul>-->
            <div class="d-inline">
              <h4>Pending Segments</h4>
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
      <!-- Default Styling table start -->
      <div class="card">
        <search></search>
        <div class="card-block table-border-style">
          <div  class="table table-striped table-bordered nowrap">
            <table class="table animated fadeIn" v-show="showPendTable">
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
                  <th>File type</th>
                  <th>Created date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!--<div  v-if="segments_data.length === 0" class="row" style="text-align: center">-->
                <!--<span style="margin-left: 100px;">No pending subscriptions</span>-->

                <!--</div>-->
                <tr v-for="(sub,index) in pendingSubs" :key="index">
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
                  <td v-show="sta" style="font-weight: bolder;color:orange">{{sub_status}}</td>
                  <td>
                    {{fileTypes(sub.file_type)}}
                    <a
                      href="javascript:;"
                      role="button"
                      type="button"
                      @click="downloadFile(sub.subscription_id)"
                      class
                      v-show="fileTypes(sub.file_type) == 'document'"
                    >
                      <i class="feather icon-download"></i>
                    </a>
                  </td>
                  <td v-show="loading" :id="index" class="text-info" style="font-weight: bolder">
                    updating status
                    <img src="/images/loading.gif" width="20" height="20" />
                  </td>
                  <td>{{sub.created_at}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button
                        type="button"
                        class="btn btn-default btn-sm"
                        @click="reviewSubs(sub.client_id,sub.media_house_id,sub.subscription_id,sub.file_type,sub.file_name)"
                      >
                        <i class="feather icon-eye"></i>
                      </button>

                      <!--                                        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-times"> </i> </button>-->
                      <!--<button type="button" class="btn btn-secondary">Right</button>-->
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <view-file
            :fileType="fileType"
            :media_id="media_house_id"
            :fileName="fileName"
            :showPendingTable="showPendingTable"
            :showImage="showImage"
            :sub_id="subscrip_id"
            :approvedAd="approvedSub"
            :user_id="user_id"
          ></view-file>
        </div>
      </div>
    </div>
    <pagination></pagination>
  </div>
</template>

<script>
import ViewFile from "./viewFile";
import store from "../../vuex/store";
import search from "../partials/search";

export default {
  name: "pendingSub",
  components: { ViewFile, search },
  data() {
    return {
      segments_data: [],
      status: "",
      formData: new FormData(),
      show: false,
      sub_status: "",
      loading: false,
      sta: true,
      view_file: false,
      client_id: "",
      sub_client: "",
      fileName: "",
      fileType: "",
      showImage: false,
      showPendingTable: true,
      sub_id: "",
      media_house_id: null,
      subscrip_id: null,
      user_id: null
    };
  },
  mounted() {
    // this.fetchSub();
    store.dispatch("pendingSubs", this.pagi.current_page);
  },
  created() {
    // this.listenUpdateSubStatusEvent();
    // Echo.channel('update-sub-status')
    //     .listen('.UpdateSubscriptionStatusEvent', function(e) {
    //         //  this.sub_status = e.status;
    //         console.log(e.status);
    //     });
  },
  methods: {
    fetchSub() {
      let self = this;
      axios.get("fetch-subs/api").then(function(res) {
        // console.log(res.data);
        self.segments_data = res.data;
      });
    },
    approvedSub(subscription_id, index) {
      let self = this;
      //   self.formData.append('client_id',client_id);
      self.formData.append("sub_id", subscription_id);

      self.sta = false;

      store.dispatch("getShowPendTable", true);
      axios.post("update-subs-status/api", self.formData).then(function(res) {
        //console.log(res.data);
        if (res.data === "accepted") {
          self.sta = true;
        }
      });
    },
    showViewFile(client_id, sub_id, fileName) {
      let self = this;
      self.showPendingTable = false;
      self.sub_id = sub_id;

      //  store.dispatch('getShowPendTable', false);
      self.client_id = client_id;
      self.sub_id = sub_id;
      self.file = fileName;

      let formData = new FormData();
      formData.append("client_id", client_id);
      formData.append("sub_id", sub_id);
      formData.append("fileName", fileName);

      let param_data = [client_id, sub_id, fileName];
      axios
        .get("fetch-file/api", {
          params: { sub_id: sub_id, fileName: fileName, client_id: client_id }
        })
        .then(function(res) {
          //console.log(res.data);
          if (res.data) {
            console.log(res.data);
            self.fileType = res.data.file_type;
            if (self.fileType !== "image/png") {
              $("#viewFile").modal("show");
              // alert(self.fileType);
            }
            //  console.log(res.data.file_type);
          }
        });
    },
    reviewSubs(user_id, media_house_id, sub_id, fileType, fileName) {
      this.fileType = fileType;
      this.fileName = fileName;
      this.subscrip_id = sub_id;
      this.media_house_id = media_house_id;
      this.user_id = user_id;
      $("#viewFile").modal("show");
    },
    test() {
      $("#viewFile").modal("show");
    },

    listenUpdateSubStatusEvent() {
      Echo.channel("updateStatus").listen(
        "UpdateSubscriptionStatusEvent",
        function(e) {
          //  this.sub_status = e.status;
          alert("hello world");
        }
      );
    },
    fileTypes(fileType) {
      let f_type = fileType.split("/");
      if (f_type[0] == "application") {
        return "document";
      } else {
        return f_type[0];
      }
    },
    downloadFile(sub_id) {
      axios.get("download-sub/" + sub_id).then(function(res) {
        if (res) {
          window.location = "download-sub/" + sub_id;
        } else {
          console.log(res.error);
        }
      });
    }
  },
  computed: {
    showPendTable() {
      return store.getters.showPendTable;
    },
    loader(index) {},
    pendingSubs() {
      return store.state.pendingSubs;
    },
    pagi() {
      return store.state.pagination;
    }
  }
};
</script>

<style scoped>
</style>