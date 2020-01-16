<template>
  <div class="card-header">
    <input
      type="text"
      placeholder="what are you looking for?"
      v-model="query"
      v-on:keyup="searchSubs"
      class="form-control"
    />

    <!--   <div class="panel-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="(result,index) in searchedSubs" :key="index">
                    {{ result }}
                </li>
            </ul>
    </div>-->
  </div>
</template>

<script>
import store from "../../vuex/store";
import Pagination from "../partials/pagination";
export default {
  props: ["segmentData"],
  name: "search",
  components: { Pagination },
  data() {
    return {
      query: "",
      results: []
    };
  },
  methods: {
    searchSubs() {
      let self = this;
      // this.results = [];
      if (this.query.length > 0) {

        store.dispatch("searchSubs", self.pagi.current_page,self.query);

        //   axios.get("search/" + self.query).then(response => {
      //     if (response.data != "") {
      //       this.segmentData = response.data;
      //     }
      //
      //     //  store.dispatch("getShowTable1", false);
      //   });
      // } else {
      //   //store.dispatch("getShowTable1", true);
       }
    },
    autocomplete() {
      if (this.query.length > 0) {
        alert("hello Joojo Arthur.Hope you are fine now");
        store.dispatch("searchSubs", this.pagi.current_page, this.query);
        store.dispatch("getShowTable1", false);
      } else {
        store.dispatch("getShowTable1", true);
        this.searchedSubs = [];
        this.pagi = {};
      }
    }
  },
  computed: {
    searchedSubs() {
      return store.state.searchedSub;
    },
    pagi() {
      return store.state.pagination;
    },

  }
};
</script>

<style scoped>
</style>