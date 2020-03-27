<template>
  <div class="page-wrapper">
    <!-- Page-header start -->

    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>General Reports</h4>
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
                <div class="col-md-4 col-sm-4 col-xl-4 m-b-30">
                  <div class="form-group">
                    <h4 class="sub-title">Select type *</h4>
                    <select
                      v-model="payload.type"
                      class="form-control form-control-primary"
                      @change="ResetDates"
                    >
                      <option value disabled selected>Select type</option>
                      <!-- <option>All</option> -->
                      <option>Transactions</option>
                      <option>Subscriptions</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xl-4 m-b-30">
                  <div class="form-group">
                    <h4 class="sub-title">From *</h4>
                    <input
                      v-model="payload.fromDate"
                      type="date"
                      class="form-control form-control-primary"
                    />
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xl-4 m-b-30">
                  <div class="form-group">
                    <h4 class="sub-title">To *</h4>
                    <input
                      v-model="payload.toDate"
                      type="date"
                      class="form-control form-control-primary"
                    />
                  </div>
                </div>
                <div class="float-right animated fadeIn" style="padding-left: 12px;">
                  <button
                    type="button"
                    role="button"
                    class="btn btn-primary"
                    @click="fetchReport()"
                    :disabled="disabled"
                  >Fetch</button>
                  <span v-show="show" class="text-dark">
                    <img src="/images/loading.gif" width="20" height="20" />
                    Fetching please wait.....
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="card animated fadeIn" v-show="table" style="position:obsolute;z-index:99999">
            <div class="card-header"></div>
            <div class="card-block">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                  <div class="col-md-12" v-show="checkSelected == 'Transactions'">
                    <button
                      v-show="data.rows.length > 0"
                      @click="csvExport(csvDataTrans)"
                      class="btn btn-info"
                    >
                      <i class="fa fa-download"></i> CSV
                    </button>
                    <hr />
                    <mdb-datatable class="animated fadeIn" :data="data" striped bordered />
                  </div>
                  <div class="col-md-12" v-show="checkSelected == 'Subscriptions'">
                    <button
                      v-show="data2.rows.length > 0"
                      @click="csvExport(csvDataSubs)"
                      class="btn btn-info"
                    >
                      <i class="fa fa-download"></i> CSV
                    </button>
                    <hr />
                    <mdb-datatable class="animated fadeIn" :data="data2" striped bordered />
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
          // {
          //   label: "Rate card",
          //   field: "rate_card_title"
          // },
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

      if (self.searchValidations()) {
        if (self.compareSelectedDates()) {
          self.show = true;
          self.disabled = true;
          if (self.payload.type == "Transactions") {
            self.reRenderTable(self.table);
            axios
              .get("fetch-generalTrans/api/", {
                params: { data: [JSON.stringify(self.payload)] }
              })
              .then(function(res) {
                if (res.data.length > 0) {
                  self.unsetArray(self.data.rows);
                  res.data.forEach(function(obj) {
                    self.data.rows.push(obj);
                  });
                } else {
                  self.unsetArray(self.data.rows);
                  self.data.rows.push();
                }
                self.show = false;
                self.disabled = false;
                self.checkSelected = "Transactions";
                self.table = true;
              });
          } else {
            self.reRenderTable(self.table, self.data2.rows);

            axios
              .get("fetch-generalSubs/api", {
                params: { data: [JSON.stringify(self.payload)] }
              })
              .then(function(res) {
                if (res.data.length > 0) {
                  self.unsetArray(self.data2.rows);
                  res.data.forEach(function(obj) {
                    self.data2.rows.push(obj);
                  });
                } else {
                  self.unsetArray(self.data2.rows);
                  self.data2.rows.push();
                }

                self.show = false;
                self.disabled = false;
                self.checkSelected = "Subscriptions";
                self.table = true;
              });
          }
        }
      }
    },
    csvExport(arrData) {
        let today = new Date();
      let date =
        today.getFullYear() +
        "-" +
        (today.getMonth() + 1) +
        "-" +
        today.getDate();
      let time =
        today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      let dateTime = date + " " + time;
      let csvContent = "data:text/csv;charset=utf-8,";
      csvContent += [
        Object.keys(arrData[0]).join(";"),
        ...arrData.map(item => Object.values(item).join(";"))
      ]
        .join("\n")
        .replace(/(^\[)|(\]$)/gm, "");

      const data = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", data);
      link.setAttribute("download", "generalReport" + dateTime +  ".csv");
      link.click();
    },
    reRenderTable(table) {
      if (table == true) {
        table = false;
      }
    },
    unsetArray(data) {
      if (data.length > 0) {
        data.length = 0;
      }
    },
    searchValidations() {
      if (
        this.payload.type == "" ||
        this.payload.fromDate == "" ||
        this.payload.toDate == ""
      ) {
        this.errorMessage();
        return false;
      }
      return true;
    },
    errorMessage() {
      new PNotify({
        title: "Search error",
        type: "error",
        text: "All fields with (*) is required.",
        desktop: {
          desktop: true,
          icon: "assets/images/pnotify/error.png"
        }
      });
    },
    compareSelectedDates() {
      let date = new Date(this.payload.fromDate).setHours(0, 0, 0, 0);
      let date2 = new Date(this.payload.toDate).setHours(0, 0, 0, 0);
      if (date2.valueOf() < date.valueOf()) {
        new PNotify({
          title: "Search error",
          type: "error",
          text: "The end date can not be greater than start that.",
          desktop: {
            desktop: true,
            icon: "assets/images/pnotify/error.png"
          }
        });
        return false;
      }
      return true;
    },
    ResetDates() {
      this.payload.fromDate = "";
      this.payload.toDate = "";
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
    },
    csvData() {
      return this.data.rows.map(item => ({
        ...item,
        ID: item.transaction_id,
        Amount: item.amount,
        Status: time.transaction_status,
        Channel: item.payment_source,
        Date: item.updated_at
      }));
    },
    csvDataSubs() {
      return this.data2.rows.map(item => ({
        "Subscription ID ": item.subscription_id,
        "Subscription title": item.title,
        "Start Date": item.start,
        "End Date": item.end,
        "Rate card": item.rate_card_title,
        Spots: item.spots,
        Rate: item.rate,
        Duration: item.durations,
        Status: item.status,
        "Created date": item.created_at
      }));
    },
    csvDataTrans() {
      return this.data.rows.map(item => ({
        "Transaction ID ": item.transaction_id,
        Amount: item.amount,
        Status: item.transaction_status,
        Channel: item.payment_source,
        "Transaction date": item.updated_at
      }));
    }
  }
};
</script>