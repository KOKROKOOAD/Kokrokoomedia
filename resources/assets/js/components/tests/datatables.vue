<template>
    <datatable></datatable>

</template>

<script>
    export default {
        name: "datatables",
        data(){
            return{
             table_columns:[
                 {
                     label : 'id',field: 'id'
                 },
                 {
                     label:'UserName',field: 'user.username'
                 },
                 {label:'First Name',field:'user.first_name'}
             ],
                table_rows:[
                    { "id": 1,
                "user": {
                    "username": "dprice0",
                    "first_name": "Daniel",

                }
            },
                ]
            }
        }
    }
</script>

<style scoped>

</style>