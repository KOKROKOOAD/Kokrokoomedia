<template>
  <!--view rate cards -->
  <div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
    id="showSubDetails"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="page-wrapper">
          <!-- Page-header start -->
          <div class="page-header" v-show="processing">
            <div class="row align-items-end">
              <div class="col-lg-8">
                <div class="page-header-title">
                  <div class="d-inline">
                    <h4 class="animated fadeIn">
                      <strong
                        class="text-dark"
                        v-for="(sub,index) in trans_sub"
                        :key="index"
                        style="font-weight:800"
                      >{{sub.title}}</strong>
                    </h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="page-header-breadcrumb"></div>
              </div>
            </div>
          </div>
          <!-- Page-header end -->
          <div class="page-body">
            <!-- Default Styling table start -->
            <div class="row">
              <div class="col-md-5"></div>
              <div class="col-md-">
                <p v-show="loader">
                  <img src="/images/loading.gif" style="height: 20px;width: 20px;" />
                  <strong>Loading... Please wait</strong>
                </p>
                <p
                  class="text-danger"
                  style="font-weight:bold"
                  v-if="trans_sub == null"
                >{{error_message}}</p>
              </div>
              <div class="col-md-5"></div>
            </div>
            <div class="card">
              <div class="card-block table-border-style\">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered nowrap animated fadeIn">
                    <thead>
                      <tr class="table-primary">
                        <th>#</th>
                        <th>Subscription ID</th>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Spots</th>
                        <th>Rate(GHC)</th>
                        <th>Durations</th>
                        <th>Rate card</th>
                        <th>Status</th>
                        <th>Date created</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(subs,index) in trans_sub" :key="index">
                        <th scope="row">{{index + 1}}</th>
                        <td>{{subs.subscription_id}}</td>
                        <td>{{subs.title}}</td>
                        <td>{{subs.start}}</td>
                        <td>{{subs.end}}</td>
                        <td>{{subs.spots}}</td>
                        <td>{{subs.rate}}</td>
                        <td>{{subs.durations}}</td>
                        <td>{{subs.rate_card_title}}</td>
                        <td>{{subs.status}}</td>
                        <td>{{subs.created_at}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="container-fluid">
                  <p class="float-right" style="font-size:18px;font-weight:900">
                    Total Bill :
                    <strong
                      class="text-danger"
                      v-for="(subs,index) in trans_sub"
                      :key="index"
                    >GHC{{subs.spots * subs.rate}}</strong>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" v-show="processing">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "viewTransacSubs",
  props: ["id"],
  data() {
    return {
      trans_sub: null,
      processing: false,
      loader: true,
      error_message: ""
    };
  },
  mounted() {
    this.viewTransacButtonClickEvent();
  },
  methods: {
    viewTransacButtonClickEvent() {
      let self = this;
      let client_id = null;
      $(document).on("click", ".view-sub", function() {
        client_id = $(this).attr("data-id");

        $("#showSubDetails").modal("show");
        self.viewTransactionSubs(client_id);
      });
    },
    viewTransactionSubs(sub_id) {
      let self = this;
      axios.get("fetch-trans-subs/" + sub_id).then(function(res) {
        if (res.data.success == "success") {
          self.trans_sub = res.data.subs;
          self.loader = false;
          self.processing = true;
        } else {
          self.loader = false;
          self.processing = true;
          self.error_message =
            "Subscription for this transaction not found .Please contact support@kokrokooad.com";
        }
      });
    }
  },
  computed: {}
};
</script>