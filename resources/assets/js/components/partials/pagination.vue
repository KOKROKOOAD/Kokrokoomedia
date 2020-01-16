<template>
  <div class="row mt-2">
    <div class="col-md-8">
      Page: {{pagi.from_page}} - {{pagi.to_page}}
      Total: {{pagi.total_page}}
    </div>
    <div class="col-md-4">
      <nav>
        <ul class="pagination pull-right">
          <li :class="{disable:!pagi.first_link}" class="page-item"><a href="#" class="page-link" @click="fetchAllSubsPagi(pagi.first_link)">&laquo;</a></li>
          <li :class="{disable:!pagi.prev_link}" class="page-item"><a href="#" class="page-link" @click="fetchAllSubsPagi(pagi.prev_link)">&lt;</a></li>
          <li v-for="n in pagi.last_page" :key="n" :class="{active : pagi.current_page === n}" class="page-item"><a href="#" class="page-link" @click="fetchAllSubsPagi(pagi.path_page + n)">{{n}}</a> </li>
          <li :class="{disable:!pagi.next_link}" class="page-item"><a href="#" class="page-link" @click="fetchAllSubsPagi(pagi.next_link)">&gt;</a></li>
          <li :class="{disable:!pagi.last_link}" class="page-item"><a href="#" class="page-link" @click="fetchAllSubsPagi(pagi.last_link)">&raquo;</a></li>
        </ul>
      </nav>

    </div>
  </div>
</template>

<script>
    import  store from  '../../vuex/store';
    export default {
        props: ['baseUrl'],
        name: "pagination",
        data(){
            return{

            }
        },
        methods: {
            fetchAllSubsPagi(pagi) {
                    store.dispatch('fetchAllSubs',pagi);
            },
        },
        computed:{
            pagi(){
                return store.state.pagination;
            },
        }
    }
</script>

<style scoped>

</style>