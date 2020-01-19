$(document).ready(function () {
    let table = $('#laravel_datatable');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "transactions",
            type: 'GET',
        },
        columns: [
            {data: 'id', name: 'id', 'visible': false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            // {data: 'client_id', name: 'client_id'},
            {data: 'transaction_id', name: 'transaction_id'},
             {data: 'subscription_id', name: 'subscription_id','visible':false},
            {data: 'service', name: 'service','visible' : false},
            {data: 'amount', name: 'amount'},
            {data: 'transaction_status', name: 'transaction_status'},
            {data: 'payment_source', name: 'payment_source'},
            {data: 'created_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']],
        pageLength : 10,
        columnDefs: [{
            targets: [1,2,3],
            searchable: true,
            visible: false
        }]
    });


//hide datatable search box and label
//     $('input[type=search]').hide();
//     $('#laravel_datatable_filter label').hide();
//
//     // key up event for custom search
//     oTable = table.DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
//     $('#search').keyup(function () {
//         oTable.search($(this).val()).draw();
//     });


});