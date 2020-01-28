<template>
    <div></div>
</template>

<script>
    export default {
        name: "deleteRateCard",
        data(){
            return{

            }
        },
        mounted() {
            this.deleteCard();
        },
        methods:{
            deleteCard(){
                let self = this;
                let  ratecard_id = null;
                $(document).on('click', '.deleteRateCard', function(){
                    ratecard_id =  $(this).attr("data-id");

                    self.deleteRateCard(ratecard_id);

                });

            },
            deleteRateCard(rateCardId){
                let self = this;
                let formData = new FormData();
                formData.append('rateCardTitleId',rateCardId);

                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to delete this rate card?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Delete',
                    confirmButtonColor: '#fe8f9c',
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                },function(isConfirm) {

                    if (isConfirm) {
                        axios.post('delete-ratecard/api',formData).then(function (res) {

                            if (res.data === 'success') {
                                window.location.replace("http://media.kokrokooad.com/media/admin/ratecards");
                            }
                        }).
                        catch(function (error) {
                            console.log(error);
                        });
                    }
                });
            },
        }

    }
</script>

<style scoped>

</style>