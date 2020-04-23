<template>
  <!-- Edit With Click card start -->
  <div class="card">
    <div class="card-header">
      <!--            <h5>Mondays-Fridays</h5>-->
      <span>Click on the add row button to add new row.</span>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="example-1">
          <thead>
            <tr style="background: #36475F;color: #ffffff;" class="animated fadeIn">
              <th>#</th>
              <!--                                    <th class="text-center">Start date</th>-->
              <!--                                    <th class="text-center"> Ene date</th>-->
              <th class="text-center">Advert size & Positions</th>
              <th class="text-center">Spots</th>
              <th class="text-center">Rate(GHC)</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(dtl, index) in data_list" :key="index">
              <th scope="row">{{index + 1}}</th>
              <!--                                    <td class="text-center"><input class="form-control" type="date" data-date-format="DD-MMMM-YYYY" v-model="dtl.start" style="border-color:transparent;background:transparent"> </td>-->
              <!--                                    <td class="text-center"><input class="form-control" type="date" data-date-format="DD-MMMM-YYYY" v-model="dtl.end" style="border-color:transparent;background:transparent"> </td>-->
              <td class="text-center">
                <input
                  class="form-control"
                  placeholder="Size and position"
                  type="text"
                  v-model="dtl.sizeAndPosition"
                  style="border-color:transparent;background:transparent"
                />
              </td>
              <td class="text-center">
                <input
                  class="form-control"
                  placeholder="Enter spots"
                  type="number"
                  v-model="dtl.spots"
                  style="border-color:transparent;background:transparent"
                />
              </td>
              <td class="text-center">
                <input
                  type="text"
                  v-model="dtl.rate"
                  placeholder="Enter rate"
                  style="border-color:transparent;background:transparent"
                />
              </td>
              <td>
                <!--<button type="button" class="btn btn-info" @click="delwRow(index)"><i class="fa fa-minus-circle"></i> Delete row </button>-->
                <button type="button" class="btn btn-danger btn-sm" @click="delRow(index)">
                  <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <button
          type="button"
          class="btn btn-secondary btn-sm waves-effect waves-light add"
          @click="addRow"
        >Add Row</button>
      </div>
      <button
        type="button"
        class="btn btn-danger waves-effect waves-light add pull-right"
        @click="insertResults()"
      >Submit</button>
    </div>
  </div>
</template>

<script>
import store from "../../vuex/store";

export default {
  props: ["rate_card_title_id"],
  name: "printRateCard",

  mounted() {},
  created() {
    //this.fetchSegments();
  },
  data() {
    return {
      //invoice: '/user-account/create-sub-invoice',
      segment_date: "/user-account/create-sub-date",
      selSegment_url: "/user-account/select-segment",
      spots_available: 10,
      selSegment: "",
      selMedia: "",
      advert_size: "",
      seg_data: [],
      spots: [],
      print_segments: [
        { advert_size: '1/1" Inside', rate: "104", startTime: "", endTime: "" },
        { advert_size: '2/2" Inside', rate: "149", startTime: "", endTime: "" },
        { advert_size: '2/3" Inside', rate: "208", startTime: "", endTime: "" }
      ],
      title: "",
      rate: "",
      day: "Monday",
      invoice: "invoice",
      start: "",
      end: "",
      event_time: false,
      startDates: [],
      endDates: [],
      data_list: []
    };
  },
  methods: {
    insertResults() {
      let self = this;
      let formData = new FormData();
      console.log(JSON.stringify(self.data_list));

      formData.append("rateCardData", JSON.stringify(self.data_list));
      formData.append("rate_card_title_id", self.rate_card_title_id);

      axios.post("store-ratecard/api", formData).then(function(res) {
        if (res.data === "success") {
          window.location = "create-ratecard/success";
        }
      });
    },

    addRow() {
      let elem = document.createElement("tr");
      this.data_list.push({
        sizeAndPosition: "",
        rate: "",
        spots: ""
      });
    },
    delRow(index) {
      this.data_list.splice(index, 1);
      //this.r_animate = 'animated fadeOut';
    }
  },

  computed: {}
};
</script>

