<template>
    <div  class="modal fade"  id="mol2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="molLabel1"><span class="text-danger"> {{media[0]}}</span> - {{title}} Printing</h4>
                    <!--<h4 class="modal-title pull-right" id="molLabel1">{{media[0]}}</h4>-->

                    <!--<p> v-model :{{createAd.dates}}</p>-->
                    <!--<p>data : {{selDates}}</p>-->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!--<h4 class="card-title text-center"><i class="fa fa-book"> </i> <strong>{{adName}}</strong></h4>-->
                                    <form  v-on:submit.prevent="">
                                        <div class="table-responsive">
                                            <button  class="btn btn-outline-info pull-right text-danger"  style="border:none !important;font-weight: bolder;text-decoration: underline">
                                                 View advert positions </button>
                                            <table class="table table-bordered " id="weekdays-tb">

                                                <thead>
                                                <tr  class="tb-rw weekdays" style='background: #36475F;color:#ffffff;font-family: "Roboto", sans-serif;font-weight: 500;font-size: 13px;'>
                                                    <th>ADVERT SIZE</th>
                                                    <th>RATE(per insertion in GHC)</th>
                                                </tr>
                                                </thead>
                                                <tfoot>


                                                </tfoot>

                                                <tbody>
                                                <tr :class="r_animate"   style="border: none;background: transparent" v-for="(dtl,index) in segments_data" :key="index">
                                                    <td>{{dtl.adSize}}</td>
                                                    <td><input type="checkbox"   :value="{'segment':dtl.adSize,'rate':dtl.rate}" v-model="createAd.printAd"/>{{dtl.rate}}</td>
                                                    <!--<td>{{dtl.vat}}</td>-->
                                                    <td>
                                                        <input type="date" class="animate fadeIn"  v-model="createAd.dates[index]" />
                                                        <button  class="btn btn-primary btn-xs" @click="storeDates(index)" style="border:none">
                                                        <i class="fa fa-save"></i></button>
                                                        <select>
                                                            <option value="" disabled selected>--selected dates</option>
                                                            <option v-for="(d,i) in selDates" :key="i">{{d.date}}</option>
                                                        </select></td>
                                                </tr>



                                                </tbody>
                                            </table><br>
                                            <button :disabled="enable_submit" class="btn btn-info" >Create ad</button>

                                        </div>
                                    </form>
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
    import  store from  '../../vuex/store';

    export default {
        props :['segments_data','title','media','enable_submit'],
        name : 'createPrintAd',
        data(){
            return {
                r_animate : '',
                createAd: {
                    printAd: [],
                    dates : [],
                },
                    selDates : [],
                     demo : [],


            }
        },
        mounted(){
            store.dispatch('getCreatedAdData', this.createAd);

        },
        methods: {
            storeDates(index){
                this.selDates.push({
                  'date' :  this.createAd.dates[index]

            });
                this.createAd.dates[index] = ''
            }
        },

        computed:{

        },

    }

</script>

