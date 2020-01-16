<template>
    <div class="row animated fadeIn">
        <div  class="col-md-12 animated fadeIn">
            <div class="card">
                <div class="header">
                    <!--<h4 class="title">Selected media house</h4>-->
                    <!--<p class="category">Here is a subtitle for this table</p>-->
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>Selected media house</th>
                        <th>Action</th>

                        </thead>
                        <tbody>
                        <tr v-for="(sel_mHouse,index) in getSelectMedia" :key="index">

                            <td>{{sel_mHouse}}</td>
                            <td><button class="btn btn-danger btn-xs" @click="delSelMediaHouse(index)"> <i class="fa fa-trash"> </i> </button></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        props :[],
        name : 'selectedMediaHouse',

        mounted(){


        },
        data(){
            return {

            }
        },
        methods: {

            delSelMediaHouse(index){
                let self = this;
                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to remove this media house',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Remove',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                },function(){
                    self.getSelectMedia.splice(index,1);
                    if(self.getSelectMedia.length === 0){
                        location.reload();
                    }


                });
            },

        },

        computed:{
            getSelectMedia(){
                return store.state.selMedia;
            },
        },

    }

</script>
