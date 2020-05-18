<template>
  <!-- Page-header end -->
  <!-- Page-body start -->
  <div class="page-body">
    <print-rate-card v-show="media == 'Print'" :rate_card_title_id="rate_card_title_id"></print-rate-card>

    <!-- Edit With Click card start -->
    <div class="card" v-show="media != 'Print'">
      <div class="card-header">
        <h5>Mondays-Fridays</h5>
        <span>Click on the add row button to add new row.Insert your data from monday-friday</span>
        <span v-show="show_rate">
          <strong>{{create}}</strong>
        </span>
      </div>

      <div class="card-block">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="example-1">
            <thead>
              <tr>
                <th>#</th>
                <th>{{days_of_the_week_and_durations.mon}}</th>
                <th>{{days_of_the_week_and_durations.tue}}</th>
                <th>{{days_of_the_week_and_durations.wed}}</th>
                <th>{{days_of_the_week_and_durations.thu}}</th>
                <th>{{days_of_the_week_and_durations.fri}}</th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="days_of_the_week_and_durations.sec1"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="days_of_the_week_and_durations.time1">
                    <option value disabled selected>TIME</option>
                    <option v-for="(s,i) in time" :key="i" :selected="i">{{s.sec}}</option>
                    <option v-for=" (min,k) in time" :key="k">{{min.min}}</option>
                    <option v-for="(hr,h) in time" :key="h">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="days_of_the_week_and_durations.sec2"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="days_of_the_week_and_durations.time2">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="days_of_the_week_and_durations.sec3"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="days_of_the_week_and_durations.time3">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="days_of_the_week_and_durations.sec4"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="days_of_the_week_and_durations.time4">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="days_of_the_week_and_durations.sec5"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="days_of_the_week_and_durations.time5">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>

                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr
                :class="r_animate"
                style="border: none;background: transparent"
                v-for="(dtl, index2) in data_list"
                :key="index2"
              >
                <td>{{index2 + 1}}</td>
                <td>
                  <select class required type="text" v-model="dtl.mon_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select
                    class
                    required
                    type="text"
                    v-model="dtl.mon_b_duration"
                  >
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>
                  To
                  <select
                    class
                    type="text"
                    required
                    v-model="dtl.mon_c_duration"
                  >
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select
                    class
                    type="text"
                    required
                    v-model="dtl.mon_d_duration"
                  >
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>

                  <input type="number" v-model="dtl.mon_spots" placeholder="Add spots" />
                </td>
                <td>
                  <select type="text" v-model="dtl.tue_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select
                    class
                    type="text"
                    required
                    v-model="dtl.tue_b_duration"
                  >
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>
                  To
                  <select type="text" v-model="dtl.tue_c_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="dtl.tue_d_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>

                  <input placeholder="Add spots" type="number" v-model="dtl.tue_spots" />
                </td>
                <td>
                  <select type="text" v-model="dtl.wed_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select
                    class
                    type="text"
                    required
                    v-model="dtl.wed_b_duration"
                  >
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>
                  To
                  <select type="text" v-model="dtl.wed_c_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="dtl.wed_d_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>

                  <input placeholder="Add spots" type="number" v-model="dtl.wed_spots" />
                </td>
                <td>
                  <select type="text" v-model="dtl.thu_duration">
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select
                    class
                    type="text"
                    required
                    v-model="dtl.thu_b_duration"
                  >
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>
                  To
                  <select type="text" v-model="dtl.thu_c_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="dtl.thu_d_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>

                  <input placeholder="Add spots" type="number" v-model="dtl.thu_spots" />
                </td>
                <td>
                  <select type="text" v-model="dtl.fri_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select class type="text" v-model="dtl.fri_b_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>
                  To
                  <select type="text" v-model="dtl.fri_c_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="dtl.fri_d_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>

                  <input placeholder="Add spots" type="number" v-model="dtl.fri_spots" />
                </td>
                <td>
                  <input
                    type="text"
                    placeholder="eg : GHC 200"
                    style="border: none"
                    v-model="dtl.sec1_rate"
                  />
                </td>
                <td>
                  <input type="text" style="border: none;" v-model="dtl.sec2_rate" />
                </td>
                <td>
                  <input type="text" style="border: none" v-model="dtl.sec3_rate" />
                </td>
                <td>
                  <input type="text" style="border: none;" v-model="dtl.sec4_rate" />
                </td>
                <td>
                  <input type="text" style="border: none" v-model="dtl.sec5_rate" />
                </td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" @click="delRow(index)">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <button
          type="button"
          class="btn btn-primary btn-sm waves-effect waves-light add"
          @click="addRow()"
        >Add Row</button>
      </div>
    </div>

    <!--weekend rate card  table-->

    <div class="card" v-show="media != 'Print'">
      <div class="card-header">
        <h5>Saturdays-Sundays</h5>
        <span>Click on the add row button to add new row.Insert your data from saturdays-sundays and submit</span>
      </div>
      <div class="card-block">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="example-2">
            <thead>
              <tr>
                <th>{{wdurations.sat}}</th>
                <th>{{wdurations.sun}}</th>

                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="wdurations.wsec1"
                    style="width: 50px !important;border: none;"
                  />
                  <select v-model="wdurations.time1">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="wdurations.wsec2"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="wdurations.time2">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="wdurations.wsec3"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="wdurations.time3">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="wdurations.sec4"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="wdurations.time4">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th class="create-ad-tb-th">
                  <input
                    type="number"
                    class="spin"
                    v-model="wdurations.wsec5"
                    style="width: 50px !important;border: none"
                  />
                  <select v-model="wdurations.time5">
                    <option value disabled selected>TIME</option>
                    <option v-for="s in time">{{s.sec}}</option>
                    <option v-for=" min in time">{{min.min}}</option>
                    <option v-for="hr in time">{{hr.hr}}</option>
                  </select>
                </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(wdtl, index) in wdata_list" style="border: none;background: transparent" :key="index">
                <td>
                  <select class type="text" v-model="wdtl.sat_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="wdtl.sat_b_duration">
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>
                  To
                  <select class type="text" v-model="wdtl.sat_c_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="wdtl.sat_d_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>

                  <input type="number" placeholder="Add spots" v-model="wdtl.sat_spots" />
                </td>
                <td>
                  <select class type="text" v-model="wdtl.sun_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="wdtl.sun_b_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>
                  To
                  <select class type="text" v-model="wdtl.sun_c_duration">
                    <option value disabled selected>HR</option>
                    <option v-for="hr in hour">{{hr}}</option>
                  </select>
                  :
                  <select type="text" v-model="wdtl.sun_d_duration">
                    <option value disabled selected>MM</option>
                    <option v-for="mn in mins">{{mn}}</option>
                  </select>

                  <input type="number" placeholder="Add spots" v-model="wdtl.sun_spots" />
                </td>

                <td>
                  <input
                    type="text"
                    placeholder="eg : GHC 200"
                    style="border: none"
                    v-model="wdtl.wsec1_rate"
                  />
                </td>
                <td>
                  <input type="text" style="border: none;" v-model="wdtl.wsec2_rate" />
                </td>
                <td>
                  <input type="text" style="border: none" v-model="wdtl.wsec3_rate" />
                </td>
                <td>
                  <input type="text" style="border: none;" v-model="wdtl.wsec4_rate" />
                </td>
                <td>
                  <input type="text" style="border: none" v-model="wdtl.wsec5_rate" />
                </td>

                <td>
                  <!--<button type="button" class="btn btn-info" @click="delwRow(index)"><i class="fa fa-minus-circle"></i> Delete row </button>-->
                  <button type="button" class="btn btn-danger btn-sm" @click="delwRow(index)">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <button
          type="button"
          class="btn btn-secondary btn-sm waves-effect waves-light add"
          @click="addWrow()"
        >Add Row</button>
      </div>
    </div>
 <!--    <button
      type="button"
      class="btn btn-danger waves-effect waves-light add pull-right"
      @click="insertResults()"
    >Submit</button> -->
  </div>
</template>

<script>
import store from "../../vuex/store";

export default {
  props: ["rate_card_title_id", "media"],
  name: "createRateCards",
  mounted() {
    //this.fetchRateCardTitle();
    // this.hour();
  },
  data() {
    return {
      days_of_the_week_and_durations: {
        mon: "MON",
        tue: "TUE",
        wed: "WED",
        thu: "THU",
        fri: "FRI",
        sec1: 15,
        sec2: 20,
        sec3: 25,
        sec4: 0,
        sec5: 0,
        time1: "",
        time2: "",
        time3: "",
        time4: "",
        time5: ""
      },
      //weekend segment and durations
      wdurations: {
        sat: "SAT",
        sun: "SUN",
        wsec1: 15,
        wsec2: 0,
        wsec3: 0,
        wsec4: 0,
        wsec5: 0,
        time1: "",
        time2: "",
        time3: "",
        time4: "",
        time5: ""
      },
      time: [
        {
          sec: "Sec",
          min: "Min",
          hr: "Hr"
        }
      ],

      create_column: {
        columns: ""
      },
      data_list: [],
      data_list2: [],
      wdata_list: [],
      column_list: [],
      r_animate: "",
      title: "",
      rate_card_title: null,
      hrs: [],
      create: "creating rate card......",
      show_rate: false,
      hour: [
        "01",
        "02",
        "03",
        "04",
        "05",
        "06",
        "07",
        "08",
        "09",
        "10",
        "11",
        "12",
        "13",
        "14",
        "15",
        "16",
        "17",
        "18",
        "19",
        "20",
        "21",
        "22",
        "23",
      ],
      mins: [
        "00",
        "01",
        "02",
        "03",
        "04",
        "05",
        "06",
        "07",
        "08",
        "09",
        "10",
        "11",
        "12",
        "13",
        "14",
        "15",
        "16",
        "17",
        "18",
        "19",
        "20",
        "21",
        "22",
        "23",
        "24",
        "25",
        "26",
        "27",
        "28",
        "29",
        "30",
        "31",
        "32",
        "33",
        "34",
        "35",
        "36",
        "37",
        "38",
        "39",
        "40",
        "41",
        "42",
        "43",
        "44",
        "45",
        "46",
        "47",
        "48",
        "49",
        "50",
        "51",
        "52",
        "53",
        "54",
        "55",
        "56",
        "57",
        "58",
        "59"
      ],
      getHr: ""
    };
  },
  methods: {
    addRow() {
      let elem = document.createElement("tr");
      this.data_list.push({
        //segments
        mon_duration: "",
        tue_duration: "",
        wed_duration: "",
        thu_duration: "",
        fri_duration: "",
        mon_b_duration: "",
        tue_b_duration: "",
        wed_b_duration: "",
        thu_b_duration: "",
        fri_b_duration: "",
        mon_c_duration: "",
        tue_c_duration: "",
        wed_c_duration: "",
        thu_c_duration: "",
        fri_c_duration: "",
        mon_d_duration: "",
        tue_d_duration: "",
        wed_d_duration: "",
        thu_d_duration: "",
        fri_d_duration: "",
        //spots
        mon_spots: "",
        tue_spots: "",
        wed_spots: "",
        thu_spots: "",
        fri_spots: "",
        //rate
        sec1_rate: "",
        sec2_rate: "",
        sec3_rate: "",
        sec4_rate: "",
        sec5_rate: ""

        //durations
        //   dura : this.durations
      });

      this.r_animate = "animated fadeIn";
    },
    addWrow() {
      let elem = document.createElement("tr");
      this.wdata_list.push({
        sat_duration: "",
        sun_duration: "",
        sat_b_duration: "",
        sun_b_duration: "",
        sat_c_duration: "",
        sun_c_duration: "",
        sat_d_duration: "",
        sun_d_duration: "",
        wsec1_rate: "",
        wsec2_rate: "",
        wsec3_rate: "",
        wsec4_rate: "",
        wsec5_rate: "",
        sat_spots: "",
        sun_spots: ""
        //  wdura : this.wdurations,
      });
      this.r_animate = "animated fadeIn";
    },

    delRow(index) {
      this.data_list.splice(index, 1);
      //this.r_animate = 'animated fadeOut';
    },
    delwRow(index) {
      this.wdata_list.splice(index, 1);
      // this.r_animate = 'animated fadeOut';
    },
    getAdTitle() {
      return this.addName;
    },
    insertResults() {
      let self = this;
      let formData = new FormData();
      console.log(JSON.stringify(self.data_list));
      formData.append(
        "mons_to_fridays",
        JSON.stringify(self.days_of_the_week_and_durations)
      );
      formData.append("sat_to_sun", JSON.stringify(self.wdurations));
      formData.append("weekdays", JSON.stringify(self.data_list));
      formData.append("weekends", JSON.stringify(self.wdata_list));
      formData.append("rate_card_title_id", self.rate_card_title_id);

      axios.post("store-ratecard/api", formData).then(function(res) {
        if (res.data === "success") {
          window.location = "create-ratecard/success";
        }
      });
    },

    fetchRateCardTitle() {
      let self = this;
      axios.get("ratecard-title/api", +self.getRateCardId).then(function(res) {
        console.log(res.data);
        if (res.data) {
          self.rate_card_title = res.data;
        }
      });
    },
    hours() {
      let hrss = 12;
      for (let i = 0; i < 12; i++) {
        this.hrs.push(i);
        return this.hrs;
      }
    }
  },
  computed: {
    getAdName() {
      return this.data_list;
    },
    getMediaType() {
      return store.state.media_type;
    },
    getRateCardId() {
      return store.getters.rateCardId;
    }
  }
};
</script>

