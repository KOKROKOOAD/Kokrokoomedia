<template>

        <div  class="row animated fadeIn">

            <div class="col-md-2"></div>
            <div  class="col-md-8">
                <pre-loader v-show="getProcessStatus"></pre-loader>

                <div  class="card" v-show="loading">
                    <div class="card-header">
                        <h4 class="card-title"> Select payment type</h4>
                        <hr>
                    </div>
                    <div class="card-body text-center">

                        <fieldset  class="payment" style="padding-left: 10px;">

                           <label @click="showPayForm(network.airtel)">
                               <input type="radio" name="payment" :value="network.airtel" v-model="selNetworks"/>
                               <img src="/images/airt-money.png"  style="width:100px;height: 60px;">
                           </label>
                               <label @click="showPayForm(network.mtn)">
                               <input type="radio" name="payment" :value="network.mtn" v-model="selNetworks"/>
                                   <img src="/images/mtn-mo.jpeg"  style="width:100px;height: 60px;">
                               </label>

                           <label @click="showPayForm(network.vodafone)">
                               <input type="radio" name="payment" :value="network.vodafone" v-model="selNetworks"/>
                               <img src="/images/vod-mo.png"  style="width:100px;height: 60px;">
                           </label>
                           <label @click="showPayForm(network.visa)">
                               <input type="radio" name="payment" :value="network.visa" v-model="selNetworks"/>
                               <img src="/images/visa.png"  style="width:100px;height: 60px;">
                           </label>
                       </fieldset>
                    </div>
                </div>


                <div v-show="payType" class="card" :class="anim_d" v-if="loading">
                    <div class="card-header animated slideInDown">
                        <h4 class="card-title text-muted text-small" :class="fColor"> {{selPaymentType}}</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <label v-show="momo" style="color: #0c0c0c">Amount</label>
                        <div v-show="momo" class="form-group" :class="momo_anim_faIn">
                            <input type="text" disabled class="form-control"  v-model="amounts"  style="background:transparent"/>
                        </div>
                         <div v-show="momo" class="form-group" :class="momo_anim_faIn">
                             <input type="text" class="form-control" placeholder="Enter mobile number" v-model="network.mobileNumber"/>
                         </div>
                        <div v-show="visa" :class="visa_anim_faIn">
                         <div  class="form-group col-md-7">
                             <input type="text" class="form-control" placeholder="Enter card number"/>
                         </div>

                         <div class="form-group col-md-5">
                             <input type="date" class="form-control" placeholder="Expires"/>
                         </div>

                         <div class="form-group col-md-7">

                             <input type="text" class="form-control" placeholder="Name on card"/>
                         </div>
                         <div class="form-group col-md-5">

                             <input type="text" class="form-control" placeholder="CVV Code"/>
                         </div>
                          </div>


                         <div class="form-group">
                             <!--<input type="button" role="button" :disabled="dis" class="btn btn-default" value="Cancel" @click="cancel()" />-->

                             <input type="button" role="button" :disabled="dis" class="btn btn-primary" value="Submit" @click="makePayment()" />
                         </div>


                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

</template>


<script>
    import  store from  '../../vuex/store';
    export default {
        name: "paymentType",

        data(){
            return {
          payType : false,
           momo : false,
           visa : false,
           anim_d : 'animated slideInDown',
           momo_anim_faIn :  'animated fadeIn',
           visa_anim_faIn : 'animated fadeIn',

                network : {
                mtn : 'MTN',
                vodafone : 'VODAFONE',
                airtel : 'AIRTEL',
                visa : 'Credit Card',
                mobileNumber : '',
            },
                selPaymentType : '',
                fColor : '',
                dis : false,
                amount : '4000',
                formData : new FormData(),
                loading : true,
                amounts: '400',
                sub_id : '',
                selNetworks : '',

            }
        },
        mounted(){
            //this.checkSel(this.selPaymentType)
        },
        methods: {
            showPayForm(value){
              //  this.anim = 'animated fadeIn';
                console.log(this.anim);
                this.payType = true;
                if(value === 'AIRTEL' || value === 'VODAFONE' || value === 'MTN'){
                    this.selPaymentType = value;
                    this.momo = true;
                   // this.visa_anim_faIn = 'animated fadeOut';
                    this.visa = false;
                    this.checkSel();
                }
                else{
                    this.selPaymentType = value;

                    this.visa = true;
                  //  this.momo_anim_faIn = 'animated fadeOut';
                    this.momo = false;
                }
            },
            checkSel(){
                if(this.selPaymentType === 'MTN'){
                    this.fColor = 'mtn';

                }
                else if(this.selPaymentType === 'AIRTEL'){
                    this.fColor = 'airtel';

                }
                else if(this.selPaymentType === 'VODAFONE'){
                    this.fColor = 'voda';


                }
//                if(this.selPaymentType === 'Credit Card'){
//                    this.fColor = 'dash-credit';
//                }
                else {
                    this.fColor = '';
                }
            },
            makePayment(){
                 let self  = this;
                 let formData = new FormData();
                 formData.append('phone', this.network.mobileNumber);
                 formData.append('amount', this.amount);
                 formData.append('network', self.selNetworks);
                 formData.append('service', self.segTitle);
                 formData.append('media_house_id', this.mediaHouseId);
                 formData.append('subscription_id', self.subId);
                 formData.append('invoice_id', self.invoiceId);

                this.loading = false;
                store.dispatch('getProcessing', true);
                 this.dis = true;
                 setTimeout(function () {
                     axios.post('api-payment',formData).then(function (res) {
                         if(res.data === 'success'){
                             self.loading = true;
                             store.dispatch('getProcessing', false);
                             self.$router.push('payment-success');

                         }
                         else{
                             self.loading = true;
                             store.dispatch('getProcessing', false);
                             (new PNotify( {
                                     title:'Error Desktop Notice', type:'error', text:'Transaction failed please try again later.', desktop: {
                                         desktop: true, icon: 'assets/images/pnotify/error.png'
                                     }
                                 }
                             ));


                         }

                     }).catch(function (error) {
                         if (error){
                             console.log(error);
                             store.dispatch('getProcessing', false);
                         }
                     });
                 },3000);

            },
            cancel(){
                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to cancel this transaction?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Remove',
                    confirmButtonColor: '#E44032',
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                },function(){
                    window.location.replace("http://localhost:8000/user-account/create-subscription");
                });
            },
            upload(){
                let self = this;
                store.dispatch('getShowSched',false);
                store.dispatch('getShowPayment', true);
                self.formData.append('uploadedFile',self.getFile);
                self.formData.append('created_ad_data',JSON.stringify(self.getCreatedAd));
                self.formData.append('media_house_id', self.getSelMediaId);
                store.dispatch('getProcessing', true);
                axios.post('ads-api/store',self.formData).then(response => {
                   // console.log(response.data);
                    setTimeout(function () {
                        if(response){
                            store.dispatch('getProcessing', false);
                            window.location.replace("http://localhost:8000/user-account/subscriptions");

                        }
                    },3000);


                });
            }

        },
        computed:{
            getCreatedAd() {
                return store.state.schedule_ad_data;
            },
            getSelMedia(){
                return  store.state.media;
            },
            show_scheds(){
                return store.state.show_sched;
            },
            getSelMediaId(){
                return store.state.selMediaId;
            },
            getFile(){
                return store.state.file;
            },
            getShowPayment(){
                return  store.state.showPayment;
            },
            shows_sched(){
                return store.state.show_sched;
            },
            getProcessStatus(){
                return  store.state.processing;
            },
            mediaHouseId(){
                return store.state.mediaHouseId;
            },
            subId(){
              return  store.getters.subId;
            },
            invoiceId(){
             return  store.getters.invoiceId;
            },
            segTitle(){
                return store.getters.segTitle;
            },

        },

    }




</script>