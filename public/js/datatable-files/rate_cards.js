$(document).ready(function () {
    let table = $('#laravel_datatable');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "ratecards",
            type: 'GET',
        },
        columns: [
            {data: 'id', name: 'id', 'visible': false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'rate_card_id', name: 'rate_card_id'},
            {data: 'rate_card_title', name: 'rate_card_title'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at',adjust:true, name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']],
        "pageLength": 10,


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

    //  $('#media_id').hide();

});