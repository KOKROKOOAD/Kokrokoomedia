<template>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Summary</h4>
                </div>
                <div class="card-body">
                    <div v-show="getSelMedia.toLowerCase() === 'print' " class="table-responsive table-full-width">

                        <table  class="table table-striped">
                            <thead class="">
                            <tr>
                                <th>Advert size</th>
                                <th>Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr  v-for="p in getCreatedAd">
                                <td>{{p.segment}}</td>
                                <td>{{p.rate}}</td>

                            </tr>
                            <tr>
                                <td><span>Total:</span></td>
                                <td> <span class="text-dark" style="font-weight: bolder;font-size: 16px;">GHC 4000</span></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>


                                       <!--{{getCreatedAd}}-->
                    <div v-show="getSelMedia.toLowerCase() !== 'print' " class="table-responsive table-full-width">

                        <table  class="table table-striped">
                            <thead class="">
                            <tr>
                                <th>Date</th>
                                <th><span class="text-transform:lowercase !important">Segments</span></th>
                                <th>Durations</th>
                                <th>Spots</th>
                                <th>Unit price</th>
                                <th>Cost</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="seg in getCreatedAd">
                                <td v-if="seg.date.length === 0"> <span style="font-weight: bold">{{seg.day}}</span> {{getCurrentDate}}</td>
                                <td v-else="">
                                    <select class="form-control" style="">
                                        <option value="" disabled selected>schedule date</option>
                                        <option v-for=" d in seg.date">{{d.date}}</option>
                                    </select>
                                </td>
                                <td>{{seg.segment}}</td>
                                <td>{{seg.sec}} sec</td>
                                <td>{{parseInt(seg.spot)}}</td>
                                <td>GHC{{seg.rate}}</td>
                                <td v-if="seg.date.length === 0">GHC{{ parseInt(seg.spot) * parseInt(seg.rate)}}</td>
                                <td v-else="">GHC{{ parseInt(seg.spot) * parseInt((seg.date.length * seg.rate))}}</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span>Total:</span></td>
                                <td> <span class="text-dark" style="font-weight: bolder;font-size: 16px;">GHC 4000</span></td>
                            </tr>
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import  store from  '../../vuex/store';
    export default {
        props : [],
        components: {},
        name: "invoice",

        data(){
            return {
                tb_heading :{
                    segment : 'segment',
                    duration : 'duration',
                    spot     : 'spot',
                    rate     : 'unit price',
                    cost     :  'cost',
                    total : 0

                },
                createAd:[

                ],
                picked : '',

            }

        },
        mounted(){

        },
        methods: {
//            test(){
//                  let dat = this.getCreatedAd;
//                for (let key in dat) {
//                    if (dat.hasOwnProperty(key)) {
//
//                            console.log(JSON.parse(dat[key]));
//
//
//                    }
//                }
//            }

        },
        computed:{
            getCreatedAd(){
                return store.state.create_ad_data;
            },
            getSelMedia(){
              return  store.state.media;
            },
            getCurrentDate(){
                let today = new Date();
                let dd = today.getDate();
                let mm = today.getMonth()+1; //January is 0!
                let yyyy = today.getFullYear();

                if(dd<10) {
                    dd = '0'+dd
                }

                if(mm<10) {
                    mm = '0'+mm
                }

                today = mm + '/' + dd + '/' + yyyy;
                return today;
            }

        },

    }

</script>