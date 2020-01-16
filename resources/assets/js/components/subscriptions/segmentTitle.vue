<template>
    <div class="modal fade" id="segmentTitle" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Provide segment title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" placeholder="Provide segment title"  v-model="seg_title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect " data-dismiss="modal" @click="displaySegment">Submit</button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name: "segmentTitle",
        data(){
            return{
                seg_title : '',

            }
        },
        created(){
            //this.segmentName();
        },
        methods:{
            displaySegment(){

                this.segmentName();
            },
            segmentName(){
               return  store.dispatch('getSegmentTitle', this.seg_title);
            }
        },
        computed:{
         segTitle(){
             return store.getters.segTitle;
         },

        }

    }
</script>

<style scoped>

</style>