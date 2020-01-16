<template>
    <div  class="modal fade" id="updateSegment" tabindex="-1" role="dialog" style="margin-left: 220px;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<h4 class="modal-title"><b class="text-danger">{{segData[1]}}</b>- {{segData[3].rate_card_title}} rate card</h4>-->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--{{segments}}-->
                <div class="modal-body">

                    <div class="form-group">
                        <input class="form-control" type="text" v-model="title" placeholder="Enter segment title  eg:short video  on  history of gold coast">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr style="background: #36475F;color: #ffffff;">
                                <th>#</th>
                                <th>Segment</th>
                                <th>Spots</th>
                                <th>15sec</th>
                                <th>25sec</th>
                                <th>30sec</th>
                                <th>35sec</th>
                                <th>40sec</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(seg,index) in segments">
                                <th scope="row">{{index + 1}}</th>
                                <td>{{seg.segSt}}-{{seg.segEn}}</td>
                                <td> <select name="select" class="form-control form-control-primary" v-model="selSegment">
                                    <option disabled value="" selected>1</option>
                                    <option>2</option>
                                </select></td>
                                <td><input type="radio" v-model="rate" :value="seg.rt1" name="rate">{{seg.rt1}}</td>
                                <td><input type="radio" v-model="rate" :value="seg.rt2" name="rate">{{seg.rt2}}</td>
                                <td><input type="radio" v-model="rate" :value="seg.rt3" name="rate">{{seg.rt3}}</td>
                                <td><input type="radio" v-model="rate" :value="seg.rt4" name="rate">{{seg.rt4}}</td>
                                <td><input type="radio" v-model="rate" :value="seg.rt5" name="rate">{{seg.rt5}}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light " @click="saveSegment(title)">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "updateSegment",
        data(){
            return{
                segments: [{
                    'segSt': '08:00',
                    'segEn': '09:00',
                    'rt1': 'GHC400',
                    'rt2': 'GHC800',
                    'rt3': 'GHC900',
                    'rt4': 'GHC200',
                    'rt5' : 'GHC500,'
                },
                    {
                        'segSt': '10:00',
                        'segEn': '11:00',
                        'rt1': 'GHC700',
                        'rt2': 'GHC900',
                        'rt3': 'GHC1200',
                        'rt4': 'GH1400',
                        'rt5' : 'GHC700'
                    }
                ],
                rate : '',
                selSegment : '',
                title : ''
            }
        }
    }
</script>

<style scoped>

</style>