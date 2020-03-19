<template>
  <div class="page-wrapper">
    <!-- Page-header start -->

    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Daily Reports</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title"></ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Page-header end -->

    <!-- Page body start -->
    <div class="page-body">
      <div class="row">
        <div class="col-sm-12">
          <!-- Default select start -->
          <div class="card">
            <div class="card-header"></div>
            <div class="card-block">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                  <div class="form-group">
                    <h4 class="sub-title">Select type</h4>
                    <select v-model="payload.type" class="form-control form-control-primary">
                      <option value disabled selected>Select type</option>
                      <!-- <option>All</option> -->
                      <option>Transactions</option>
                      <option>Subscriptions</option>
                    </select>
                  </div>
                  <div class="animated fadeIn">
                    <button
                      type="button"
                      role="button"
                      class="btn btn-primary"
                      @click="fetchReport()"
                      :disabled="disabled"
                    >Fetch Report</button>
                    <span v-show="show" class="text-dark">
                      <img src="/images/loading.gif" width="20" height="20" />
                      Fetching please wait.....
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card animated fadeIn" v-show="table">
            <div class="card-header"></div>
            <div class="card-block">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                  <div class="col-md-12">
                    <!-- <exportToCSV :columns="data.columns" :data="data.rows">CSV</ExportToCSV> -->
                    <mdb-datatable
                      class="animated fadeIn"
                      v-show="checkSelected == 'Transactions'"
                      :data="data"
                      striped
                      bordered
                      ExportToCSV
                    />
                    <mdb-datatable
                      v-show="checkSelected == 'Subscriptions'"
                      :data="data2"
                      striped
                      bordered
                      ExportToCSV
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mdbDatatable, ExportToCSV } from "mdbvue";
export default {
  name: "dailyReports",
  components: {
    mdbDatatable,
    ExportToCSV
  },
  mounted() {},
  data() {
    return {
      payload: {
        type: "",
        fromDate: "",
        toDate: ""
      },
      checkSelected: "",
      reports: [],
      table: false,
      show: false,
      disabled: false,
      demo: {
        transaction_id: "ksfsfserer",
        amount: "34",
        transaction_status: "paid",
        payment_source: "MTN",
        updated_at: "2020-03-19"
      },
      data: {
        columns: [
          {
            label: "Transaction ID",
            field: "transaction_id"
          },
          {
            label: "Amount",
            field: "amount"
          },
          {
            label: "Status",
            field: "transaction_status"
          },
          {
            label: "Channel",
            field: "payment_source"
          },
          {
            label: "Transaction date",
            field: "updated_at"
          }
        ],
        rows: []
      },
      data2: {
        columns: [
          {
            label: "Subscription ID",
            field: "subscription_id"
          },
          {
            label: "Start Date",
            field: "start"
          },
          {
            label: "End Date",
            field: "end"
          },
          {
            label: "Spots",
            field: "spots"
          },
          {
            label: "Subscription title",
            field: "title"
          },
          {
            label: "Duration",
            field: "durations"
          },
          //   {
          //     label: "Rate card",
          //     field: "rate_card_title"
          //   },
          {
            label: "Status",
            field: "status"
          },
          {
            label: "Created date",
            field: "updated_at"
          }
        ],
        rows: []
      }
    };
  },
  methods: {
    fetchReport() {
      let self = this;
      self.show = true;
      self.disabled = true;

      if (self.payload.type == "Transactions") {
        if (self.data.rows.length > 0) {
          self.data.rows = [];
        }
        axios
          .get("fetch-dailyTrans/api/", {
            params: { data: [JSON.stringify(self.payload)] }
          })
          .then(function(res) {
            res.data.forEach(function(obj) {
              self.data.rows.push(obj);
            });
            self.show = false;
            self.disabled = false;
            self.checkSelected = "Transactions";
            self.table = true;
          });
      } else {
        if (self.data2.rows.length > 0) {
          self.data2.rows = [];
        }
        axios.get("fetch-dailySubs/api").then(function(res) {
          res.data.forEach(function(obj) {
            self.data2.rows.push(obj);
          });
          self.show = false;
          self.disabled = false;
          self.checkSelected = "Subscriptions";
          self.table = true;
        });
      }
    }
  },
  computed: {
    getData() {
      return [
        {
          transaction_id: "ksfsfserer",
          amount: "34",
          transaction_status: "paid",
          payment_source: "MTN",
          updated_at: "2020-03-19"
        }
      ];
    }
  }
};
</script>